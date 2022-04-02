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
        $five = new Franc(5);
        self::assertEquals(new Franc(10), $five->times(2));
        self::assertEquals(new Franc(15), $five->times(3));
    }

    public function testEquality(): void
    {
        $dollar = new Dollar(5);
        self::assertTrue($dollar->equals(Money::dollar(5)));
        self::assertFalse($dollar->equals(Money::dollar(6)));
        $franc = new Franc(5);
        self::assertTrue($franc->equals(new Franc(5)));
        self::assertFalse($franc->equals(new Franc(6)));
        self::assertFalse($franc->equals(Money::dollar(6)));
    }
}