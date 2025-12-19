# Todo App - Test Technique Laravel

Application de gestion de tâches développée avec Laravel et MySQL.

## Prérequis

- PHP >= 8.0
- Composer
- MySQL

## Installation

1. Cloner le repository
```bash
git clone https://github.com/Camille-lt/test-technique-todo.git
cd test-technique-todo
```

2. Installer les dépendances
```bash
composer install
```

3. Configurer l'environnement
```bash
cp .env.example .env
php artisan key:generate
```

4. Configurer la base de données dans le fichier `.env`

5. Lancer les migrations
```bash
php artisan migrate
```

6. Lancer le serveur
```bash
php artisan serve
```

L'application est accessible sur : `http://127.0.0.1:8000`

## Fonctionnalités

- [ ] Lister des tâches
- [ ] Ajouter une nouvelle tâche
- [ ] Marquer une tâche comme terminée
- [ ] Supprimer une tâche