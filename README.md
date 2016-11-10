REST API Symfony2

Dependences
composer.phar require "friendsofsymfony/rest-bundle" "@dev"
composer.phar require "jms/serializer-bundle" "@dev"
composer.phar require "nelmio/api-doc-bundle" "@dev"
composer require "lexik/jwt-authentication-bundle"

Mis à jour de la base de donnée
app/console doctrine:schema:update --force



Routes
![Alt text](/images/routes.PNG?raw=true "Optional Title")
