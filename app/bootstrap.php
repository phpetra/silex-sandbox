<?php

// CUSTOM service example
/*$app['site_service'] = $app->share(function ($app) {
    return new \Pdx\Site\Service\DataService($app['db']);
});*/


// TWIG
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.options' => array(
        'cache'            => isset($app['twig.options.cache']) ? $app['twig.options.cache'] : false,
        'strict_variables' => true
    ),
    'twig.path'    => array(__DIR__ . '/../app/views')
));

// TWIG extensions
/*$app["twig"] = $app->share($app->extend("twig", function (\Twig_Environment $twig, Silex\Application $app) {
    //$twig->addExtension(new \Somewhere\Twig\StatusFilter($app));
    return $twig;
}));*/


$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

/*// SYMFONY FORM THING
$app->register(new Silex\Provider\ValidatorServiceProvider());
$app->register(new Silex\Provider\FormServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider());
$app->register(new Silex\Provider\SessionServiceProvider());
*/

// SWIFT MAILER
////$app->register(new Silex\Provider\SwiftmailerServiceProvider());
//$app['swiftmailer.use_spool'] = false;

// CACHE
$app->register(new Silex\Provider\HttpCacheServiceProvider());

// DOCTRINE DBAL
$app->register(new Silex\Provider\DoctrineServiceProvider());


return $app;