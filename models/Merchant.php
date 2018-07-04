<?php

namespace Models;

class Merchant
{
  /**
  * Constructor for the Merchant
  * @param $transactionTable The TransactionTable object
  */
    public function __construct($transactionTable)
    {
        $this->transactionTable = $transactionTable;
    }

    /**
    * Get the transactions from the data source
    * @return Transaction rows
    */
    public function getTransactions()
    {
        return $this->transactionTable->get();
    }
}
