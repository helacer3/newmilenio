<?php
namespace App\Controller;

use App\Controller\Base\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
// service
use App\Service\PayService;

/**
 * Controlador pagos
 * @author Snayder Acero
 */
class PaymentController extends BaseController
{
    protected $payService;

    /*
    * construct
    */
    public function __construct(PayService $payService)
    {
        $this->payService = $payService;
    }

    /**
    * @Route("/processPayment", name="process_payment")
    */  
    public function processPayment(Request $request)
    {
        // request Vars
        $datUser = array(
            'name'  => $request->request->get('cst_name', ''),
            'email' => $request->request->get('cst_email', ''),
            'phone' => $request->request->get('cst_phone', '')
        );
        // reference ID Generate
        $refOrder = uniqid('test_');
        // call service Payment
        $this->payService->requestPayment($refOrder, $datUser);
    }

    /**
    * @Route("/responsePayment", name="response_payment")
    */  
    public function responsePayment(Request $request)
    {
       
    }
}