<?php
namespace App\Controller;

use App\Controller\Base\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
// service
use App\Service\ProductService;
use App\Service\OrderService;
use App\Service\PayService;

/**
 * Controlador pagos
 * @author Snayder Acero
 */
class PaymentController extends BaseController
{
    protected $payService;
    protected $ordService;
    protected $productService;

    /*
    * construct
    */
    public function __construct(ProductService $productService, PayService $payService, OrderService $ordService)
    {
        $this->productService = $productService;
        $this->payService     = $payService;
        $this->ordService     = $ordService;
    }

    /**
    * @Route("/processPayment", name="process_payment")
    */  
    public function processPayment(Request $request)
    {
        // id Product
        $productId  = $request->request->get('cst_id');
        // load Product
        $objProduct = $this->productService->findProductById($productId);
        // request Vars
        $datUser    = array (
            'value' => (float)$objProduct->getValue(),
            'name'  => $request->request->get('cst_name', ''),
            'email' => $request->request->get('cst_email', ''),
            'phone' => $request->request->get('cst_phone', '')
        );
        // reference ID Generate
        $refOrder   = uniqid('test_');
        // call service Payment
        $arrPayment = $this->payService->requestPayment($refOrder, $datUser);
        // validate Status
        if ($arrPayment['status'] == 'OK') {
            // create Order
            $this->ordService->createOrder($productId, $arrPayment['data']);
            // redirect User
            return $this->redirect($arrPayment['data']['urlProcess']);
        }
        // temporal Error
        die("No se logro procesar el pago");
        
    }

    /**
    * @Route("/responsePayment/{refOrder}", name="response_payment")
    */  
    public function responsePayment(string $refOrder)
    {
        // define Id Request
        $objOrder  = $this->ordService->findOrderByReference($refOrder);
        // validate Object
        if ($objOrder != null) {
            // call service Payment Status
            $arrPayment = $this->payService->requestPaymentStatus($objOrder->getIdRequest());            
            // validate Status
            if ($arrPayment['status'] == "OK") {
                // set Order Status
                $ordStatus = ($arrPayment['data']['status']['status'] == "APPROVED") ? "PAYED": "REJECTED";
                // assign Order Status
                $this->ordService->assignOrderStatus($objOrder->getId(), $arrPayment['data'], $ordStatus);
            }
        }
        // redirect to Orders Report
        return $this->redirectToRoute('orders_store');
    }
}