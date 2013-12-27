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
  $app->render('products.html', ['slideshow' => true]);
});

$app->get('/projects', function () use ($app) {
  $app->render('pages/projects.html', ['slideshow' => true]);
});

$app->get('/projects/neg-client-projects', function () use ($app) {
  $app->render('pages/client_projects.html');
});

$app->get('/services', function () use ($app) {
  $app->render('services.html');
});

$app->get('/services/robotics-engineering', function () use ($app) {
  $app->render('robotics_engineering.html', ['slideshow' => true]);
});

$app->get('/services/special-effects', function () use ($app) {
  $app->render('special_effects.html', ['slideshow' => true]);
});

$app->get('/services/show-action-equipment', function () use ($app) {
  $app->render('show_action_equipment.html', ['slideshow' => true]);
});

$app->get('/services/wax-figures', function () use ($app) {
  $app->render('wax_figures.html', ['slideshow' => true]);
});

$app->get('/services/maintains-rehab', function () use ($app) {
  $app->render('maintains_rehab.html', ['slideshow' => true]);
});

$app->get('/company', function () use ($app) {
  $app->render('company.html');
});

$app->get('/company/about', function () use ($app) {
  $app->render('about.html', ['slideshow' => true]);
});

$app->get('/contact', function () use ($app) {
  $app->render('contact.html');
});

$app->run();
