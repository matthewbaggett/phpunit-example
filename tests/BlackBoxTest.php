<?php
namespace Example\Tests;

use Example\BlackBox;
use Example\Doohicker;

class BlackBoxTest extends \PHPUnit_Framework_TestCase
{
    /** @var BlackBox */
    private $blackBox;

    public function setUp()
    {
        parent::setUp();
        $this->blackBox = new BlackBox();
    }

    public function testBlackBoxMultiply()
    {
        $this->assertEquals(10, $this->blackBox->multiply(5,2));
    }

    public function multiplicationProvider()
    {
        return [
            [10,1,10],
            [20,0.5,10],
            [20,-2,-40],
        ];
    }

    /**
     * @dataProvider multiplicationProvider
     */
    public function testBlackBoxMultiplyWithDataProvider($a, $b, $expected)
    {
        $this->assertEquals($expected, $this->blackBox->multiply($a, $b));
    }

    public function testHappyness()
    {
        $this->assertContains("happy", $this->blackBox->makeADecision());
        # $this->assertContains("sad", $this->blackBox->makeADecision());
    }

    public function testMakeDoohicker()
    {
        $doohicker = $this->blackBox->makeADoohicker();
        $this->assertInstanceOf("\\Example\\Doohicker", $doohicker);
        return $doohicker;
    }

    /**
     * @depends testMakeDoohicker
     */
    public function testDoohickerAction(Doohicker $doohicker)
    {
        $this->assertTrue(method_exists($doohicker, "action"));
        $this->assertEquals(200, $doohicker->action());
    }
}
