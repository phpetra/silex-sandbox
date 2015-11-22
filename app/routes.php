<?php
/**
 * Define your routes here
 *
 */

// homepage
$app->get('/', 'Pdx\Site\Controller\Home::page')->bind('home');


$app->mount('/sample', new \Pdx\Site\Provider\SampleProvider());


// Error route
$app->error(function (\Exception $e, $code) use ($app) {
    switch ($code) {
        case 404:
            $message = $app['twig']->render('404.html.twig');
            break;
        default:
            $message = 'Oops, something went wrong.';
    }

    if ($app['debug']) {
        $message .= ' Error Message: ' . $e->getMessage();
    }

    return new Symfony\Component\HttpFoundation\Response($message, $code);
});

return $app;