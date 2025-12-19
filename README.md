# Kanban App - Test Technique Laravel

Une application de gestion de tâches de type **Kanban** moderne, développée avec **Laravel 11**, **SQLite** et **Tailwind CSS**.

## 🚀 Fonctionnalités

- **Tableau de bord interactif** : Organisation des tâches en trois colonnes : *À Faire*, *En Cours* et *Terminées*.
- **Gestion complète (CRUD)** : 
    - Création de tickets avec titre et description.
    - Système de progression de statut "Suivant" (Démarrer -> Terminer).
    - Suppression définitive des tickets.
- **Dates dynamiques** : Affichage de la date de création et suivi du temps écoulé depuis la modification via Carbon.
- **Interface UI/UX** : 
    - Design épuré inspiré de Jira/Trello.
    - Arrière-plan personnalisé avec effet de flou (Glassmorphism) pour une meilleure lisibilité.
    - Responsive Design (Mobile & Desktop).

## 🛠️ Stack Technique

- **Framework** : Laravel 11
- **Base de données** : SQLite (moteur léger et performant pour ce test)
- **Frontend** : Blade & Tailwind CSS
- **Compilation** : Vite

## 📥 Installation

Suivez ces étapes pour installer le projet localement :

1. **Cloner le projet**
   ```bash
   git clone [https://github.com/Camille-lt/test-technique-todo.git](https://github.com/Camille-lt/test-technique-todo.git)
   cd test-technique-todo

2. **Installer les dépendances (PHP et JS)**
    composer install
    npm install

3. **Préparer l'environnement**
    cp .env.example .env
    php artisan key:generate

4. **Préparer l'environnement Configuration de la base de données**
    DB_CONNECTION=sqlite

5. **Migrations**
    php artisan migrate

6. **Lancer application avec 2 terminaux simultané**
    1. Laravel
        php artisan serve
    2. Vite - Compilation CSS
        npm run dev

Server sur : http://127.0.0.1:8000

