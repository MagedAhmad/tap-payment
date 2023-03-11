<?php

namespace MagedAhmad\TapPayment\Controllers;

use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Validation\ValidationException;
use MagedAhmad\TapPayment\Services\CustomerService;

class CustomerController extends BaseController
{
    public $customerService;
    
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;

        parent::__construct();
    }

    /**
     * @throws GuzzleException
     * @throws ValidationException
     */
    public function createCustomer($data): ResponseInterface
    {
        $this->customerService->validateCustomerData($data);

        return $this->send('POST', '/customers', $data);
    }
}
