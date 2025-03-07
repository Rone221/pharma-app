# 📌 Gestion de Pharmacie - README

## **1️⃣ Présentation du Projet**

### **📌 Objectif du Projet**
L'application **Gestion de Pharmacie** permet de **simplifier la gestion des stocks de médicaments et des livraisons** pour une pharmacie. Elle garantit **un suivi précis des produits, fournisseurs et transactions**, tout en offrant une **interface sécurisée et intuitive**.

### **📌 Fonctionnalités Principales**
- ✅ **Gestion des Produits** : Ajout, modification, suppression et suivi des stocks.
- ✅ **Gestion des Fournisseurs** : Enregistrement et gestion des fournisseurs.
- ✅ **Gestion des Livraisons** : Suivi des livraisons et mise à jour des stocks.
- ✅ **Authentification Sécurisée** : Gestion des rôles et permissions avec Spatie.
- ✅ **Tableau de Bord** : Affichage des statistiques en temps réel.

### **📌 Technologies Utilisées**
- **Backend** : Laravel 10+
- **Frontend** : Livewire & Blade
- **Base de données** : SQLite
- **Authentification** : Laravel Breeze + Sanctum
- **Gestion des rôles et permissions** : Spatie Laravel Permission
- **Mise en page** : Bootstrap & TailwindCSS

---

## **2️⃣ Installation et Configuration**

### **📌 Prérequis**
- PHP 8+
- Composer
- Node.js & npm
- SQLite

### **📌 Étapes d’Installation**
```bash
git clone https://github.com/ton-repo/pharmacie.git
cd pharmacie
composer install
npm install && npm run dev
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

---

## **3️⃣ Gestion des Rôles et Permissions**

### **📌 Rôles Disponibles**
| **Rôle** | **Accès** |
|----------|--------------------------------|
| **Admin** | Gestion complète du système, utilisateurs, produits et livraisons. |
| **Pharmacien** | Gestion des produits et livraisons uniquement. |

### **📌 Attribuer un Rôle à un Utilisateur**
```php
use App\Models\User;
$user = User::find(1);
$user->assignRole('admin');
```

---

## **4️⃣ Architecture du Projet**

📂 **app/** → Modèles, contrôleurs et services.
📂 **routes/** → Routes Web (`web.php`) et API (`api.php`).
📂 **database/** → Migrations, seeders et factories.
📂 **resources/views/** → Vues Blade et composants Livewire.
📂 **public/** → Fichiers CSS, JavaScript et assets.

---

## **5️⃣ Développement Collaboratif**

### **📌 Workflow Git**
```bash
git checkout -b feature/nom-de-la-tâche
git add .
git commit -m "Description de la tâche"
git push origin feature/nom-de-la-tâche
```
Puis créer une **Pull Request (PR)** et attendre la validation avant fusion.

### **📌 Répartition des Tâches**
| **Membre** | **Tâche** |
|-----------|--------------------------------|
| **Rane** | Interface administration des produits (Livewire) |
| **Arona** | Gestion du tableau de bord (`Dashboard`) |
| **Babacar** | CRUD Produits & Protection des routes |
| **Ibnou** | CRUD Fournisseurs |
| **Momo** | CRUD Livraisons |

---

## **6️⃣ Tests et Débogage**

### **📌 Exécuter les tests Laravel**
```bash
php artisan test
```

### **📌 Tester les relations en Tinker**
```bash
php artisan tinker
use App\Models\Produit;
Produit::first()->fournisseur;
```

### **📌 Consulter les logs d’erreurs**
```bash
tail -f storage/logs/laravel.log
```

---

## **7️⃣ Déploiement**

### **📌 Déploiement en Production**
```bash
php artisan migrate --seed
npm run build
php artisan config:clear
php artisan serve
```

---

## **8️⃣ Support et Contribution**

📌 **Comment contribuer ?**
- Forker le projet, créer une branche, faire une PR.
- Signaler les bugs en ouvrant une issue GitHub.

📌 **Contact** : Pour toute question, contactez l’un des membres du projet.

🚀 **Merci de respecter les bonnes pratiques pour assurer un code propre et maintenable !**

