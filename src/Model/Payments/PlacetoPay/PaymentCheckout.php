<?php
namespace App\Model\Payments\PlacetoPay;

/**
* Web checkout
*/
class PaymentCheckout {
	protected string $reference;
	protected string $description;
	protected array  $amount;
	protected bool   $allowPartial;

    /**
     * @return mixed
     */
    public function getReference():string
    {
        return $this->reference;
    }

    /**
     * @param mixed $reference
     *
     * @return self
     */
    public function setReference(string $reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription():string
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     *
     * @return self
     */
    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAmount():array
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     *
     * @return self
     */
    public function setAmount(array $arrAmount)
    {
        $this->amount = $arrAmount;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAllowPartial():bool
    {
        return $this->allowPartial;
    }

    /**
     * @param mixed $allowPartial
     *
     * @return self
     */
    public function setAllowPartial(bool $allowPartial)
    {
        $this->allowPartial = $allowPartial;

        return $this;
    }
}