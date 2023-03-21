<?php

namespace MagedAhmad\TapPayment\Services;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class SubscribeService
{
    /**
     * @throws ValidationException
     */
    public function validateSubscribeData($data): void
    {
        $validator = Validator::make($data, [
            'interval' => 'required',
            'from' => 'required',
            'timezone' => 'required|string',

            'amount' => 'required',
            'currency' => 'required',
            'description' => 'nullable',
            'customer_id' => 'required',
            'card_id' => 'required',
            'post_url' => 'required'
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }

    public function setSubscribeData($data)
    {
        return [
            "term"=> [
                "interval"=> $data['interval'],
                "period"=> isset($data['period']) ? $data['period'] : 10,
                "from"=> $data['from'],
                "due"=> isset($data['due']) ? $data['due'] : 0,
                "auto_renew"=> isset($data['auto_renew']) ? $data['auto_renew'] : "true",
                "timezone"=> $data['timezone']
            ],
            "trial"=> [
                "days"=> 2,
                "amount"=> 0.1
            ],
            "charge"=> [
                "amount"=> $data['amount'],
                "currency"=> $data['currency'],
                "description"=> isset($data['description']) ? $data['description'] : "Test Description",
                "statement_descriptor"=> isset($data['statement_descriptor']) ? $data['statement_descriptor'] :  "Sample",
                "receipt"=> [
                    "email"=> "true",
                    "sms"=> "true"
                ],
                "customer"=> [
                    "id"=> $data['customer_id']
                ],
                "source"=> [
                    "id"=> $data['card_id']
                ],
                "post"=> [
                    "url"=> isset($data['post_url']) ?  $data['post_url'] : ''
                ]
            ]
        ];
    }
}
