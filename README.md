# Présentation

C'est un site informatif sur le machine learning, quelques fonctionnalités qui ont été intégrées nécessitent l'installation de librairies spécifiques.

# Configuration

## Librairies

```bash
pip install -r requirements.txt
```
(Si jamais j'en ai oublié, installez les librairies manquantes)

## PHP

Installez [MAMP](https://www.mamp.info/en/downloads/), ou [XAMPP](https://www.apachefriends.org/fr/index.html) et placez le dossier projet20212363 dans htdocs.

# Utilisation

Configurez votre port localhost sur MAMP ou XAMPP sur 8889

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