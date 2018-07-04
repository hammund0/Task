<?php

namespace Models;

/**
 * Uses CurrencyWebservice
 *
 */
class CurrencyConverter
{
    /**
    * Constructor for the Currency $converter
    * @param $currencyService The currency service
    */
    public function __construct($currencyService)
    {
        $this->currencyService = $currencyService;
    }

    /**
    * Convert function
    * @param $amount The amount to use for the conversion
    * @param $type The currency type to convert too
    */
    public function convert($amount, $type)
    {
        return $amount * $this->currencyService->getExchangeRate($type);
    }
}
