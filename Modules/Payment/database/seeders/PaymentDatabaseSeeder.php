<?php

namespace Modules\Payment\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Currency\Models\Currency;
use Modules\Payment\Models\Payment;

class PaymentDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $sourcePath = public_path('admin/img/icons/payment');
        copyFilesToStorage($sourcePath, 'website');


       $payments = [
            [
                'key' => 'cash_on_delivery',
                'value' => [
                    'status' => 1,
                    'image' => 'uploads/website/cash-on-delivery.png',
                ],
            ],
            [
                'key' => 'stripe',
                'value' => [
                    'stripe_secret' => env('STRIPE_SECRET', ''),
                    'stripe_client' => env('STRIPE_KEY', ''),
                    'currency' => Currency::first()?->id,
                    'gateway_charge' => 0,
                    'status' => 1,
                    'image' => 'uploads/website/stripe.png',
                ],
            ],
            [
                'key' => 'paypal',
                'value' => [
                    'paypal_app_id' => config('paypal.' . config('paypal.mode') . '.app_id'),
                    'paypal_client_id' => config('paypal.' . config('paypal.mode') . '.client_id'),
                    'paypal_secret_key' => config('paypal.' . config('paypal.mode') . '.client_secret'),
                    'paypal_account_mode' => config('paypal.mode', 'sandbox'),
                    'currency' => Currency::first()?->id,
                    'gateway_charge' => 5,
                    'status' => 1,
                    'image' => 'uploads/website/paypal.png',
                ]
            ]
        ];

        foreach ($payments as $payment) {
            Payment::updateOrCreate(
                ['key' => $payment['key']],
                ['value' => $payment['value']]
            );
        }
    }
}
