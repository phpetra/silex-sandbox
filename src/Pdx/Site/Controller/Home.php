<?php

namespace Pdx\Site\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class Home
 * Simple demo controller
 *
 */
class Home
{

    public function page(Request $request, Application $app)
    {
        return $app['twig']->render('home.html.twig', array());
    }

}