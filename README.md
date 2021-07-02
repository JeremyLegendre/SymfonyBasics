# Projet basique en Symfony

Environnement Windows:

 - Symfony 5.3
 - PHP 7.4.20 
 - XAMPP Control Panel 3.3.0 pour APACHE et MySQL
 - Composer 2.1.3 

# Commandes Symfony

## Server

Lancer le server : 
```
symfony server:start 
symfony server:start -d // démarrage en arrière plan
```

Stopper le server: 
```
symfony server:stop
```

## Ajout de package

Penser a aller voir les packages disponibles sur [https://flex.symfony.com](flex.symfony)

En ligne de commande: 
```
composer req <package_alias>
composer require <package_alias>
```

## Création

### Projet
```
symfony new <project_name>                              // Symfony CLI
composer create-project symfony/skeleton <project_name> // Composer
```

### Controller
```
symfony console make:controller
```

### Entity
```
symfony console make:entity
```

### BDD
```
symfony console doctrine:database:create        // Creation
symfony console doctrine:database:drop          // Suppression
symfony console make:migration                  // Créer une version de migration
symfony console doctrine:migrations:migrate     // Lancer la migration
symfony console doctrine:fixtures:load          // Lancer la génération des données fixtures (écrase!)
```

### Dashboard Administration
```
symfony console make:admin:dashboard    // Creation Controller DashBoard
symfony console make:admin:crud         // Création Class CRUD (Create, Read, Update, Delete)
```

###  Forms
Install via composer : composer req symfony/form

```
symfony console make:form               
```

Après avoir créer les CRUDController, penser à rajouter les liens dans le dashboard

## Debug

Voir les routes associées au projet : 
```
symfony console debug:route
```

A propos de DOCTRINE :

ENTITY      => Objet métier représentant une Table
MANAGER     => Manipulation des données (persist, flush)
REPOSITORY  => Sélection des données  