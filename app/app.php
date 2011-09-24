<?php
require __DIR__.'/bootstrap.php';

use Symfony\Component\Yaml\Yaml;

$app = new Silex\Application();

// Configuration
$app['autoloader']->registerNamespace("Symfony\Component\Yaml", __DIR__."/../vendor");
$app['config'] = Yaml::parse(__DIR__."/config/config.yml");

$app['debug'] = $app['config']['debug'];

// Extensions
$app->register(new Silex\Provider\TwigServiceProvider(), array(
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
