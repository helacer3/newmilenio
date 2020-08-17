<?php
namespace App\Controller;

use App\Controller\Base\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
// services
use App\Service\UserService;
use App\Service\WalletService;
use App\Service\ProductService;

/**
 * Controlador principal
 * @author Snayder Acero
 */
class IndexController extends BaseController
{
    /*
    * _construct
    */
    public function __construct()
    {
    }

    /**
    * @Route("/", name="product_store")
    */  
    public function productsStore()
    {
        return $this->render('store/listproducts.html.twig');
    }

    /**
    * @Route("/resume", name="resume_store")
    */  
    public function resumeStore()
    {
        return $this->render('store/resumeproduct.html.twig');
    }
}