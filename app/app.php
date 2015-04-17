<?php
  require_once __DIR__ ."/../vendor/autoload.php";
  require_once __DIR__ ."/../src/Stylist.php";

  $app = new Silex\Application();
  $app['debub'] = true;

  $DB = new PDO('pgsql:host=localhost; dbname=hair_salon');

  $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__ .'/../views'));

  use Symfony\Component\HttpFoundation\Request;
  Request::enableHttpMethodParameterOverride();


  //*************HOME**************

  //displays links to home page with links to stylists individual pages
  $app->get("/", function () use ($app)
  {
    return $app['twig']->render('index.twig');
  });


  //*************STYLISTS**************

  //READ- displays ALL stylists in DB
  $app->get("/stylists", function() use($app)
  {
    return $app['twig']->render('stylists.twig')
  });

  //CREATE- a new stylist- receives ALL info from the form
  $app->post("/add_stylist", function () use ($app)
  {

    return $app['twig']->render('stylists.twig')
  });

  //DELETE- deletes ALL stylists in DB
  $app->post("/delete_stylists", function () use ($app)
  {

    return $app['twig']->render('stylists.twig')
  });

  

?>
