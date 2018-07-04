<?php

namespace Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use League\Csv\Reader;
use League\Csv\Statement;

use Models\Merchant;
use Models\TransactionTable;
use Models\CurrencyConverter;
use Models\CurrencyWebservice;

class GenerateReportCommand extends Command {
  protected function configure()
  {
    $this
      ->setName('convert')
      ->setDescription('Generates a new currency report.')
      ->setHelp('This command generates a new currency conversion report.');
  }

  protected function execute(InputInterface $input, OutputInterface $output)
  {
      // Instantiate the reader
      $csv = Reader::createFromPath(__DIR__.'/../data.csv', 'r');
      $csv->setHeaderOffset(0); //set the CSV header offset
      $csv->setDelimiter(';');
      $stmt = (new Statement())
        ->offset(0);

      // Instantiate Table and Merchant
      $transactionTable = new TransactionTable($csv, $stmt);
      $merchant = new Merchant($transactionTable);

      foreach ($merchant->getTransactions() as $transaction) {
          // Get currency and value from row
          $fmt = new \NumberFormatter( 'en_US', \NumberFormatter::CURRENCY );
          $value = $fmt->parseCurrency($transaction['value'], $currencyType);

          // Instantiate service and converter
          $currencyService = new CurrencyWebservice();
          $converter = new CurrencyConverter($currencyService);

          // Create string
          $stringToPresent =$transaction['value'] . ' => ' .
            $fmt->formatCurrency($converter->convert($value, $currencyType), 'GBP')
            . "\n";

          // Show string
          echo $stringToPresent;
      }
  }

}
