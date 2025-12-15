# ✈️ AirVoyage3

**AirVoyage3** est une plateforme de gestion de réservations de vols développée avec Laravel. Elle permet aux compagnies aériennes de publier leurs offres, aux transitaires de rechercher et réserver des vols, et aux administrateurs de gérer l'ensemble du système.

## 📋 Table des matières

- [Fonctionnalités](#-fonctionnalités)
- [Technologies utilisées](#-technologies-utilisées)
- [Prérequis](#-prérequis)
- [Installation](#-installation)
- [Configuration](#-configuration)
- [Utilisation](#-utilisation)
- [Structure du projet](#-structure-du-projet)
- [Rôles et permissions](#-rôles-et-permissions)
- [Contribuer](#-contribuer)
- [Licence](#-licence)

## 🚀 Fonctionnalités

### Pour les Administrateurs
- Gestion des compagnies aériennes (validation, création, suppression)
- Gestion des transitaires (validation, création, suppression)
- Supervision de toutes les offres de vols
- Gestion complète des réservations
- Tableau de bord statistique

### Pour les Compagnies Aériennes
- Création et publication d'offres de vols
- Upload du logo de la compagnie
- Gestion de leurs offres (modification, suppression)
- Suivi des réservations sur leurs vols
- Validation ou rejet des réservations
- Notification par email des changements de statut

### Pour les Transitaires
- Recherche avancée de vols disponibles
- Réservation de vols
- Suivi de leurs réservations
- Formulaire de contact
- Tableau de bord personnalisé

### Fonctionnalités générales
- Système d'authentification sécurisé avec gestion de rôles
- Notifications par email automatiques
- Interface responsive et intuitive
- Gestion des contacts et demandes

## 🛠️ Technologies utilisées

- **Backend:** Laravel 10.x
- **Frontend:** Blade Templates, TailwindCSS
- **Base de données:** MySQL
- **Authentication:** Laravel Breeze
- **Email:** Laravel Mail
- **Asset Building:** Vite
- **Package Manager:** Composer, NPM

## 📦 Prérequis

Avant de commencer, assurez-vous d'avoir installé :

- PHP >= 8.1
- Composer
- Node.js >= 16.x
- NPM ou Yarn
- MySQL >= 5.7 ou MariaDB
- Git

## 💻 Installation

1. **Cloner le dépôt**
```bash
git clone https://github.com/votre-username/AirVoyage3.git
cd AirVoyage3
```

2. **Installer les dépendances PHP**
```bash
composer install
```

3. **Installer les dépendances JavaScript**
```bash
npm install
```

4. **Copier le fichier d'environnement**
```bash
cp .env.example .env
```

5. **Générer la clé d'application**
```bash
php artisan key:generate
```

6. **Configurer la base de données**

Éditez le fichier `.env` avec vos informations de base de données :
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=airvoyage3
DB_USERNAME=root
DB_PASSWORD=
```

7. **Exécuter les migrations**
```bash
php artisan migrate
```

8. **Créer le lien symbolique pour le storage**
```bash
php artisan storage:link
```

9. **Compiler les assets**
```bash
npm run dev
```

10. **Lancer le serveur de développement**
```bash
php artisan serve
```

L'application sera accessible à l'adresse : `http://localhost:8000`

## ⚙️ Configuration

### Configuration Email

Pour activer les notifications par email, configurez les paramètres SMTP dans le fichier `.env` :

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@airvoyage3.com
MAIL_FROM_NAME="${APP_NAME}"
```

### Seeders (optionnel)

Pour créer des données de test :
```bash
php artisan db:seed
```

## 📖 Utilisation

### Accès aux différents espaces

- **Page d'accueil:** `/`
- **Connexion:** `/Login`
- **Inscription Transitaire:** `/sign-up-transitaire`
- **Inscription Compagnie:** `/sign-up-compagnie`
- **Connexion Admin:** `/AdminLogin`

### Comptes par défaut

Après avoir exécuté les seeders, vous pouvez utiliser :
- **Admin:** admin@airvoyage.com
- **Compagnie:** compagnie@example.com
- **Transitaire:** transitaire@example.com

(Mot de passe par défaut: `password`)

## 📁 Structure du projet

```
AirVoyage3/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/AdminController.php
│   │   ├── CompagnieAerienne/CompagnieAerienneController.php
│   │   └── Transitaire/TransitaireController.php
│   ├── Mail/
│   │   ├── ApprovedAccountMail.php
│   │   ├── RejectedAccountMail.php
│   │   └── ReservationStatusUpdated.php
│   └── Models/
│       ├── User.php
│       ├── offre.php
│       ├── reservation.php
│       └── Contact.php
├── database/migrations/
├── resources/
│   ├── views/
│   │   ├── admin/
│   │   ├── CompagnieAerienne/
│   │   └── Transitaire/
│   ├── css/
│   └── js/
├── routes/
│   ├── web.php
│   ├── api.php
│   └── auth.php
└── public/
```

## 👥 Rôles et permissions

Le système utilise 3 rôles principaux :

1. **Admin** - Gestion complète de la plateforme
2. **CompagnieAerienne** - Gestion des offres et réservations
3. **Transitaire** - Recherche et réservation de vols

Les permissions sont gérées via le middleware `role` dans les routes.

## 🤝 Contribuer

Les contributions sont les bienvenues ! Pour contribuer :

1. Forkez le projet
2. Créez une branche pour votre fonctionnalité (`git checkout -b feature/AmazingFeature`)
3. Committez vos changements (`git commit -m 'Add some AmazingFeature'`)
4. Poussez vers la branche (`git push origin feature/AmazingFeature`)
5. Ouvrez une Pull Request

## 📝 Licence

Ce projet est sous licence MIT. Voir le fichier `LICENSE` pour plus de détails.

## 📧 Contact

Pour toute question ou suggestion, n'hésitez pas à nous contacter via le formulaire de contact de l'application.

---

Développé avec ❤️ par l'équipe AirVoyage3
