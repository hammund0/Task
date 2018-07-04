<?
namespace Tests;

use PHPUnit\Framework\TestCase;
use Models\CurrencyWebservice;

// Could do lots of tests testing different types of input
// But i am doing basic ones to show the use of DI.
// Also I could use Mocking
final class CurrencyWebserviceTest extends TestCase
{
  public function testGetExchangeRate()
  {
    $c = new CurrencyWebservice());

    $this->assertEquals($c->getExchangeRate('GBP'), 1);
    $this->assertEquals($c->getExchangeRate('USD'), 0.76);
    $this->assertEquals($c->getExchangeRate('EUR'), 0.88);
  }
}
