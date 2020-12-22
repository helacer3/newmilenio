<?php
namespace App\Controller;

use App\Controller\Base\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

// service
use App\Service\ProductService;
use App\Service\OrderService;

/**
 * Controlador principal
 * @author Snayder Acero
 */
class IndexController extends BaseController
{
    /*
    * construct
    */
    public function __construct()
    {
    }

    /**
    * @Route("/", name="customer_list")
    */  
    public function listCustomers(CustomerService $customers)
    {
        // find Products
        //$arrProducts = $products->findProducts();
        // render View
        return $this->render('store/listcustomers.html.twig', array(
            //'arrProducts' => $arrProducts
        ));
    }
}