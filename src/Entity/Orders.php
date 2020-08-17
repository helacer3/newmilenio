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
 * @ORM\Table(name="prb_order")
 * @ORM\Entity
 */
class Order
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdUser", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="order_number", type="string", length=15, nullable=false)
     */
    protected $orderNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_name", type="string", length=100, nullable=false)
     */
    protected $customerName;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_email", type="string", length=59, nullable=false)
     */
    protected $customerEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_mobile", type="string", length=15, nullable=false)
     */
    protected $customerMobile;

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
     * @ORM\Column(name="Value", type="float", nullable=false)
     */
    protected $value;

    /**
     * @var string
     *
     * @ORM\Column(name="Status", type="string", nullable=false)
     */
    protected $status;
}