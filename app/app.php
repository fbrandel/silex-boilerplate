<?php
require __DIR__.'/bootstrap.php';

$app = new Silex\Application();
$app['debug'] = true;

// Extensions
$app->register(new Silex\Extension\TwigExtension(), array(
    'twig.path'       => __DIR__.'/views',
    'twig.class_path' => __DIR__.'/../vendor/Twig/lib',
));

// Routes
$app->get('/', function () use ($app) {
     return $app['twig']->render('index.twig', array(
               'title' => "Hello World",
               ));
});

return $app;
