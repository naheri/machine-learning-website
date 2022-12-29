from flask import Flask,render_template,request,Response, jsonify

from gtts import *
import openai
import numpy as np
import tensorflow as tf
from tensorflow.keras.models import load_model
import deepl
import cv2
import os

# rendre zip utilisable dans le template
from jinja2 import Environment,PackageLoader,select_autoescape
env = Environment(
    loader=PackageLoader("app"),
    autoescape=select_autoescape()
)
env.globals.update(zip=zip)



app = Flask(__name__)
openai.api_key="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"
auth_key = "6e8476c9-3cc9-ecd1-c74e-a026e0093e49:fx"  # Replace with your key
translator = deepl.Translator(auth_key)
loop_running = False


#liste des réponses de l'API OpenAI
responses = []
#liste des messages de l'utilisateur
messages = []
#définition de la route principale, affichage de la page applications/index.html
@app.route("/")
def index():
  return render_template("index.html")

#reconnaissance vocale : text to speech
@app.route("/text_to_speech", methods=["POST"])
def text_to_speech():
  # récupérer le texte à lire
  text = request.form["texte_vers_audio"]
  # créer un objet de type gTTS, avec le texte à lire et la langue (génération de l'audio), puis le sauvegarder dans un fichier mp3
  tts = gTTS(text, lang="fr")
  tts.save("static/sounds/speech.mp3") # obligé de mettre le fichier dans un dossier static sinon : erreur 404, impossible de lire le son
  
  return render_template("text_to_speech.html")


@app.route('/record', methods=['POST'])
def speech_to_text():
    return render_template('record.html')

@app.route('/transcribe', methods=['POST'])
def transcribe():
    text = request.form['text']

    return render_template('transcribe.html', text2=text)

#définition de la route /tutor, affichage de la page applications/tutor.html
@app.route("/tutor", methods=["POST"])
def tutor():
  return render_template("tutor.html")
@app.route("/discussion", methods=["POST"])
def discussions():
  global responses
  global messages
  # récupérer le message de l'utilisateur
  message = request.form["message"]
  # l'ajouter à la liste des messages
  messages.append(message)
  # le traduire en anglais avec l'API deepl, prendre le dernier message de la liste
  message_traduit = translator.translate_text(messages[-1], target_lang="EN-US") 
  print(message_traduit.text)
  
  
  # appeler l'API OpenAI pour générer une réponse
  response = openai.Completion.create(
    model="text-davinci-003",
    prompt=message_traduit.text,
    temperature=0.3,
    max_tokens=1000, # j'ai augmenté le nombre de tokens pour avoir une réponse plus longue et plus complète
    top_p=1,
    frequency_penalty=0.5,
    presence_penalty=0,
    stop=["You:"]
  )
  
  response_text = response["choices"][0]["text"]
  print(response)
  print(response_text)
  # traduire la réponse en français avec l'API deepl
  response_text = translator.translate_text(response_text, target_lang="FR")


  responses.append(response_text.text)
  return render_template("tutor.html", responses=responses,messages=messages,responses_messages=zip(responses,messages))

@app.route("/reset", methods=["POST"])
def reset():
  # vide les listes
  responses.clear()
  messages.clear()
  return render_template("tutor.html", responses=responses,messages=messages,responses_messages=zip(responses,messages))

# détection du sentiment du texte entré par l'utilisateur
@app.route("/", methods=["POST"])
def get_sentiment():
  # récupérer le texte entré par l'utilisateur
  text = request.form["texte"]
  # appeler l'API OpenAI
  response = openai.Completion.create(
  model="text-davinci-003",
  prompt= (f"Quel est le sentiment de la phrase suivante?\n{text}"),
  temperature=0,
  max_tokens=60,
  top_p=1,
  frequency_penalty=0.5,
  presence_penalty=0
)
  # récupérer le sentiment
  message = response.choices[0].text
  # le traduire en français avec l'API deepl
  message = translator.translate_text(message, target_lang="FR")
  return render_template("response.html", texte_sentiment=message)

@app.route("/get_gender_start", methods=["POST"])
def get_gender():
  global loop_running
  global gender
  loop_running = True
  # chargement du modèle de prédiction du genre
  model = load_model("model.h5")


  # ouverture de la webcam
  cam = cv2.VideoCapture(0)
  
  #définition d'une variable booléenne pour la boucle while pour arrêter la capture vidéo et le programme à partir de la page web
  while loop_running:
    # capture d'une image depuis la webcam
    ret, frame = cam.read()
    # Redimensionnement de l'image en format 110x80, format attendu par le modèle
    frame = cv2.resize(frame, (110, 80))
    # ajout d'une dimension pour le modèle
    frame = tf.expand_dims(frame, axis=0)
    frame = tf.expand_dims(frame, axis=3)
    # suppression d'une dimension inutile pour le modèle
    frame = frame[:,:,:,:,-1]


    # utilisation du modèle pour prédire le genre sur l'image capturée
    prediction = model.predict(frame)[0]

    # définition du genre en fonction de la prédiction
    if prediction[0] > prediction[1]:
      gender = "masculin"
    else:
      gender = "feminin"
    print(gender)
  return gender

# encadrement du visage par un rectangle grâce à un modèle de détection de visage
def get_frame():

  # ouverture de la webcam
  cam = cv2.VideoCapture(0)
  while loop_running:
    # lire une image depuis la webcam
    _, frame = cam.read()
    # convertir l'image en niveau de gris pour la rendre plus légère et plus rapide à traiter
    gray = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)
    #Détecter les visages dans le cadre à l'aide des cascades de Haar
    face_cascade = cv2.CascadeClassifier('detect_face.xml')
    faces = face_cascade.detectMultiScale(gray, 1.3, 5)
    # dessiner un rectangle autour des visages détectés
    for (x, y, w, h) in faces:
        cv2.rectangle(frame, (x, y), (x+w, y+h), (255, 0, 0), 2)

        # afficher le genre sur l'image
        font = cv2.FONT_HERSHEY_SIMPLEX
        cv2.putText(frame, gender, (x, y-5), font, 1, (255, 255, 255), 2, cv2.LINE_AA)

    # convertir l'image en format jpeg
    ret, jpeg = cv2.imencode('.jpg', frame)

    # retourner l'image
    yield (b'--frame\r\nContent-Type: image/jpeg\r\n\r\n' + jpeg.tobytes() + b'\r\n\r\n')

# affcher la vidéo de la webcam avec le rectangle autour du visage et le genre
@app.route('/video_feed_page', methods=['POST'])
def video_feed_page():
    return render_template("video_feed.html")

@app.route('/video_feed')
def video_feed():
    return Response(get_frame(), mimetype='multipart/x-mixed-replace; boundary=frame')

# arrêter la capture vidéo et le programme à partir de la page web
@app.route('/get_gender_stop', methods=['POST'])
def stop_loop():
  global loop_running
  loop_running = False
  return render_template("index.html",foo=42)
if __name__ == '__main__':
    app.run(debug=True)





