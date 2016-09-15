<?php

use Cart\App;
use Illuminate\Database\Capsule\Manager as Capsule;
use Slim\Views\Twig;
use Braintree_Configuration as BrainConfig;

session_start();

require __DIR__.'/../vendor/autoload.php';

$app = new App;

$container = $app->getContainer();

$capsule = new Capsule;
$capsule->addConnection([
    'driver'=>'mysql',
    'host'=>'localhost',
    'database'=>'cart',
    'username'=>'root',
    'password'=>'',
    'charset'=>'utf8',
    'collation'=>'utf8_unicode_ci',
    'prefix'=>''
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();

BrainConfig::environment('sandbox');
BrainConfig::merchantId('76r4ht5kqqth997v');
BrainConfig::publicKey('58y2nwf2qppn4gr5');
BrainConfig::privateKey('fa4f627928436ec6067f414c0977c566');

require __DIR__ . '/../app/routes.php';

$app->add(new \Cart\Middleware\VErrorsMiddleware($container->get(Twig::class)));
$app->add(new \Cart\Middleware\OldInputMiddleware($container->get(Twig::class)));