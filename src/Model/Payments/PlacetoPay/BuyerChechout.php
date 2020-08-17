<?php
namespace App\Model;

/**
* Web checkout
*/
class BuyerCheckout {
	protected string $name;
	protected string $surname;
	protected string $email;
	protected string $document;
	protected string $documentType;
	protected string $mobile;

    /**
     * @return mixed
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     *
     * @return self
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     *
     * @return self
     */
    public function setSurname(string $surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     *
     * @return self
     */
    public function setEmail(string $email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDocument(): string
    {
        return $this->document;
    }

    /**
     * @param mixed $document
     *
     * @return self
     */
    public function setDocument(string $document)
    {
        $this->document = $document;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDocumentType(): string
    {
        return $this->documentType;
    }

    /**
     * @param mixed $documentType
     *
     * @return self
     */
    public function setDocumentType(string $documentType)
    {
        $this->documentType = $documentType;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMobile(): string
    {
        return $this->mobile;
    }

    /**
     * @param mixed $mobile
     *
     * @return self
     */
    public function setMobile(string $mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }
}