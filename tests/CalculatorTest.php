<?php declare(strict_types=1);

namespace IW\Tests\Workshop;

use InvalidArgumentException;
use IW\Workshop\Calculator;
use PHPUnit\Framework\TestCase;

/**
 * Class CalculatorTest
 * @package IW\Tests\Workshop
 */
final class CalculatorTest extends TestCase
{

    /** @var Calculator */
    private $calculator;

    public function setUp()
    {
        // prepare
        $this->calculator = new Calculator();
        parent::setUp();
    }

    /**
     * @dataProvider addProvider
     */
    public function testAdd(float $a, float $b, float $expected): void
    {
        TestCase::assertSame($expected, $this->calculator->add($a, $b));
    }


    /**
     * @return \int[][]
     */
    public function addProvider(): array
    {
        return [
            '0+0=' => [0.0, 0.0, 0.0],
            '0+1' => [0.0, 1.0, 1.0],
            '1+0' => [1.0, 0.0, 1.0],
            '1+1' => [1.0, 1.0, 2.0]
        ];
    }


    /**
     * @dataProvider divProvider
     */
    public function testDiv(float $a, float $b, float $expected): void
    {
        TestCase::assertSame($expected, $this->calculator->divide($a, $b));
    }


    /**
     * @return \int[][]
     */
    public function divProvider(): array
    {
        return [
            '0/1' => [0.0, 1.0, 0.0],
            '1/1' => [1.0, 1.0, 1.0]
        ];
    }

    /**
     * @dataProvider divExceptionProvider
     */
    public function testDivException(float $a, float $b, float $expected): void
    {
        $this->expectException(InvalidArgumentException::class);
        TestCase::assertSame($expected, $this->calculator->divide($a, $b));
    }


    public function divExceptionProvider(): array
    {
        return [
            '0/0=' => [0.0, 0.0, 0.0],
            '1/0' => [1.0, 0.0, 1.0]
        ];
    }
}