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
    protected $urlRequest;

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
        // get URl Request
        $this->urlRequest  = $this->params->get('PTP_URL_DEV');
    }

    /*
    * request Payment Status
    */
    public function requestPaymentStatus(string $refOrder): array {
        // crete Default Var
        $arrPayment = array(
            'status' => 'ERROR',
            'data'   => array()
        );
    	try {
	    	// instance Class Model
	    	$reqPayment  = $this->defineAuthCheckout($refOrder);
            // object Request Serializer
            $jsnRequest  = $this->srlService->serializerObjectToJson($reqPayment);
	    	// request Payment Rest
            $response    = $this->client->request(
                'POST',
                $this->urlRequest.$refOrder,
                array(
                    'headers' => array(
                        'Accept'       => 'application/json',
                        'Content-Type' => 'application/json',
                    ),
                    'body' => json_encode(array('auth' => json_decode($jsnRequest, true)))
                )    
            );
            // set Array Payment
            $arrPayment = array(
                'status' => 'OK',
                'data'   =>  $response->toArray()
            );
    	} catch (\Exception $ex) {
    		echo "Error: ".$ex->getMessage()."-".$ex->getFile()."-".$ex->getLine();die;
    	}
    	// default Return
    	return $arrPayment;
    }


/*
    * request Payment Status
    */
    public function requestPayment(string $refOrder, array $datUser): array {
        // crete Default Var
        $arrPayment = array(
            'status' => 'ERROR',
            'data'   => array()
        );
        try {
            // instance Class Model
            $reqPayment  = $this->defineWebCheckout($refOrder, $datUser);
            // object Request Serializer
            $jsnRequest  = $this->srlService->serializerObjectToJson($reqPayment);
            // request Payment Rest
            $response    = $this->client->request(
                'POST',
                $this->urlRequest,
                array(
                    'headers' => array(
                        'Accept'       => 'application/json',
                        'Content-Type' => 'application/json',
                    ),
                    'body' => $jsnRequest
                )    
            );
            // array Response
            $arrResponse = $response->toArray();
            // validate Response
            if ($arrResponse['status']['status'] == "OK") {
                // set Array Payment
                $arrPayment = array(
                    'status' => 'OK',
                    'data'   =>  array_merge(
                        $datUser,
                        array(
                            'refOrder'   => $refOrder,
                            'urlProcess' => $arrResponse['processUrl'],
                            'idRequest'  => $arrResponse['requestId']
                        )
                    )
                );
            }
        } catch (\Exception $ex) {
            echo "Error: ".$ex->getMessage()."-".$ex->getFile()."-".$ex->getLine();die;
        }
        // default Return
        return $arrPayment;
    }



	/*
    * define Auth Checkout
    */
    public function defineWebCheckout(string $refOrder, array $datUser):WebCheckout {
    	// instance Class Model
    	$webCheckout = new WebCheckout();
		$webCheckout->setAuth($this->defineAuthCheckout($refOrder));
    	$webCheckout->setBuyer($this->defineBuyerCheckout($datUser));
    	$webCheckout->setPayment($this->definePaymentCheckout($refOrder, $datUser));
    	$webCheckout->setLocale("en_CO");
    	$webCheckout->setExpiration("2020-11-05T00:00:00-05:00");
    	$webCheckout->setReturnUrl(
            $this->router->generate('response_payment', array('refOrder' => $refOrder), urlGeneratorInterface::ABSOLUTE_URL));
    	$webCheckout->setIpAddress("127.0.0.1");
    	$webCheckout->setUserAgent("PlacetoPay Sandbox");
    	// default Return
    	return $webCheckout;
    }


    /*
    * define Auth Checkout
    */
    public function defineAuthCheckout(string $refOrder):AuthCheckout {
        // instance Class Model
        $autCheckout = new AuthCheckout();
        // create Seed
        $trnSeed     = date('c');
        // nonce String
        $nonString   = "Orden: ".$refOrder;
        // nonce
        $trnNonce    = base64_encode($nonString); 
        // trn Key - Base64(SHA-1(nonce + seed + secretkey))
        $trnKey      = base64_encode(sha1($nonString.$trnSeed.$this->params->get('PTP_TRANKEY_DEV'), true));
        // set Model Values
    	$autCheckout->setLogin($this->params->get('PTP_LOGIN_DEV'));
    	$autCheckout->setTranKey($trnKey);
    	$autCheckout->setNonce($trnNonce);
    	$autCheckout->setSeed($trnSeed);
    	// default Return
    	return $autCheckout;
    }

    /*
    * define Pay Checkout
    */
    public function definePaymentCheckout(string $refOrder, array $datUser):PaymentCheckout {
    	// instance Class Model
    	$payCheckout = new PaymentCheckout();
    	$payCheckout->setReference($refOrder);
    	$payCheckout->setDescription("Compra prueba en PlaceToPay");
    	$payCheckout->setAmount(
    		array(
    			'currency' => 'COP',
    			'total'    => $datUser['value'] 
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