<?php

namespace App;

use App\Reservation;
use Omnipay\Omnipay;

/**
 * Class PayPal
 * @package App
 */
class PayPal
{
    /**
     * @return mixed
     */
    public function gateway()
    {
        $gateway = Omnipay::create('PayPal_Express');

        $gateway->setUsername(config('services.paypal.username'));
        $gateway->setPassword(config('services.paypal.password'));
        $gateway->setSignature(config('services.paypal.signature'));
        $gateway->setTestMode(config('services.paypal.sandbox'));

        return $gateway;
    }

    /**
     * @param array $parameters
     * @return mixed
     */
    public function purchase(array $parameters)
    {
        $response = $this->gateway()
            ->purchase($parameters)
            ->send();

        return $response;
    }

    /**
     * @param array $parameters
     */
    public function complete(array $parameters)
    {
        $response = $this->gateway()
            ->completePurchase($parameters)
            ->send();

        return $response;
    }

    /**
     * @param $amount
     */
    public function formatAmount($amount)
    {
        return number_format($amount, 2, '.', '');
    }

    /**
     * @param $order
     */
    public function getCancelUrl($order)
    {
        // $order = Reservation::where('order_id', $order)->first();

        return route('paypal.checkout.cancelled', $order);
    }

    /**
     * @param $order
     */
    public function getReturnUrl($order)
    {
        // $order = Reservation::where('order_id', $order)->first();

        return route('paypal.checkout.completed', $order);
    }

    /**
     * @param $order
     */
    public function getNotifyUrl($order)
    {
        $env = config('services.paypal.sandbox') ? "sandbox" : "live";

        return route('webhook.paypal.ipn', [$order, $env]);
    }
}