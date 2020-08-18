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
// entities
use App\Entity\User;

/**
 * Clase con la información de la Orden
 * @author Snayder Acero
 * @ORM\Table(name="orders")
 * @ORM\Entity
 */
class Orders
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
     * @ORM\Column(name="order_number", type="string", length=20, nullable=false)
     */
    protected $orderNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="id_request", type="string", length=10, nullable=false)
     */
    protected $idRequest;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_name", type="string", length=100, nullable=false)
     */
    protected $customerName;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_email", type="string", length=50, nullable=false)
     */
    protected $customerEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_mobile", type="string", length=15, nullable=false)
     */
    protected $customerMobile;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_result", type="text", nullable=true)
     */
    protected $paymentResult;

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
     * @var string
     *
     * @ORM\Column(name="Status", type="string", nullable=false)
     */
    protected $status;

    /**
     * @return int
     */
    public function getId():int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getOrderNumber():string
    {
        return $this->orderNumber;
    }

    /**
     * @param string $orderNumber
     *
     * @return self
     */
    public function setOrderNumber(string $orderNumber)
    {
        $this->orderNumber = $orderNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getIdRequest():string
    {
        return $this->idRequest;
    }

    /**
     * @param string $orderNumber
     *
     * @return self
     */
    public function setIdRequest(string $idRequest)
    {
        $this->idRequest = $idRequest;

        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerName():string
    {
        return $this->customerName;
    }

    /**
     * @param string $customerName
     *
     * @return self
     */
    public function setCustomerName(string $customerName)
    {
        $this->customerName = $customerName;

        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerEmail(): string
    {
        return $this->customerEmail;
    }

    /**
     * @param string $customerEmail
     *
     * @return self
     */
    public function setCustomerEmail(string $customerEmail)
    {
        $this->customerEmail = $customerEmail;

        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerMobile(): string
    {
        return $this->customerMobile;
    }

    /**
     * @param string $customerMobile
     *
     * @return self
     */
    public function setCustomerMobile(string $customerMobile)
    {
        $this->customerMobile = $customerMobile;

        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentResult():string 
    {
        return $this->paymentResult;
    }

    /**
     * @param string $paymentResult
     *
     * @return self
     */
    public function setPaymentResult(string $paymentResult)
    {
        $this->paymentResult = $paymentResult;

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
    public function setCreatedAt($created_at)
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
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * @return float
     */
    public function getValue():float
    {
        return $this->value;
    }

    /**
     * @param float $value
     *
     * @return self
     */
    public function setValue(float $value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus():string
    {
        return $this->status;
    }

    /**
     * @param string $status
     *
     * @return self
     */
    public function setStatus(string $status)
    {
        $this->status = $status;

        return $this;
    }
}