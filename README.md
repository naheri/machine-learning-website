# Présentation

C'est un site informatif sur le machine learning, quelques fonctionnalités qui ont été intégrées nécessitent l'installation de librairies spécifiques.

# Configuration

## Python
Vous pouvez installer un environnement virtuel dans lequel vous installerez toutes les librairies de requirements.txt et python 3.9.15
Si vous êtes sur MacOS ou Linux, suivez un tutoriel pour installer Tensorflow
Vous pouvez utiliser Miniforge, Miniconda ou virtualenv

Dans le cas où vous utilisez Miniforge (ce que j'ai utilisé) :

```bash
conda 
```
## PHP

Installez [MAMP](https://www.mamp.info/en/downloads/), ou [XAMPP](https://www.apachefriends.org/fr/index.html) et placez le dossier projet20212363 dans htdocs.
## Librairies
```bash
pip install -r requirements.txt
```
(Si jamais j'en ai oublié, installez les librairies manquantes)

### Librairies/API utilisées

#### Flask
Flask est un petit framework web Python léger, qui fournit des outils et des fonctionnalités utiles qui facilitent la création d'applications web en Python. Il offre aux développeurs une certaine flexibilité et constitue un cadre plus accessible pour les nouveaux développeurs, puisque vous pouvez construire rapidement une application web en utilisant un seul fichier Python.
#### GTTS

gTTS (Google Text-to-Speech), une bibliothèque Python et un outil CLI pour interfacer avec l'API de synthèse vocale de Google Translate. Écrit les données mp3 parlées dans un fichier.
#### OpenAI
L'API OpenAI peut être appliquée à pratiquement toutes les tâches qui impliquent la compréhension ou la génération de langage naturel ou de code. Il y a un éventail de modèles avec différents niveaux de puissance adaptés à différentes tâches, ainsi que la possibilité d'affiner vos propres modèles personnalisés. Ces modèles peuvent être utilisés pour tout, de la génération de contenu à la recherche sémantique et à la classification.
#### Numpy
NumPy est une bibliothèque pour langage de programmation Python, destinée à manipuler des matrices ou tableaux multidimensionnels ainsi que des fonctions mathématiques opérant sur ces tableaux
#### TensorFlow
TensorFlow est un outil doté d'une interface Python, open source d'apprentissage automatique développé par Google.
#### Keras 
Keras est une API de réseau de neurones écrite en langage Python. Il s’agit d’une bibliothèque Open Source, exécutée par-dessus des frameworks tels que Theano et TensorFlow.
#### deepl
L’API de DeepL permet d’accéder à leur Traducteur dans une interface spécialement conçue pour les développeurs, qui peuvent ainsi intégrer des traductions de grande qualité directement dans leurs sites web et leurs applications.
#### cv2 (opencv-python)
OpenCV (pour Open Computer Vision) est une bibliothèque libre, initialement développée par Intel, spécialisée dans le traitement d'images en temps réel.





# Utilisation

Configurez votre port localhost sur MAMP ou XAMPP sur 8889, pour que tous les liens présents dans le site fonctionnent

Pour accéder à la page "applications" et toutes ses fonctionnalités, lancez le serveur Flask à partir du dossier applications:

![Alt text](../projet20212363/images/applications_screen_terminal.png?raw=true "terminal")

Et lancez la commande :
 ```bash
python app.py
```
ou 
Puis rendez vous à l'adresse indiquée qui devrait être :
```bash
Running on http://127.0.0.1:5000
```
## Remarque

Il y a un mode sombre, mais pour les pages "algorithmes" et "histoire" il faut actualiser pour qu'il se mette en place