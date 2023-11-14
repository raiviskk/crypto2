<?php

namespace App\Controllers;

use App\ApiFetcher;
use App\Response;


class IndexController
{
    private ApiFetcher $api;

    public function __construct()
    {
        $this->api = new ApiFetcher();
    }

    public function index(): Response
    {
        $data = $this->api->getTopPairs();
        $template = 'index';
        $data = ['pairs' => $data->getPairs()];
        return new Response($template, $data);
    }

}

