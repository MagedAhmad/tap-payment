<?php

namespace MagedAhmad\TapPayment\Controllers;

use MagedAhmad\TapPayment\Services\CustomerService;

class CustomerController extends BaseController
{
    public CustomerService $customerService;
    
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;

        parent::__construct();
    }

    public function createCustomer($data)
    {
        $this->customerService->validateCustomerData($data);

        return $this->send('POST', '/customers', $data);
    }
}