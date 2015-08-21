<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Client.php";
    require_once __DIR__."/../src/Stylist.php";

    // Enable patch and delete http methods in order to use them for routes
    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    $app = new Silex\Application();

    $server = 'mysql:host=localhost;dbname=hair_salon';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    // Landing page. [R]ead
    $app->get("/", function() use ($app) {

    });

    // [C]reate Stylist, display all stylists
    $app->post("/stylists", function() use ($app) {
        // make new stylist object, save, render all stylists
    });

    // [R]ead one particular Stylist
    $app->get("/stylists/{id}", function($id) use ($app) {

    });

    // [U]pdate a particular Stylist
    $app->patch("/stylists/{id}", function($id) use ($app) {

    });

    // Form for editing a Stylist
    $app->get("/stylists/{id}/edit", function($id) use ($app) {

    });

    // [D]elete a particular Stylist
    $app->delete("/stylists/{id}", function($id) use ($app) {

    });




    // Client routes
    // [C]reate a Client associated with a particular Stylist
    $app->post("/clients", function() use ($app) {

    });

    // [U]pdate a particular Client
    $app->patch("/clients/{id}", function($id) use ($app) {

    });

    // [D]elete a particular Client
    $app->delete("/clients/{id}", function($id) use ($app) {

    });

    // Display Client edit form
    $app->get("/clients/{id}", function($id) use ($app) {

    });

    return $app;
?>
