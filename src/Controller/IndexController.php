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
    * @Route("/", name="product_store")
    */  
    public function productsStore(ProductService $products)
    {
        // find Products
        $arrProducts = $products->findProducts();
        // render View
        return $this->render('store/listproducts.html.twig', array(
            'arrProducts' => $arrProducts
        ));
    }

    /**
    * @Route("/resume", name="resume_store")
    */  
    public function resumeStore(Request $request, ProductService $products)
    {
        // request ID
        $id = $request->query->get('id');
        // find Product
        $objProduct = $products->findProductById($id);
        // render View
        return $this->render('store/resumeproduct.html.twig', array(
            'objProduct' => $objProduct
        ));
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