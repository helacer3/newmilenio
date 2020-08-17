<?php
namespace App\Model;

use App\Model\AuthCheckout;
use App\Model\PaymentCheckout;
use App\Model\BuyerCheckout;

/**
* Web checkout
*/
class WebCheckout {

	protected AuthCheckout $auth;
	protected BuyerCheckout $buyer;
	protected PaymentCheckout $payment;
  protected string $locale;
	protected string $expiration;
	protected string $returnUrl;
	protected string $ipAddress;
	protected string $userAgent;


  public function getAuth():AuthCheckout
  {
      return $this->auth;
  }

  /**
   * @param mixed $auth
   *
   * @return self
   */
  public function setAuth(AuthCheckout $auth)
  {
      $this->auth = $auth;

      return $this;
  }

  /**
   * @return mixed
   */
  public function getLocale(): string
  {
      return $this->locale;
  }

  /**
   * @param mixed $locale
   *
   * @return self
   */
  public function setLocale(string $locale)
  {
      $this->locale = $locale;

      return $this;
  }

  /**
   * @return mixed
   */
  public function getBuyer():BuyerCheckout
  {
      return $this->buyer;
  }

  /**
   * @param mixed $buyer
   *
   * @return self
   */
  public function setBuyer(BuyerCheckout $buyer)
  {
      $this->buyer = $buyer;

      return $this;
  }

  /**
   * @return mixed
   */
  public function getPayment():PaymentCheckout
  {
      return $this->payment;
  }

  /**
   * @param mixed $payment
   *
   * @return self
   */
  public function setPayment(PaymentCheckout $payment)
  {
      $this->payment = $payment;

      return $this;
  }

  /**
   * @return mixed
   */
  public function getExpiration(): string
  {
      return $this->expiration;
  }

  /**
   * @param mixed $expiration
   *
   * @return self
   */
  public function setExpiration(string $expiration)
  {
      $this->expiration = $expiration;

      return $this;
  }

  /**
   * @return mixed
   */
  public function getReturnUrl():string
  {
      return $this->returnUrl;
  }

  /**
   * @param mixed $returnUrl
   *
   * @return self
   */
  public function setReturnUrl(string $returnUrl)
  {
      $this->returnUrl = $returnUrl;

      return $this;
  }

  /**
   * @return mixed
   */
  public function getIpAddress(): string
  {
      return $this->ipAddress;
  }

  /**
   * @param mixed $ipAddress
   *
   * @return self
   */
  public function setIpAddress(string $ipAddress)
  {
      $this->ipAddress = $ipAddress;

      return $this;
  }

  /**
   * @return mixed
   */
  public function getUserAgent():string
  {
      return $this->userAgent;
  }

  /**
   * @param mixed $userAgent
   *
   * @return self
   */
  public function setUserAgent(string $userAgent)
  {
      $this->userAgent = $userAgent;

      return $this;
  }
}
