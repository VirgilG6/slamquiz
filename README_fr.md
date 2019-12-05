# Présentation du logiciel slamquiz
[![Build Status](https://travis-ci.org/VirgilG6/slamquiz.svg?branch=master)]

![alt text](https://github.com/VirgilG6/slamquiz/blob/develop/assets/screenshot_home1.jpg)

## Installation
1. Créer un espace de stockage sur votre ordinateur (exemple: quizz):
```
cd quizz
```

2. Cloner le projet en utilisant la commande suivante: 
```
git clone https://github.com/VirgilG6/slamquiz.git
```

3. Installer composer (si vous ne l'avez pas suivez ce lien: https://getcomposer.org/download/):

```
composer install
```

4. Copier le fichier .env et renommer-le en .env.local

5. Remplacer db_user, db_password et db_name par vos données
```
DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name
```

6. Pour exécuter vos migrations, entrer la commande suivante:
```
php bin/console doctrine:migrations:migrate
```

7. Pour charger les fixtures, entrer la commande:
```
php bin/console doctrine:fixtures:load

yes
```

8. Démarer le serveur avec la commande:
```
php bin/console server:run
```

9. Ouvrir la page index sur un navigateur:
```
localhost:8000
```

10. Compte existant:
```
Identifiant: User
Mot de passe: 123456

Identifiant: Admin
Mot de passe: 123456

Identifiant: Superadmin
Mot de passe: 123456

Le mot de passe est le même car c'était pour tester.
```
