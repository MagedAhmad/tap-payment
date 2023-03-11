<?php

namespace MagedAhmad\TapPayment\Controllers;

use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Validation\ValidationException;
use MagedAhmad\TapPayment\Services\SubscribeService;

class SubscribeController extends BaseController
{
    public $subscribeService;

    public function __construct(SubscribeService $subscribeService)
    {
        $this->subscribeService = $subscribeService;

        parent::__construct();
    }

    /**
     * @throws GuzzleException
     * @throws ValidationException
     */
    public function subscribe($data): ResponseInterface
    {
        $this->subscribeService->validateSubscribeData($data);

        return $this->send('POST', 'subscription/v1/', $data);
    }

    /**
     * @throws GuzzleException
     */
    public function find($id): ResponseInterface
    {
        return $this->send('get', 'subscription/v1/' . $id);
    }

    /**
     * @throws GuzzleException
     */
    public function list(): ResponseInterface
    {
        return $this->send('post', 'subscription/v1/list');
    }

    /**
     * @throws GuzzleException
     */
    public function cancel($id): ResponseInterface
    {
        return $this->send('DELETE', 'subscription/v1/' . $id);
    }
}
