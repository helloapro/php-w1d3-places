<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/places.php";

    session_start();
    if (empty($_SESSION['list_of_places'])) {
        $_SESSION['list_of_places'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('places-form.html.twig');
    //    return main_form();
    });

    $app->get("/view-places", function() use ($app) {
        $city_name = $_GET['city'];
        $stay_length = $_GET['stayLength'];
        $visit_type = $_GET['visitType'];

        $working_place = new Place($city_name, $stay_length, $visit_type);
        //array_push($_SESSION['list_of_places'], $working_place);
        $working_place->save();


        return $app['twig']->render('places-list.html.twig', array('places' => Place::getAll()));
    });

    $app->post("/delete_places", function() use ($app) {
        Place::deleteAll();
        return $app['twig']->render('delete_places.html.twig');

    });

    return $app;
?>
