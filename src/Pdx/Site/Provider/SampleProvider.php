<?php

namespace Pdx\Site\Provider;

use Silex\Application;
use Silex\ControllerProviderInterface;

use Silex\Provider\FormServiceProvider;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


/**
 * Class SampleProvider
 *
 * @package Pdx\Site
 */
class SampleProvider implements ControllerProviderInterface
{

    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];

        $controllers->get('/', array(new self(), 'showAll'))->bind('sample-all');
        $controllers->get('/{id}', array(new self(), 'showDetail'))->bind('sample-detail')->value('id', null);

        return $controllers;
    }

    /**
     * Lists all
     *
     * @param Application $app
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function showAll(Application $app)
    {
        // get from somewhere, db, sqlite, json file
        $samples = json_decode(file_get_contents(__DIR__ . '/../../../../data/sample.json'));
        return $app['twig']->render('sample/list.html.twig', array('samples' => $samples));
    }

    /**
     * Show details page
     *
     * @param Application $app
     * @param $id
     */
    public function showDetail(Application $app, $id)
    {
        $samples = json_decode(file_get_contents(__DIR__ . '/../../../../data/sample.json'));
        $sample = $samples[$id-1];
        return $app['twig']->render('sample/detail.html.twig', array('sample' => $sample));
    }

}