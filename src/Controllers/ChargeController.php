<?php

namespace MagedAhmad\TapPayment\Controllers;

use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Validation\ValidationException;
use MagedAhmad\TapPayment\Services\ChargeService;

class ChargeController extends BaseController
{
    public $chargeService;

    public function __construct(ChargeService $chargeService)
    {
        $this->chargeService = $chargeService;

        parent::__construct();
    }

    /**
     * @throws GuzzleException
     * @throws ValidationException
     */
    public function charge($data): ResponseInterface
    {
        $this->chargeService->validateChargeData($data);

        $data = $this->chargeService->setChargeData($data);

        return $this->send('POST', '/charges', $data);
    }

    /**
     * @throws GuzzleException
     */
    public function find($id): ResponseInterface
    {
        return $this->send('GET', '/charges/' . $id);
    }
}
