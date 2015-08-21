<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Client.php";
    require_once __DIR__."/../src/Stylist.php";

    // Enable patch and delete http methods in order to use them for routes
    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    $app = new Silex\Application();

    $server = 'mysql:host=localhost:3306;dbname=hair_salon';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));




    // Landing page. [R]ead
    $app->get("/", function() use ($app) {
        return $app['twig']->render('index.html.twig', array(
            'stylists' => Stylist::getAll()
        ));
    });

    // [D]elete all stylists and clients
    $app->delete("/", function() use ($app) {
        Stylist::deleteAll();
        Client::deleteAll();

        return $app['twig']->render('index.html.twig', array(
            'clients' => Client::getAll()
        ));
    });

    // [C]reate Stylist, display all stylists
    $app->post("/stylists", function() use ($app) {
        $new_stylist = new Stylist(
            $_POST['name'],
            $_POST['phone'],
            $_POST['specialty'],
            $_POST['weekends']
        );
        $new_stylist->save();
        return $app['twig']->render('index.html.twig', array(
            'stylists' => Stylist::getAll()
        ));
    });

    // [R]ead one particular Stylist
    $app->get("/stylists/{id}", function($id) use ($app) {
        $stylist = Stylist::find($id);
        return $app['twig']->render('stylist.html.twig', array(
            'stylist' => $stylist,
            'clients' => $stylist->getClients()
        ));
    });

    // [U]pdate a particular Stylist
    $app->patch("/stylists/{id}", function($id) use ($app) {
        $stylist = Stylist::find($id);
        $stylist->updatePhone($_POST['phone']);
        return $app['twig']->render('stylist.html.twig', array(
            'stylist' => $stylist,
            'clients' => $stylist->getClients()
        ));
    });

    // Form for editing a Stylist
    $app->get("/stylists/{id}/edit", function($id) use ($app) {
        $stylist = Stylist::find($id);
        return $app['twig']->render('stylist_edit.html.twig', array(
            'stylist' => $stylist
        ));
    });

    // [D]elete a particular Stylist, display remaining Stylists
    $app->delete("/stylists/{id}", function($id) use ($app) {
        $stylist = Stylist::find($id);
        $stylist->delete();
        return $app['twig']->render('index.html.twig', array(
            'stylists' => Stylist::getAll()
        ));
    });

    // [D]elete all stylists
    //////////


    // Client routes
    // [C]reate a Client associated with a particular Stylist
    // (stylist_id will come from secret field in client entry form)
    // Then display clients of current stylist.
    $app->post("/clients", function() use ($app) {
        $new_client = new Client(
            $_POST['name'],
            $_POST['phone'],
            $_POST['stylist_id']
        );
        $new_client->save();

        $stylist = Stylist::find($_POST['stylist_id']);

        return $app['twig']->render('stylist.html.twig', array(
            'stylist' => $stylist,
            'clients' => $stylist->getClients()
        ));
    });

    // [U]pdate a particular Client
    $app->patch("/clients/{id}", function($id) use ($app) {
        $client = Client::find($id);
        $client->updatePhone($_POST['phone']);

        //Get current stylist to display on feedback page
        $stylist_id = $client->getStylistId();
        $stylist = Stylist::find($stylist_id);

        return $app['twig']->render('stylist.html.twig', array(
            'stylist' => $stylist,
            'clients' => $stylist->getClients()
        ));
    });

    // [D]elete a particular Client
    $app->delete("/clients/{id}", function($id) use ($app) {
        // Get stylist_id from client before we delete him/her
        $client = Client::find($id);
        $stylist_id = $client->getStylistId();
        $client->delete();

        $stylist = Stylist::find($stylist_id);

        return $app['twig']->render('stylist.html.twig', array(
            'stylist' => $stylist,
            'clients' => $stylist->getClients()
        ));
    });

    // Display Client edit form
    $app->get("/clients/{id}", function($id) use ($app) {
        $client = Client::find($id);

        return $app['twig']->render('client_edit.html.twig', array(
            'client' => $client
        ));
    });

    return $app;
?>
