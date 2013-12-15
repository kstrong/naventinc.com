<?php
require __DIR__.'/../vendor/autoload.php';

$app = new \Slim\Slim(array(
  'templates.path' => '../templates',
  'view' => new \Slim\Views\Twig()
));

$view = $app->view();
$view->parserOptions = array(
  'debug' => true,
  'cache' => dirname(__FILE__).'/../cache'
);
$view->parserExtensions = array(
  new \Slim\Views\TwigExtension()
);

$app->get('/', function () use ($app) {
  $app->render('homepage.html');
});

$app->get('/products', function () use ($app) {
  $app->render('products.html');
});

$app->run();
