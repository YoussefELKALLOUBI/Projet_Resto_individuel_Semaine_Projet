# PhpProjectResto2021

AP 2SLAM - projet du premier semestre
Contexte
site r3st0.fr,site de critique (Cf. lafourchette, tripadvisor, etc.)
https://www.reseaucerta.org/decouverte-mvc-et-acces-aux-donnees-dans-une-application-web-en-php

# r3st0.fr

Site web de critique de restaurants en PHP/MySQL avec architecture MVC.

## Fonctionnalités

- Recherche de restaurants (nom, adresse, type de cuisine)
- Système de critiques et notes
- Gestion des favoris
- Profils utilisateur

## Installation

```bash
git clone https://github.com/username/r3st0-php-mvc.git
cd r3st0-php-mvc
```

Importer `database/r3st0.sql` dans MySQL et configurer `config/database.php`.

## Structure

- `modele/` - Accès aux données (PDO)
- `vue/` - Templates HTML/PHP  
- `controleur/` - Logique métier
- `config/` - Configuration BDD

## Technologies

PHP, MySQL, HTML/CSS, JS

## Base de données

Tables principales : resto, utilisateur, critiquer, aimer, typeCuisine

---

Projet BTS SIO - SI6
