<?php
// src/Service/ProductService.php
namespace App\Service;
// entities
use App\Entity\Product;
// services
use Doctrine\ORM\EntityManagerInterface;

/**
 * Product Service
*/
class ProductService
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
	* find Products
	*/
	public function findProducts(): ?array {
		// crete Default Var
		$arrProducts = array();
		try {
			// create Query Builder 
	    	$qb        = $this->em->createQueryBuilder();
	    	// create Query
	    	$arrProducts = $qb->select('p')
			   ->from(Product::class, 'p')
			   ->where('p.status = :status')
			   ->orderBy('p.updated_at', 'DESC')
			   ->setParameter('status', 1)
			   ->getQuery()
			   ->getResult();
   		} catch (\Exception $ex) {
   			//dd($ex);
   		}
   		// default Return
   		return $arrProducts;
	}	

	/**
	* find Product By Id
	*/
	public function findProductById(int $idProduct): ?object {
		// crete Default Var
		$objProduct = null;
		try {
			// create Query Builder 
	    	$qb        = $this->em->createQueryBuilder();
	    	// create Query
	    	$objProduct = $qb->select('p')
			   ->from(Product::class, 'p')
			   ->where('p.id = :id')
			   ->andWhere('p.status = :status')
			   ->setParameter('id', $idProduct	)
			   ->setParameter('status', 1)
			   ->getQuery()
			   ->getOneOrNullResult();
   		} catch (\Exception $ex) {
   			//dd($ex);
   		}
   		// default Return
   		return $objProduct;
	}
	
		
}