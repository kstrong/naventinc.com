<?php
require __DIR__.'/../vendor/autoload.php';

$app = new \Slim\Slim(array(
  'templates.path' => '../templates',
  'view' => new \Slim\Views\Twig()
));

$view = $app->view();
$view->parserOptions = array(
  'debug' => true,
  'cache' => __DIR__.'/../cache'
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

$app->get('/services', function () use ($app) {
  $app->render('services.html');
});

$app->get('/company', function () use ($app) {
  $app->render('company.html');
});

$app->get('/company/about', function () use ($app) {
  $app->render('about.html');
});

$app->get('/contact', function () use ($app) {
  $app->render('contact.html');
});

$app->run();
