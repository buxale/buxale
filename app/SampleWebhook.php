<?php

namespace App;

use Illuminate\Support\Facades\Http;

class SampleWebhook
{
    public static function fire(CustomerWebhook $customerWebhook)
    {
        Http::withToken($customerWebhook->auth_token)->post($customerWebhook->webhook,
            array(
                'ref_id' => 'CUSTOM_REFERENCE',
                'session_id' => 'cs_test_000000000000000000000000000000000000',
                'voucher' =>
                    array(
                        'id' => 2,
                        'user_id' => 1,
                        'code' => 'e9a9c736-4078-4b16-8bb6-3d3d7f9a9213',
                        'value' => 15,
                        'meta' => NULL,
                        'beneficiary_company' => 'buxale GmbH',
                        'beneficiary_name' => 'Vittorio Emmermann',
                        'beneficiary_street' => 'Bachstraße',
                        'beneficiary_street_no' => '2',
                        'beneficiary_zip' => '37081',
                        'beneficiary_city' => 'Göttingen',
                        'beneficiary_country' => 'Deutschland',
                        'beneficiary_email' => 'vittorio@buxale.io',
                        'beneficiary_phone' => '015100000000',
                        'customer_name' => NULL,
                        'customer_street' => NULL,
                        'customer_street_no' => NULL,
                        'customer_zip' => NULL,
                        'customer_city' => NULL,
                        'customer_country' => NULL,
                        'customer_email' => NULL,
                        'customer_phone' => NULL,
                        'created_at' => '2020-03-23T23:58:48.000000Z',
                        'updated_at' => '2020-03-23T23:58:48.000000Z',
                        'deleted_at' => NULL,
                        'paid_at' => NULL,
                    ),
            )
        );
    }
}
