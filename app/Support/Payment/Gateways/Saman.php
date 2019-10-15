<?php

namespace App\Support\Payment\Gateways;

use App\Order;
use Illuminate\Http\Request;

class Saman implements GatewayInterface
{
    private $merchantID;
    private $callback;

    public function __construct()
    {
        $this->merchantID = 'EdTWTFUP-0d1bMF';
        $this->callback = route('payment.verify', $this->getName());
    }

    public function pay(Order $order)
    {
//        return $this->redirectToBank($order);
//        dd('Saman Pay');
//        return redirect($this->redirectToBank($order));
//        dd($this->redirectToBank($order));
        $this->redirectToBank($order);
//        $this->redirectToBank($order);
    }


    private function redirectToBank($order)
    {
//        https://sep.shaparak.ir/payment.aspx
        $amount = $order->amount + 10000;
        echo "<form id='samanpeyment' action='http://banktest.ir/gateway/saman/gate' method='post'>
        <input type='hidden' name='Amount' value='{$amount}' />
        <input type='hidden' name='ResNum' value='{$order->code}'>
        <input type='hidden' name='RedirectURL' value='{$this->callback}'/>
        <input type='hidden' name='MID' value='{$this->merchantID}'/>
        </form><script>document.forms['samanpeyment'].submit()</script>";
    }


    public function verify(Request $request)
    {

//        'https://acquirer.samanepay.com/payments/referencepayment.asmx?WSDL'
        $soapClient = new \SoapClient('http://banktest.ir/gateway/saman/payments/referencepayment?wsdl');

        $response = $soapClient->VerifyTransaction($request->input('RefNum'), $this->merchantID);

        $order = $this->getOrder($request->input('ResNum'));

//
//        $response = $order->amount + 10000;
//        $request->merge(['RefNum' => 'http://banktest.ir/gateway/saman/Payments/InitPayment?wsdl']);
////
        return $response == ($order->amount + 10000)
            ? $this->transactionSuccess($order, $request->input('RefNum'))
            : $this->transactionFailed();
    }

    private function getOrder($resNum)
    {
        return Order::where('code', $resNum)->firstOrFail();
    }

    private function transactionFailed(){
        return [
            'status' => self::TRANSACTION_FAILED,
        ];
    }


    private function transactionSuccess($order, $refNum)
    {
        return [
            'status' => self::TRANSACTION_SUCCESS,
            'order' => $order,
            'refNum' => $refNum,
            'gateway' => $this->getName()
        ];
    }


    public function getName(): string
    {
        return 'saman';
    }
}
