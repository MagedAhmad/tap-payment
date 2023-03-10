<?php

namespace MagedAhmad\TapPayment\Controllers;

use MagedAhmad\TapPayment\Services\SubscribeService;

class SubscribeController extends BaseController
{
    public SubscribeService $subscribeService;

    public function __construct(SubscribeService $subscribeService)
    {
        $this->subscribeService = $subscribeService;

        parent::__construct();
    }

    public function subscribe($data)
    {
        $this->subscribeService->validateSubscribeData($data);

        return $this->send('POST', 'subscription/v1/', $data);
    }

    public function find($id)
    {
        return $this->send('get', 'subscription/v1/' . $id);
    }

    public function list()
    {
        return $this->send('post', 'subscription/v1/list');
    }

    public function cancel($id)
    {
        return $this->send('DELETE', 'subscription/v1/' . $id);
    }
}
