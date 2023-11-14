<?php

namespace App\Controllers;

use App\ApiFetcher;
use App\Response;


class CryptoController
{
    private ApiFetcher $api;

    public function __construct()
    {
        $this->api = new ApiFetcher();
    }

    public function index(): Response
    {
        $queryParameters = $_GET;
        $query = $queryParameters['what'] ?? '';

        $data = $this->api->getPair($query);
        $template = 'index';
        $data = ['pairs' => $data->getPairs()];
        return new Response($template, $data);
    }

}

