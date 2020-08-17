<?php
namespace App\Controller;

use App\Controller\Base\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
// services
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
    * @Route("/", name="product_store")
    */  
    public function productsStore()
    {
        /*
        TO DO
        Llamado al servicio con la informacin de los productos
        */
        return $this->render('store/listproducts.html.twig');
    }

    /**
    * @Route("/resume", name="resume_store")
    */  
    public function resumeStore()
    {
        return $this->render('store/resumeproduct.html.twig');
    }

    /**
    * @Route("/showOrders", name="orders_store")
    */  
    public function ordersStore(OrderService $orderService)
    {
        // user Email on Session
        $cstEmail = "";
        // get Customer Orders
        $cstOrders = $orderService->getCustomerOrders($cstEmail);
        // render View
        return $this->render('reports/saleslist.html.twig', array(
                'cstOrders' => $cstOrders
            )
        );
    }
}