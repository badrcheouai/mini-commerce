# Mini Site E-commerce

Ce projet est un mini site e-commerce réalisé en PHP (MVC simplifié) avec MySQL. Il permet de parcourir des produits, filtrer par catégorie, consulter les détails, gérer un panier, et simuler une commande enregistrée en base.

## Fonctionnalités
- Parcourir les produits avec image, nom, prix (DHS)
- Filtrer par catégorie
- Détails produit avec description et bouton Ajouter au panier
- Panier: ajout, mise à jour quantités, suppression, total automatique
- Checkout: formulaire client et enregistrement de la commande (orders, order_items)

## Technologies
- Backend: PHP 8+
- Base de données: MySQL
- Frontend: HTML, Bootstrap 5
- Architecture: MVC simplifié

## Schéma de base de données
Collez ici votre PlantUML ou une capture du diagramme.

## Installation
1. Copier le dossier dans C:\xampp\htdocs\mini-commerce (ou cloner le repo).
2. Créer la base mini_commerce et exécuter les scripts SQL de création de tables et d'exemples.
3. Configurer config/database.php (hôte, utilisateur, mot de passe).
4. Lancer Apache (XAMPP) et accéder à http://localhost/mini-commerce/.

## Utilisation
- Page d'accueil: liste des produits et filtre catégorie.
- Détails: cliquer le nom du produit.
- Panier: bouton "Ajouter au panier", puis gérer quantités/suppressions.
- Commande: "Passer la commande", remplir le formulaire, valider.

## Structure du projet
- index.php: routeur principal (actions: home, show, addToCart, showCart, updateCart, removeCart, checkout, placeOrder)
- controllers/: HomeController.php, ProductController.php, CartController.php, OrderController.php
- models/: Product.php, Order.php
- views/: home.php, product_details.php, cart.php, checkout.php, order_success.php, header.php
- public/: css/, images/

## Notes
- Les images doivent se trouver dans public/images/ et correspondre aux noms stockés en base.
- La devise affichée est le Dirham Marocain (DHS).
