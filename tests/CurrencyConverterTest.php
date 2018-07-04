<?
namespace Tests;

use PHPUnit\Framework\TestCase;
use Models\CurrencyConverter;
use Models\CurrencyWebservice;

// Could do lots of tests testing different types of input
// But i am doing basic ones to show the use of DI.
// Also I could use Mocking
final class CurrencyConverterTest extends TestCase
{
  public function testConvert()
  {
    $c = new CurrencyConverter(new CurrencyWebservice());

    $this->assertEquals($c->convert(1, 'GBP'), 1);
    $this->assertEquals($c->convert(1, 'USD'), 0.76);
    $this->assertEquals($c->convert(1, 'EUR'), 0.88);
  }
}
