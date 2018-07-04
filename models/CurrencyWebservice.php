<?php

namespace Models;

/**
 * Dummy web service returning random exchange rates
 *
 */
class CurrencyWebservice
{
  /**
  * Constructor for the web service
  */
    public function __construct()
    {
      $this->currencyData = [
          'USD' => 0.76,
          'EUR' => 0.88
      ];
    }

    /**
    * Returns the exhange rate
    * @param $currency The currency to pick for the conversion
    */
    public function getExchangeRate($currency)
    {
        return isset($this->currencyData[$currency]) ? $this->currencyData[$currency] : 1;
    }
}
