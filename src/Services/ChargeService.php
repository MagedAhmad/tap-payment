<?php

namespace MagedAhmad\TapPayment\Services;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ChargeService
{
    /**
     * @throws ValidationException
     */
    public function validateChargeData($data): void
    {
        $validator = Validator::make($data, [
            'amount' => 'required',
            'email' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'currency' => 'required',
            'redirect' => 'required',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }

    public function setChargeData($data): array
    {
        return [
            "amount" => round($data['amount'],2),
            "description" =>  'Hello '. $data['first_name'].' '.$data['last_name']. ' please pay and confirm your order Thanks.',
            "currency" => $data['currency'],
            "save_card" => true,
            "receipt" => [
                "email" => true,
                "sms" => true
            ],
            "customer"=> [
                "first_name"=> $data['first_name'],
                "last_name"=> $data['last_name'],
                "email"=> $data['email'],
                "phone"=> [
                    "country_code" => $data['country_code'],
                    "number" => $data['phone']
                ]
            ],
            "source"=> [
                "id" => "src_all"
            ],
            "redirect"=> [
                "url"=> $data['redirect']
            ]
        ];
    }
}
