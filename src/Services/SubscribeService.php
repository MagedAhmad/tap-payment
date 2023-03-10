<?php

namespace MagedAhmad\TapPayment\Services;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class SubscribeService
{
    public function validateSubscribeData($data)
    {
        $validator = Validator::make($data, [
            'interval' => 'required',
            'from' => 'required',
            'auto_renew' => 'required',
            'timezone' => 'required|string',

            'amount' => 'required',
            'currency' => 'required',
            'description' => 'nullable',
            'customer_id' => 'required',
            'source_id' => 'required',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }
}
