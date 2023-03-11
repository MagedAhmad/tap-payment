<?php 

namespace MagedAhmad\TapPayment\Controllers;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\GuzzleException;

class BaseController
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @throws GuzzleException
     */
    public function send($method, $url, $body = []): ResponseInterface
    {
        return $this->client->request(
            $method,
            config('tap-payment.api_url') . $url,
            [
                'form_params' => $body,
                'headers' => [
                    'Authorization' => 'Bearer ' . config('tap-payment.api_key'),
                    'Accept'        => 'application/json',
                ]
            ]);
    }
}
