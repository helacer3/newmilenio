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
use App\Entity\Customers;

/**
 * Clase con la información de los Clientes
 * @author Snayder Acero
 * @ORM\Table(name="customers")
 * @ORM\Entity
 */
class Customers
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
     * @ORM\Column(name="document_type", type="string", length=3, nullable=false)
     */
    protected $documentType;

    /**
     * @var string
     *
     * @ORM\Column(name="document_number", type="string", length=30, nullable=false)
     */
    protected $documentNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=30, nullable=false)
     */
    protected $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=30, nullable=false)
     */
    protected $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=30, nullable=false)
     */
    protected $surname;
    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=100, nullable=false)
     */
    protected $address;
    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=12, nullable=false)
     */
    protected $phone;
    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=false)
     */
    protected $email;
    /**
     * @var string
     *
     * @ORM\Column(name="employment", type="string", length=50, nullable=false)
     */
    protected $employment;

    /**
     * @var int
     *
     * @ORM\Column(name="id_department", type="int", nullable=false)
     */
    protected $idDepartment;

    /**
     * @var int
     *
     * @ORM\Column(name="id_city", type="int", nullable=false)
     */
    protected $idCity;

    /**
     * @var string
     *
     * @ORM\Column(name="Status", type="string", nullable=false)
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
    public function getDocumentType()
    {
        return $this->documentType;
    }

    /**
     * @param string $documentType
     *
     * @return self
     */
    public function setDocumentType($documentType)
    {
        $this->documentType = $documentType;

        return $this;
    }

    /**
     * @return string
     */
    public function getDocumentNumber()
    {
        return $this->documentNumber;
    }

    /**
     * @param string $documentNumber
     *
     * @return self
     */
    public function setDocumentNumber($documentNumber)
    {
        $this->documentNumber = $documentNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     *
     * @return self
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     *
     * @return self
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     *
     * @return self
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     *
     * @return self
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     *
     * @return self
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmployment()
    {
        return $this->employment;
    }

    /**
     * @param string $employment
     *
     * @return self
     */
    public function setEmployment($employment)
    {
        $this->employment = $employment;

        return $this;
    }

    /**
     * @return int
     */
    public function getIdDepartment()
    {
        return $this->idDepartment;
    }

    /**
     * @param int $idDepartment
     *
     * @return self
     */
    public function setIdDepartment($idDepartment)
    {
        $this->idDepartment = $idDepartment;

        return $this;
    }

    /**
     * @return int
     */
    public function getIdCity()
    {
        return $this->idCity;
    }

    /**
     * @param int $idCity
     *
     * @return self
     */
    public function setIdCity($idCity)
    {
        $this->idCity = $idCity;

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