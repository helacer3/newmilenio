<?php
namespace App\Model\Payments\PlacetoPay;

/**
* Auth checkout
*/
class AuthCheckout {
	protected string $login;
	protected string $tranKey;
	protected string $nonce;
	protected string $seed;

	/**
     * @return mixed
     */
    public function getLogin():string
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     *
     * @return self
     */
    public function setLogin(string $login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTranKey():string
    {
        return $this->tranKey;
    }

    /**
     * @param mixed $tranKey
     *
     * @return self
     */
    public function setTranKey(string $tranKey)
    {
        $this->tranKey = $tranKey;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNonce():string
    {
        return $this->nonce;
    }

    /**
     * @param mixed $nonce
     *
     * @return self
     */
    public function setNonce(string $nonce)
    {
        $this->nonce = $nonce;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSeed():string
    {
        return $this->seed;
    }

    /**
     * @param mixed $seed
     *
     * @return self
     */
    public function setSeed(string $seed)
    {
        $this->seed = $seed;

        return $this;
    }
}