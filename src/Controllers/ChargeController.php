<?php

namespace MagedAhmad\TapPayment\Controllers;

use MagedAhmad\TapPayment\Services\ChargeService;

class ChargeController extends BaseController
{
    public ChargeService $chargeService;

    public function __construct(ChargeService $chargeService)
    {
        $this->chargeService = $chargeService;

        parent::__construct();
    }

    public function charge($data)
    {
        $this->chargeService->validateChargeData($data);

        $data = $this->chargeService->setChargeData($data);

        return $this->send('POST', '/charges', $data);
    }

    public function find($id)
    {
        return $this->send('GET', '/charges/' . $id);
    }
}
