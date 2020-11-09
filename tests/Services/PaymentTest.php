<?php
namespace App\Tests\Services;

use App\Service\PayService;
use PHPUnit\Framework\TestCase;

class PaymentTest extends TestCase
{
	/**
	* test Payment
	*/
    public function testPayment()
    {
        $payment  = new PayService();
        $refOrder = uniqid('TEST_'); 
        $datUser  = array (
            'value' => 100000,
            'name'  => 'Name Test',
            'email' => 'test@gmail.com',
            'phone' => '3134567890'
        );
        $result  = $payment->requestPayment($refOrder, $datuser);

        $this->assertEquals(42, $result);
    }
}