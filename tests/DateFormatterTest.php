<?php declare(strict_types=1);

namespace IW\Tests\Workshop;

use DateTime;
use IW\Workshop\DateFormatter;
use PHPUnit\Framework\TestCase;

/**
 * Class DateFormatterTest
 * @package IW\Tests\Workshop
 */
final class DateFormatterTest extends TestCase
{

    /** @var DateFormatter */
    private $dateFormatter;

    public function setUp()
    {
        $this->dateFormatter = new DateFormatter();
        parent::setUp();
    }


    /**
     * @dataProvider getPartOfDayProvider
     */
    public function testGetPartOfDay(DateTime $dateTime, string $expected): void
    {
        TestCase::assertSame($expected, $this->dateFormatter->getPartOfDay($dateTime));
    }


    /**
     * @return array[]
     */
    public function getPartOfDayProvider(): array
    {
        return [
            'Night' => [new DateTime('2021-01-01 1:1:1'), 'Night'],
            'Morning' => [new DateTime('2021-01-01 7:7:7'), 'Morning'],
            'Afternoon' => [new DateTime('2021-01-01 14:14:14'), 'Afternoon'],
            'Evening' => [new DateTime('2021-01-01 21:21:21'), 'Evening']
        ];
    }
}