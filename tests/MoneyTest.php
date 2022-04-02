<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Example\Franc;
use Example\Money;
use Example\Dollar;


class MoneyTest extends TestCase
{
    public function testMultiplication(): void
    {
        $five = Money::dollar(5);
        self::assertEquals(Money::dollar(10), $five->times(2));
        self::assertEquals(Money::dollar(15), $five->times(3));
    }

    public function testFrancMultiplication(): void
    {
        $five = Money::franc(5);
        self::assertEquals(Money::franc(10), $five->times(2));
        self::assertEquals(Money::franc(15), $five->times(3));
    }

    public function testEquality(): void
    {
        self::assertTrue(Money::dollar(5)->equals(Money::dollar(5)));
        self::assertFalse(Money::dollar(5)->equals(Money::dollar(6)));
        self::assertTrue(Money::franc(5)->equals(Money::franc(5)));
        self::assertFalse(Money::franc(5)->equals(Money::franc(6)));
//        self::assertFalse(Money::franc(6)->equals(Money::dollar(6)));
    }

    public function testCurrency(): void
    {
        self::assertEquals('USD', Money::dollar(1)->currency());
        self::assertEquals('CHF', Money::franc(1)->currency());
    }

    public function testDifferentClassEquality()
    {
        $dolar = new Money(10, "CHF");
        self::assertTrue($dolar->equals(new Franc(10, "CHF")));
    }
}