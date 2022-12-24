<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Distressed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../form/style.css">
    <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/commons/d/d5/Hey_Machine_Learning_Logo.png" type="image/x-icon">
    <title>formulaire</title>
</head>
<body>
      <nav class="navbar">
      <a href="../start/index.html">
        <img id=logo-image src="https://upload.wikimedia.org/wikipedia/commons/d/d5/Hey_Machine_Learning_Logo.png" alt="logo">
      </a>
        <div class="nav-links"> 
          <ul>
            <li><a href="/projet20212363/start/index.html">acceuil</a></li>
            <li><a href="/projet20212363/histoire/index.html">histoire</a></li>
            <li><a href="/projet20212363/algorithmes/index.html">algorithmes</a></li>
            <li><a href="/projet20212363/applications/templates/index.html">applications</a></li>
            <li><a href="/projet20212363/contact/index.html">contact</a></li>
          </ul>
        </div>
        <img class="menu-hamburger" src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Hamburger_icon.svg/1024px-Hamburger_icon.svg.png" alt="icône menu hamburger">
      </nav>
    <h1 id="title">Formulaire de contact</h1>
    <p>Vos informations personnelles seront envoyés à nos agents pour qu'ils puissent vous aider efficacement ainsi que dans notre base de données pour établir des statistiques afin d'améliorer nos services.</p>
    <div class="container">
        <form method="post" action="send_database.php" id="survey-form" >
        <div class="form-group">
            <label id="name-label" for="prenom">prénom </label>
            <input type="text" name="prenom" id="prenom" class="form-control" placeholder="prénom..." required>
        </div>
        <div class="form-group">
            <label id="name-label" for="name">nom </label>
            <input type="text" name="name" id="name" class="form-control" placeholder="nom..." required>
        </div>
        <div class="form-group">
            <label id="email-label" for="email">email </label>
            <input type="email" name="email" id="email" class="form-control" placeholder="example@example.com" required>
        </div>
        <div class="form-group">
            <label id="age-label" for="age">âge</label>
            <input type="number" min="0" name="age" id="age" class="form-control" placeholder="age" required>
        </div>
        <div class="form-group">
            <label for="activity" id="activity-label"><p>secteur d'activité</p></label>
            <select id="activity" name="activity" class="form-control" required>
                <option disabled selected value>sélectionnez votre secteur d'activité</option>
                <option value="Étudiant">Étudiant</option>
                <option value="Agriculture/Paysage">Agriculture/Paysage</option>
                <option value="Alimentation">Alimentation - Agroalimentaire</option>
                <option value="Commerce électronique, vente hors magasin">Commerce électronique, vente hors magasin</option>
                <option value="Éducation">Éducation</option>
                <option value="Immobilier, logement">Immobilier, logement</option>
                <option value="Energie, eau, assainissement">Energie, eau, assainissement</option>
                <option value="Transport public de voyageurs, transport de marchandises">Transport public de voyageurs, transport de marchandises</option>
                <option value="Communication, téléphonie, services postaux">Communication, téléphonie, services postaux</option>
            </select>
        </div>
        <div class="form-group">
            <label for="pays" id="pays-label"><p>Pays</p></label>
            <select name="pays" id="pays" class="form-control" required>
                <option disabled selected value>sélectionnez un pays</option>
                <?php include("../form/listes/listepays.html");?>
            </select>
        </div>
        <div class="form-group">
            <p>genre</p>
            
            <div class="label-gender-group">
                
                <label>
                    <input type="radio" name="gender" value="homme">homme
                </label>
            </div>
            <div class="label-gender-group">
                
                <label>
                    <input type="radio" name="gender" value="femme">femme
                </label>
            </div>
        </div>
        <div class="form-group">
            <p>Dans quels secteurs accepteriez-vous que le Machine Learning remplace les humains ?</p>
            
            <div class="checkbox-container">
                <div class="éducation">
                    <label for="éducation">
                    <input type="checkbox" name="ML_Form[]" id="éducation" value="education">éducation
                    </label>
                </div>
                
                <div class="art">
                <label for="art">
                <input type="checkbox" name="ML_Form[]" id="art" value="art">art
            </label>
                </div>
                <div class="médecine">
                <label for="médecine">
                <input type="checkbox" name="ML_Form[]" id="médecine" value="medecine">médecine
            </label>
                </div>
                <div class="cinéma">
                <label for="cinéma">
                <input type="checkbox" name="ML_Form[]" id="cinéma" value="cinema">cinéma
            </label>
                </div>
                <div class="travaux">
                <label for="travaux">
                <input type="checkbox" name="ML_Form[]" id="travaux" value="travaux">travaux
            </label>
                </div>
                <div class="sport">
                <label for="sport">
                <input type="checkbox" name="ML_Form[]" id="sport" value="sport">sport
            </label>
                </div>
                <div class="conduite">
                <label for="conduite">
                <input type="checkbox" name="ML_Form[]" id="conduite" value="conduite">conduite
            </label>
                </div>
                <div class="cuisine">
                <label for="cuisine">
                <input type="checkbox" name="ML_Form[]" id="cuisine" value="cuisine">cuisine
            </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <p>commentaire</p>
            <textarea name="comment" id="textarea" placeholder="questions, commentaires...."></textarea>
        </div>
        <div class="form-group">
            <button class="submit-button" type="submit" onclick="sendEmail()">SOUMETTRE</button>
        </div>


      
    
    </form>
    </div>
    <footer><p>
        Les informations recueillies sur ce formulaire sont enregistrées dans un fichier informatisé par Naheri AHAMADA pour établir des statistiques sur les utilisateurs afin de vous aider plus efficacement.
Les données collectées seront communiquées aux seuls destinataires suivants : Naheri AHAMADA.
Les données sont conservées pendant 5 ans.
Vous pouvez accéder aux données vous concernant, les rectifier, demander leur effacement ou exercer votre droit à la limitation du traitement de vos données.
Consultez le site <a href="https://www.cnil.fr/fr" target="_blank">cnil.fr</a> pour plus d’informations sur vos droits.
Pour exercer ces droits ou pour toute question sur le traitement de vos données dans ce dispositif, vous pouvez contacter (le cas échéant, notre délégué à la protection des données ou le service chargé de l’exercice de ces droits) : [adresse électronique, postale, coordonnées téléphoniques, etc.] 
Si vous estimez, après nous avoir contactés, que vos droits « Informatique et Libertés » ne sont pas respectés, vous pouvez adresser une réclamation à la CNIL.
</p>
</footer>
</body>
</html>

<script src="../form/script.js"></script>