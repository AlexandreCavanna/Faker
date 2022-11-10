<?php

namespace Faker\Test\Provider\fr_FR;

use Faker\Factory;
use Faker\Provider\fr_FR\DateTime;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class DateTimeTest extends TestCase
{
    private $datetimeClass;

    protected function setUp(): void
    {
        $this->datetimeClass = new \ReflectionClass(DateTime::class);
    }

    protected function getMethod($name)
    {
        $method = $this->datetimeClass->getMethod($name);

        $method->setAccessible(true);

        return $method;
    }

    public function testFrenchDateTime()
    {
        $this->faker = Factory::create('fr_FR');
        $this->faker->seed(1);

        self::assertSame(
            'Août',
            $this->getMethod('monthName')->invokeArgs(null, [])
        );

        self::assertSame(
            'Dimanche',
            $this->getMethod('dayOfWeek')->invokeArgs(null, [])
        );

        self::assertSame(
            '29',
            $this->getMethod('dayOfMonth')->invokeArgs(null, [])
        );

        self::assertSame(
            '26 Décembre 2007',
            $this->faker->formattedDate('{{dayOfMonth}} {{monthName}} {{year}}')
        );
    }
}
