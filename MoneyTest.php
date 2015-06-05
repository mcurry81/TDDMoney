
<?php 

require_once('Dollar.php');
require_once('Franc.php');
require_once('Money.php');


class MoneyTest extends PHPUnit_Framework_TestCase
{
  public function setUp(){}
  
  public function tearDown(){}

  public function testMultiplication() {
  	$five = Money::dollar(5);
  	//Money::dollar rather than money->dollar since dollar function is static
  	$this->assertEquals(Money::dollar(10), $five->times(2));
  	$this->assertEquals(Money::dollar(15), $five->times(3));
  }

  public function testEquality(){
  	$five1 = Money::dollar(5);
  	$five2 = Money::dollar(5);
  	$this->assertTrue($five1->equals($five2));
  	$one = Money::dollar(1);
  	$this->assertFalse($five1->equals($one));

  	$francFive1 = Money::franc(5);
  	$francFive2 = Money::franc(5);
  	$this->assertTrue($francFive1->equals($francFive2));
  	$francOne = Money::franc(1);
  	$this->assertFalse($five1->equals($francFive1));

  }

    public function testFrancMultiplication() {
  	$five = Money::franc(5);
  	//Money::dollar rather than money->dollar since dollar function is static
  	$this->assertEquals(Money::franc(10), $five->times(2));
  	$this->assertEquals(Money::franc(15), $five->times(3));
  }

  public function testCurrency(){
  	$dollar = Money::dollar(1);
  	$franc = Money::franc(1);

  	$this->assertEquals("USD", $dollar->currency());
  		$this->assertEquals("CHF", $franc->currency());
  }

  public function testDifferentClassEquals(){
  	$money = new Money(10, "CHF");
  	$this->assertTrue($money->equals(new Franc(10, "CHF")));

  }
}
?>