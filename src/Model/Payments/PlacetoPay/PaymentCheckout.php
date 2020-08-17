<?php
namespace App\Model;

/**
* Web checkout
*/
class PaymentCheckout {
	protected string $reference;
	protected string $decription;
	protected array  $amount;
	protected string $allowPartial;

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
    public function getDecription():string
    {
        return $this->decription;
    }

    /**
     * @param mixed $decription
     *
     * @return self
     */
    public function setDecription(string $decription)
    {
        $this->decription = $decription;

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
    public function getAllowPartial():string
    {
        return $this->allowPartial;
    }

    /**
     * @param mixed $allowPartial
     *
     * @return self
     */
    public function setAllowPartial(string $allowPartial)
    {
        $this->allowPartial = $allowPartial;

        return $this;
    }
}