<?php

namespace MagedAhmad\TapPayment\Services;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CustomerService
{
    /**
     * @throws ValidationException
     */
    public function validateCustomerData($data): void
    {
        $validator = Validator::make($data, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'currency' => 'required',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }
}
