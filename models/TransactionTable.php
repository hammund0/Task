<?php

namespace Models;

/**
 * Source of transactions, can read data.csv directly for simplicty sake,
 * should behave like a database (read only)
 *
 */
class TransactionTable
{
    /**
    * Constructor for the Transaction table
    * @param $csvReader CSV reader object
    * @param $statement Statement object for the reader
    */
    public function __construct($csvReader, $statement) {
        $this->csvReader = $csvReader;
        $this->statement = $statement;
    }

    /*
    * Read from the CSV file
    */
    public function get() {
        $records = $this->statement->process($this->csvReader);
        return $records;
    }
}
