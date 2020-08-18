<?php
// src/Service/WalletService.php
namespace App\Service;
// entities
use App\Entity\Orders;
// services
use Doctrine\ORM\EntityManagerInterface;

/**
 * Order Service
*/
class OrderService
{
	// class Var
	protected $em;

    /*
    * construct
    */
    public function __construct(EntityManagerInterface $em)
    {
    	$this->em = $em;
    }


	/**
	* create Orders
	*/
	public function createOrder(array $arrData): ?bool {
		// crete Default Var
		$boolValidate = true;
		try {
			$cslOrder = new Orders();
    		// set Data
    		$cslOrder->setOrderNumber($arrData['refOrder']);
    		$cslOrder->setIdRequest($arrData['idRequest']);
    		$cslOrder->setCustomerName($arrData['name']);
    		$cslOrder->setCustomerEmail($arrData['email']);
    		$cslOrder->setCustomerMobile($arrData['phone']);
    		$cslOrder->setPaymentResult("");
    		$cslOrder->setCreatedAt(new \Datetime("now"));
    		$cslOrder->setUpdatedAt(new \Datetime("now"));
    		$cslOrder->setValue($arrData['value']);
    		$cslOrder->setStatus('CREATED');
    		// persit
    		$this->em->persist($cslOrder);
    		$this->em->flush();
   		} catch (\Exception $ex) {
   			$boolValidate = false;
   			echo "Error: ".$ex->getMessage();die;
   		}
   		// default Return
   		return $boolValidate;
	}


	/**
	* get User Orders
	*/
	public function getCustomerOrders(string $cstEmail = ""): ?array {
		// crete Default Var
		$arrOrders = array();
		try {
			// create Query Builder 
	    	$qb        = $this->em->createQueryBuilder();
	    	// create Query
	    	$arrOrders = $qb->select('o')
			   ->from(Orders::class, 'o')
			   // ->where('o.customerEmail = :customerEmail')
			   // ->setParameter('customerEmail', $cstEmail)
			   ->orderBy('o.created_at', 'ASC')
			   ->getQuery()
			   ->getResult();
   		} catch (\Exception $ex) {
   		}
   		// default Return
   		return $arrOrders;
	}


	/**
	* find Order By Reference
	*/
	public function findOrderByReference(string $refOrder = ""): ?object {
		// crete Default Var
		$objOrder = null;
		try {
			// create Query Builder 
	    	$qb        = $this->em->createQueryBuilder();
	    	// create Query
	    	$objOrder = $qb->select('o')
			   ->from(Orders::class, 'o')
			   ->where('o.orderNumber = :orderNumber')
			   ->setParameter('orderNumber', $refOrder)
			   ->getQuery()
			   ->setMaxResults(1)
			   ->getOneOrNullResult();
   		} catch (\Exception $ex) {
   		}
   		// default Return
   		return $objOrder;
	}	

	/**
	* assign Order Status
	*/
	public function assignOrderStatus(int $idOrder = 0, array $rstPayment, string $strStatus = "CREATED"):bool {
		// crete Default Var
		$booValidate = false;
		try {
	    	// load Order
	    	$order   = $this->em->find(Orders::class, $idOrder);
	    	// validate Order
	    	if($order) {
	    		// set Status
	    		$order->setPaymentResult(json_encode($rstPayment));
	    		$order->setStatus($strStatus);
	    		$this->em->persist($order);
	    		$this->em->flush();
	    		// set Boolean Validate
				$booValidate = true;
	    	}
   		} catch (\Exception $ex) {
   			echo "Error: ".$ex->getMessage();die;
   		}
   		// default Return
   		return $booValidate;
	}	
}