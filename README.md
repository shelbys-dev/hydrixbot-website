# 🌐 HydrixBot — Site Officiel

Le **site web d’HydrixBot** sert de vitrine et de tableau de bord connecté à la base de données du bot Discord.  
Construit avec **Laravel**, **MySQL**, et **Filament**, il offre une interface moderne pour suivre les statistiques du bot, gérer la configuration, et consulter les informations publiques (ToS, Privacy, Docs…).

---

## 🚀 Fonctionnalités principales

### 🖥️ Landing Page
- Présentation du bot (logo, description, liens d’invitation)
- Statistiques dynamiques : nombre de serveurs et d’utilisateurs  
  → synchronisés en temps réel via l’API Express intégrée au bot (`/api/stats`)

### ⚙️ Dashboard Admin (Filament)
- Gestion **des configurations serveur** (auto-messages, rôles, annonces, etc.)
- Affichage des données depuis la **base MySQL du bot**
- Edition dynamique des pages légales (ToS / Privacy Policy)
- Gestion de la **navbar**, **documents**, et **liens du site**
- Versionnage des pages légales pour suivi historique

### 📡 API HydrixBot ↔ Site
L’API Express (dans le bot) expose :
```json
GET /api/stats
{
  "guilds": 42,
  "members": 1820,
  "updatedAt": "2025-10-09T14:00:00.000Z"
}
````

Cette route est utilisée côté Laravel pour alimenter les statistiques visibles sur la page d’accueil.

---

## 🧱 Stack Technique

| Technologie                   | Utilisation                             |
| ----------------------------- | --------------------------------------- |
| **Laravel 12**                | Framework principal du site             |
| **MySQL**                     | Base de données commune avec le bot     |
| **Filament 3**                | Back-office administrateur              |
| **Breeze / Vite / Bootstrap** | Authentification & build frontend       |
| **GSAP**                      | Animations fluides sur la landing page  |
| **Express (Node.js)**         | API légère exposée par le bot           |
| **Discord.js v14**            | Gestion du bot Discord connecté à la DB |

---

## 🧩 Architecture globale

```
hydrixbot/
├─ app/
│  ├─ Providers/Filament/  # Panels & Widgets
│  └─ Http/Controllers/    # API internes
├─ resources/views/        # Templates Blade
├─ public/                 # Assets & build
├─ database/migrations/    # Migrations Laravel
└─ routes/web.php          # Routes principales
```

---

## ⚙️ Installation locale

### 1️⃣ Cloner le dépôt

```bash
git clone https://github.com/shelbys-dev/hydrixbot-website.git
cd hydrixbot-website
```

### 2️⃣ Installer les dépendances

```bash
composer install
npm install
```

### 3️⃣ Configurer l’environnement

Créer un fichier `.env` à la racine :

```env
APP_NAME=HydrixBot
APP_ENV=local
APP_KEY=base64:xxxxxxxxxxxxxxxx
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=hydrixbot
DB_USERNAME=root
DB_PASSWORD=secret
```

### 4️⃣ Migrer la base et lancer le serveur

```bash
php artisan migrate
php artisan serve
```

---

## 🧠 Connexion à l’API du bot

### Via proxy Laravel (`/api/bot/stats`)

Laravel fait office de passerelle vers l’API du bot pour éviter les problèmes CORS :

```php
// routes/web.php
Route::get('/api/bot/stats', function () {
    return Http::get('http://127.0.0.1:3001/api/stats')->json();
});
```

---

## 🔐 Sécurité

* Aucune donnée sensible (tokens, IDs) n’est exposée côté front.
* Les endpoints API sont **read-only** et uniquement destinés au site officiel.
* Accès au panel admin restreint par authentification Filament.

---

## 📚 Pages dynamiques

* `/` → Landing Page
* `/docs` → Documentation du bot
* `/tos` → Conditions d’utilisation
* `/privacy` → Politique de confidentialité
* `/admin` → Panel Filament

---

## 🧾 Licence

Ce projet est sous licence **MIT** — libre d’utilisation et de modification avec attribution.

---

## 💡 Auteur

👤 **Shelby S. — ShelbyDev**
🔗 [https://hydrixbot.shelbydev.fr](https://hydrixbot.shelbydev.fr)
💬 Discord : `shelby_dev`

```
