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
	* assign Order Status
	*/
	public function assignOrderStatus(int $idOrder = 0, string $strStatus = "CREATED"):bool {
		// crete Default Var
		$booValidate = false;
		try {
	    	// load Order
	    	$order   = $this->em->find(Order::class, $idOrder);
	    	// validate Order
	    	if($order) {
	    		// set Status
	    		$order->setStatus($strStatus);
	    		$this->em->persist($order);
	    		$this->em->flush();
	    		// set Boolean Validate
				$booValidate = true;
	    	}
   		} catch (\Exception $ex) {
   		}
   		// default Return
   		return $booValidate;
	}	
}