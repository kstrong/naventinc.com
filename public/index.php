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

$app->get('/projects', function () use ($app) {
  $app->render('pages/projects.html', ['slideshow' => true]);
});

$app->get('/projects/neg-client-projects', function () use ($app) {
  $app->render('pages/client_projects.html');
});

$app->get('/projects/projects-in-development', function () use ($app) {
  $app->render('pages/projects_in_development.html');
});

$projects_pages = [
  // client projects
  'fantasy-dream' => 'fantasy_dream.html',
  'film-tv-production' => 'film_tv_production.html',
  'guinness-museum' => 'guinness_museum.html',
  'hollywood-wax-museum' => 'hollywood_wax_museum.html',
  'misc-projects' => 'misc_projects.html',
  'monster-mansion' => 'monster_mansion.html',
  // projects in development
  'aqua-pirate-adventure' => 'aqua_pirate_adventure.html',
  'd-world-resort' => 'd-world_resort.html',
  'jungle-bots-adventure' => 'jungle_bots_adventure.html',
  'robotics-touring-show' => 'robotics_touring_show.html',
  'triad' => 'triad.html',
];

foreach ($projects_pages as $uri => $template) {
  $app->get('/projects/'.$uri, function () use ($app, $template) {
    $app->render('pages/projects/'.$template, ['slideshow' => true]);
  });
}

$app->get('/services', function () use ($app) {
  $app->render('services.html');
});

$services_pages = [
  'robotics-engineering' => 'robotics_engineering.html',
  'special-effects' => 'special_effects.html',
  'show-action-equipment' => 'show_action_equipment.html',
  'wax-figures' => 'wax_figures.html',
  'maintains-rehab' => 'maintains_rehab.html',
];

foreach ($services_pages as $uri => $template) {
  $app->get('/services/'.$uri, function () use ($app, $template) {
    $app->render('pages/services/'.$template, ['slideshow' => true]);
  });
}

$app->get('/company', function () use ($app) {
  $app->render('company.html');
});

$app->get('/company/about', function () use ($app) {
  $app->render('about.html', ['slideshow' => true]);
});

$app->get('/company/executive-team', function () use ($app) {
  $app->render('pages/executive_team.html');
});

$app->get('/contact', function () use ($app) {
  $app->render('contact.html');
});

$app->get('/key-players', function () use ($app) {
  $app->render('pages/key_players.html');
});

$app->run();
