<?php

namespace App;

use App\Models\CryptoPair;
use App\Models\CryptoPairCollection;
use Carbon\Carbon;
use GuzzleHttp\Client;


class ApiFetcher

{
    private const BASE_URL = 'https://pro-api.coinmarketcap.com/v1';

    private Client $httpClient;
    private string $apiKey;

    public function __construct()
    {
        $this->httpClient = new Client();
        $this->apiKey = 'f62bfbbf-5937-4e1c-b83a-5a1c2db77a13';
    }

    public function getTopPairs(): CryptoPairCollection
    {
        $client = new Client();

        $response = $client->request('GET', 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest', [
            'query' => [
                'start' => '1',
                'limit' => '100',
                'convert' => 'USD'
            ],
            'headers' => [
                'X-CMC_PRO_API_KEY' => $this->apiKey
            ]
        ]);

        $data = json_decode($response->getBody(), true);
        $collection = new CryptoPairCollection();

        foreach($data['data'] as $item) {

            if ($item['symbol'] == 'BTC' || $item['symbol'] == 'ETH' || $item['symbol'] == 'XRP'|| $item['symbol'] == 'BNB') {

                $pair = new CryptoPair(
                    $item['symbol'],
                    sprintf("%.2f", $item['quote']['USD']['price']),
                    sprintf("%.2f", $item['quote']['USD']['volume_24h']),
                    sprintf("%.2f", $item['quote']['USD']['volume_change_24h']),
                    sprintf("%.2f", $item['quote']['USD']['percent_change_24h'])
                );

                $collection->add($pair);
            }

        }

        return $collection;

    }

    public function getPair($pair): CryptoPairCollection
    {
        $client = new Client();

        $response = $client->request('GET', 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest', [
            'query' => [
                'start' => '1',
                'limit' => '100',
                'convert' => 'USD'
            ],
            'headers' => [
                'X-CMC_PRO_API_KEY' => $this->apiKey
            ]
        ]);

        $data = json_decode($response->getBody(), true);
        $collection = new CryptoPairCollection();

        foreach($data['data'] as $item) {

            if ($item['symbol'] == $pair) {

                $pair = new CryptoPair(
                    $item['symbol'],
                    sprintf("%.2f", $item['quote']['USD']['price']),
                    sprintf("%.2f", $item['quote']['USD']['volume_24h']),
                    sprintf("%.2f", $item['quote']['USD']['volume_change_24h']),
                    sprintf("%.2f", $item['quote']['USD']['percent_change_24h'])
                );

                $collection->add($pair);
            }

        }

        return $collection;

    }





}


