<?php
// src/Service/WalletService.php
namespace App\Service;
// services
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use App\Service\SerializerService;
// models
use App\Model\Payments\PlacetoPay\WebCheckout;
use App\Model\Payments\PlacetoPay\AuthCheckout;
use App\Model\Payments\PlacetoPay\PaymentCheckout;
use App\Model\Payments\PlacetoPay\BuyerCheckout;

/**
 * Pay Service
*/
class PayService
{
	// class Var
	protected $em;
	protected $params;
	protected $router;
    protected $client;
    protected $srlService;

    /*
    * construct
    */
    public function __construct(
        EntityManagerInterface $em, ParameterBagInterface $params, 
        UrlGeneratorInterface $router, HttpClientInterface $client, 
        SerializerService $srlService)
    {
    	$this->em          = $em;
    	$this->params      = $params;
    	$this->router      = $router;
        $this->client      = $client;
        $this->srlService  = $srlService;
    }

    /*
    * request Payment
    */
    public function requestPayment(string $refOrder, array $datUser) {
    	try {
	    	// instance Class Model
	    	$reqPayment  = $this->defineWebCheckout($refOrder, $datUser);
            // object Request Serializer
            $jsnRequest  = $this->srlService->serializerObjectToJson($reqPayment);
            //dd($jsnRequest);
	    	// get URl Request
	    	$urlRequest  = $this->params->get('PTP_URL_DEV');
	    	// request Payment Rest
            $response = $this->client->request(
                'POST',
                "https://test.placetopay.com/redirection/api/session/",
                array('body' => $jsnRequest)
            );
            dd($response);
    	} catch (\Exception $ex) {
    		echo "Error: ".$ex->getMessage()."-".$ex->getFile()."-".$ex->getLine();die;
    	}
    	// default Return
    	return $reqPayment;
    }

	/*
    * define Auth Checkout
    */
    public function defineWebCheckout(string $refOrder, array $datUser):WebCheckout {
    	// instance Class Model
    	$webCheckout = new WebCheckout();
		$webCheckout->setAuth($this->defineAuthCheckout($refOrder));
    	$webCheckout->setBuyer($this->defineBuyerCheckout($datUser));
    	$webCheckout->setPayment($this->definePaymentCheckout($refOrder));
    	$webCheckout->setLocale("en_CO");
    	$webCheckout->setExpiration("2020-11-05T00:00:00-05:00");
    	$webCheckout->setReturnUrl($this->router->generate('response_payment', array(), urlGeneratorInterface::ABSOLUTE_URL));
    	$webCheckout->setIpAddress("127.0.0.1");
    	$webCheckout->setUserAgent("PlacetoPay Sandbox");
    	// default Return
    	return $webCheckout;
    }


    /*
    * define Auth Checkout
    */
    public function defineAuthCheckout(string $refOrder):AuthCheckout {
        // create Datetime
        $objDateTime = new \DateTime('NOW', new \DateTimeZone('America/Bogota'));
    	// instance Class Model
    	$autCheckout = new AuthCheckout();
    	$autCheckout->setLogin($this->params->get('PTP_LOGIN_DEV'));
    	$autCheckout->setTranKey($this->params->get('PTP_TRANKEY_DEV'));
    	$autCheckout->setNonce(base64_encode("Orden: ".$refOrder));
    	$autCheckout->setSeed($objDateTime->format('c'));
    	// default Return
    	return $autCheckout;
    }

    /*
    * define Pay Checkout
    */
    public function definePaymentCheckout(string $refOrder):PaymentCheckout {
    	// instance Class Model
    	$payCheckout = new PaymentCheckout();
    	$payCheckout->setReference($refOrder);
    	$payCheckout->setDescription("Compra prueba en PlaceToPay");
    	$payCheckout->setAmount(
    		array(
    			'currency' => 'COP',
    			'total'    => 200000 
    		)
    	);
    	$payCheckout->setAllowPartial(false);
    	// default Return
    	return $payCheckout;
    }
 	
 	/*
    * define Buyer Checkout
    */
    public function defineBuyerCheckout(array $datUser):BuyerCheckout {
    	// instance Class Model
    	$buyCheckout = new BuyerCheckout();
    	$buyCheckout->setName($datUser['name']);
    	$buyCheckout->setSurname("Castro");
    	$buyCheckout->setEmail($datUser['email']);
    	$buyCheckout->setDocument("1234567890");
    	$buyCheckout->setDocumentType("CC");
    	$buyCheckout->setMobile($datUser['phone']);
    	// default Return
    	return $buyCheckout;
    }
}