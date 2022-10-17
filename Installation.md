- Installer un serveur local (xampp, wamp...) avec la version 8.1 de php
- Installer php comme une variable d'environnement (sous windows)
- Installer composer
- Cloner le projet 
- Se déplacer dans le répertoire du projet et executer la commander : 
	- composer install
- Renommer le fichier .env.example en .env
- Executer la commande : php artisan key:generate
- Créer une base de données
- Renseigner les identifiants dans le .env 
	- DB_USERNAME
	- DB_NAME
	- DB_PASSWORD
- Executer les commandes dans l'ordre :
	- php artisan migrate
	- php artisan db:seed
- Lancer le projet avec la commande 
	- php artisan serve
- Remplacer dans le fichier .env la variable APP_URL par :
	- localhost:8000
- Executer la commande pour voir les images ajoutés lors de la mise en vente d'un logement
	- php artisan storage:link