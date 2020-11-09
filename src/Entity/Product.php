<?php

/** 
 * This file is part of the Energizee helper.
 *
 * @author Snayder Acero <helacer3@yahoo.es>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Clase con la información de los products
 * @author Snayder Acero
 * @ORM\Table(name="products")
 * @ORM\Entity
 */
class Product
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="product_name", type="string", length=40, nullable=false)
     */
    protected $productName;

    /**
     * @var string
     *
     * @ORM\Column(name="product_sku", type="string", length=10, nullable=false)
     */
    protected $productSku;

    /**
     * @var string
     *
     * @ORM\Column(name="product_image", type="string", length=250, nullable=false)
     */
    protected $productImage;

    
    /**
     * @var datetime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    protected $created_at;

    /**
     * @var datetime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     */
    protected $updated_at;

    /**
     * @var float
     *
     * @ORM\Column(name="value", type="float", nullable=false)
     */
    protected $value;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Status", type="boolean", nullable=false)
     */
    protected $status;

    


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * @param string $productName
     *
     * @return self
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;

        return $this;
    }

    /**
     * @return string
     */
    public function getProductSku()
    {
        return $this->productSku;
    }

    /**
     * @param string $productSku
     *
     * @return self
     */
    public function setProductSku($productSku)
    {
        $this->productSku = $productSku;

        return $this;
    }

    /**
     * @return string
     */
    public function getProductImage()
    {
        return $this->productImage;
    }

    /**
     * @param string $productImage
     *
     * @return self
     */
    public function setProductImage($productImage)
    {
        $this->productImage = $productImage;

        return $this;
    }

    /**
     * @return datetime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param datetime $created_at
     *
     * @return self
     */
    public function setCreatedAt(datetime $created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * @return datetime
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @param datetime $updated_at
     *
     * @return self
     */
    public function setUpdatedAt(datetime $updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param float $value
     *
     * @return self
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     *
     * @return self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }
}