<?php
namespace App\Controller;

use App\Controller\Base\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

// service
use App\Service\CustomerService;

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
        // find Customers
        $arrCustomers = $customers->findCustomers();
        // render View
        return $this->render('customer/listcustomers.html.twig', array(
            'arrCustomers' => $arrCustomers
        ));
    }

    /**
    * @Route("/create", name="customer_create")
    */  
    public function createCustomer(CustomerService $customers)
    {
        // render View
        return $this->render('customer/newcustomers.html.twig', array(
        ));
    }
}