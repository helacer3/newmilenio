<?php
// src/Service/CustomerService.php
namespace App\Service;
// entities
use App\Entity\Customers;
// services
use Doctrine\ORM\EntityManagerInterface;

/**
 * Customer Service
*/
class CustomerService
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
	* find Customers
	*/
	public function findCustomers(): ?array {
		// crete Default Var
		$arrProducts = array();
		try {
			// create Query Builder 
	    	$qb        = $this->em->createQueryBuilder();
	    	// create Query
	    	$arrProducts = $qb->select('c')
			   ->from(Customers::class, 'c')
			   ->where('c.status = :status')
			   ->setParameter('status', 1)
			   ->getQuery()
			   ->getResult();
   		} catch (\Exception $ex) {
   			dd($ex);
   		}
   		// default Return
   		return $arrProducts;
	}	

	/**
	* find Customer By Id
	*/
	public function findCustomerById(int $idCustomer): ?object {
		// crete Default Var
		$objCustomer = null;
		try {
			// create Query Builder 
	    	$qb          = $this->em->createQueryBuilder();
	    	// create Query
	    	$objCustomer = $qb->select('c')
			   ->from(Customers::class, 'c')
			   ->where('c.id = :id')
			   ->andWhere('c.status = :status')
			   ->setParameter('id', $idCustomer)
			   ->setParameter('status', 1)
			   ->getQuery()
			   ->getOneOrNullResult();
   		} catch (\Exception $ex) {
   			//dd($ex);
   		}
   		// default Return
   		return $objCustomer;
	}

	/**
	* create Customer
	*/
	public function createCustomer(array $arrData): ?bool {
		// crete Default Var
		$boolValidate = true;
		try {
			$clsCustomer = new Customers();
    		// set Data
    		$clsCustomer->setDocumentType($arrData['documentType']);
    		$clsCustomer->setDocumentNumber($arrData['documentNumber']);
    		$clsCustomer->setFirstName($arrData['firtName']);
    		$clsCustomer->setLastName($arrData['lastName']);
    		$clsCustomer->setSurname($arrData['surname']);
    		$clsCustomer->setPhone($arrData['phone']);
    		$clsCustomer->setEmail($arrData['email']);
    		$clsCustomer->setIdDepartment($arrData['idDepartment']);
    		$clsCustomer->setIdCity($arrData['idCity']);
    		$clsCustomer->setStatus(1);
    		// persit
    		$this->em->persist($clsCustomer);
    		$this->em->flush();
   		} catch (\Exception $ex) {
   			$boolValidate = false;
   			echo "Error: ".$ex->getMessage();die;
   		}
   		// default Return
   		return $boolValidate;
	}
		
}