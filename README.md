Note de Frais
========================

Dans le cadre de ma formation au CESI de Nantes, les étudiants devaient réalisé un projet en PHP.

Technologie utilisée 
-----------------------
* Langage : PHP 5.5.12
* Serveur local : WAMP
* Base de données MySQL
* IDE : Netbeans 8.0.2
* Framework : [**Symfony2**][1] avec bootstrap

Les bundles utilisés avec Symfony2
-----------------------------------
* [**FOSUserBundle**][14] : Gestion des utilisateurs
* [**PHPExcel**][15] : Gestion des fichiers EXCEL
* [**ObHighchartsBundle**][16] : Gestion des graphiques

Le besoin du projet
-----------------------
* Projet uniquement en PHP
* Import d'un fichier EXCEL 
* Enregistrement des informations du EXCEL dans la base de données
* Mode administrateur 


Entités de la base de données 

* User : qui étend BaseUser du FOSUserBundle, contient les utilisateurs inscrits
* Categorie : contient les catégories et sous catégories
* LigneFrais : contient le montant pour une catégorie et date donnée.

Fonctionnalité du projet
-------------------------

Pour l'utilisateur :
* Importation du fichier EXCEL
* Graphe avec les catégories sur les notes de frais importées.

Pour l'administrateur :
* Importation du fichier EXCEL
* Graphique avec tous les utilisateurs et toutes les catégories.

Symfony Standard Edition
========================

Welcome to the Symfony Standard Edition - a fully-functional Symfony2
application that you can use as the skeleton for your new applications.

For details on how to download and get started with Symfony, see the
[Installation][1] chapter of the Symfony Documentation.

What's inside?
--------------

The Symfony Standard Edition is configured with the following defaults:

  * An AppBundle you can use to start coding;

  * Twig as the only configured template engine;

  * Doctrine ORM/DBAL;

  * Swiftmailer;

  * Annotations enabled for everything.

It comes pre-configured with the following bundles:

  * **FrameworkBundle** - The core Symfony framework bundle

  * [**SensioFrameworkExtraBundle**][6] - Adds several enhancements, including
    template and routing annotation capability

  * [**DoctrineBundle**][7] - Adds support for the Doctrine ORM

  * [**TwigBundle**][8] - Adds support for the Twig templating engine

  * [**SecurityBundle**][9] - Adds security by integrating Symfony's security
    component

  * [**SwiftmailerBundle**][10] - Adds support for Swiftmailer, a library for
    sending emails

  * [**MonologBundle**][11] - Adds support for Monolog, a logging library

  * [**AsseticBundle**][12] - Adds support for Assetic, an asset processing
    library

  * **WebProfilerBundle** (in dev/test env) - Adds profiling functionality and
    the web debug toolbar

  * **SensioDistributionBundle** (in dev/test env) - Adds functionality for
    configuring and working with Symfony distributions

  * [**SensioGeneratorBundle**][13] (in dev/test env) - Adds code generation
    capabilities

All libraries and bundles included in the Symfony Standard Edition are
released under the MIT or BSD license.

Enjoy!

[1]:  http://symfony.com/doc/2.6/book/installation.html
[6]:  http://symfony.com/doc/2.6/bundles/SensioFrameworkExtraBundle/index.html
[7]:  http://symfony.com/doc/2.6/book/doctrine.html
[8]:  http://symfony.com/doc/2.6/book/templating.html
[9]:  http://symfony.com/doc/2.6/book/security.html
[10]: http://symfony.com/doc/2.6/cookbook/email.html
[11]: http://symfony.com/doc/2.6/cookbook/logging/monolog.html
[12]: http://symfony.com/doc/2.6/cookbook/assetic/asset_management.html
[13]: http://symfony.com/doc/2.6/bundles/SensioGeneratorBundle/index.html
[14]: https://github.com/FriendsOfSymfony/FOSUserBundle
[15]: https://github.com/PHPOffice/PHPExcel
[16]: https://github.com/marcaube/ObHighchartsBundle