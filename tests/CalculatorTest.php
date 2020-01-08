<?php

use IW\Workshop\Calculator;

use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase {

    /** Create calculator for testing */
    public function setUp() :void
    {
        $this->calculator = new Calculator;
    }

    /** Input for checking output of add function */
    public function inputAddNumbers()
    {
        return [
            [2, 2, 4],
            [2.5, 2.5, 5], 
            [-3, 1, -2],
            [-9, -9, -18]
        ];
    }

    /** Input for checking output of divide function */
    public function inputDivideNumbers()
    {
        return [
            [2, 2, 1],
            [6.5, 2.5, 2.6], 
            [-3, 1, -3],
            [-9, -9, 1]
        ];
    }

    /**
     * Checking output of add function
     * @dataProvider inputAddNumbers
     */
    public function testAddNumbers($x, $y, $sum)
    {
        $this->assertEquals($sum, $this->calculator->add($x, $y));
    }

    /**
     * Checking wrong input to add function
     * @expectedException InvalidArgumentException
     */
    public function testShowExpectionIFNonNumericInAdd()
    {
        $this->calculator->add('a', []);
    }

    /**
     * Checking output
     * @dataProvider inputDivideNumbers
     */
    public function testDivideNumbers($x, $y, $sum)
    {
        $this->assertEquals($sum, $this->calculator->divide($x, $y));
    }

    /**
     * Checking wrong input to divide function
     * @expectedException InvalidArgumentException
     */
    public function testShowExpectionIFNonNumericInDivide()
    {
        $this->calculator->divide(5, 0);
    }
}