<?php

namespace App\Http\Controllers;

use App\Order;
use App\PayPal;
use App\Reservation;
use Illuminate\Http\Request;

/**
 * Class PayPalController
 * @package App\Http\Controllers
 */
class PayPalController extends Controller
{
    /**
     * @param Request $request
     */
    public function form($order_id, Request $request)
    {
        $reservation = Reservation::where('order_id',$order_id)->value('order_id');
        $data['order'] = Order::where('id', $reservation)->first();

        return view('admin.slots.paypal', $data);
    }

    /**
     * @param $order_id
     * @param Request $request
     */
    public function checkout($order_id, Request $request)
    {
        $order = Order::where('id', $order_id)->first();

        $paypal = new PayPal;

        $response = $paypal->purchase([
            'amount' => $paypal->formatAmount($request->amount),
            'transactionId' => $order->id,
            'currency' => 'USD',
            'cancelUrl' => $paypal->getCancelUrl($order->id),
            'returnUrl' => $paypal->getReturnUrl($order->id),
        ]);

        if ($response->isRedirect()) {
            $response->redirect();
        }

        return redirect()->back()->with([
            'message' => $response->getMessage(),
        ]);
    }

    /**
     * @param $order_id
     * @param Request $request
     * @return mixed
     */
    public function completed($order_id, Request $request)
    {
        $order = Order::where('id',$order_id)->first();

        $paypal = new PayPal;

        $response = $paypal->complete([
            'amount' => $paypal->formatAmount($order->amount),
            'transactionId' => $order->id,
            'currency' => 'USD',
            'cancelUrl' => $paypal->getCancelUrl($order->id),
            'returnUrl' => $paypal->getReturnUrl($order->id),
            'notifyUrl' => $paypal->getNotifyUrl($order->id),
        ]);

        if ($response->isSuccessful()) {
            $order->update([
                'transaction_id' => $response->getTransactionReference(),
                'payment_status' => Order::PAYMENT_COMPLETED,
            ]);

            return redirect()->route('order.paypal', $order->id)->with([
                'message' => 'Your recent payment is sucessful with reference code ' . $response->getTransactionReference(),
            ]);
        }

        return redirect()->back()->with([
            'message' => $response->getMessage(),
        ]);
    }

    /**
     * @param $order_id
     */
    public function cancelled($order_id)
    {
        $order = Order::where('id',$order_id)->first();
        Order::where('id', $order->id)->delete();
        Reservation::where('order_id',$order->id)->delete();

        return redirect()->route('field.list')->with([
            'message' => 'You have cancelled your recent PayPal payment !',
        ]);
    }

        /**
     * @param $order_id
     * @param $env
     * @param Request $request
     */
    public function webhook($order_id, $env, Request $request)
    {
        // to do with new release of sudiptpa/paypal-ipn v3.0 (under development)
    }
}
