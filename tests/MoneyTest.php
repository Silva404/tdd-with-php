<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Example\Money;
use Example\Bank;


class MoneyTest extends TestCase
{
    public function testMultiplication(): void
    {
        $five = Money::dollar(5);
        self::assertEquals(Money::dollar(10), $five->times(2));
        self::assertEquals(Money::dollar(15), $five->times(3));
    }

    public function testEquality(): void
    {
        self::assertTrue(Money::dollar(5)->equals(Money::dollar(5)));
        self::assertFalse(Money::dollar(5)->equals(Money::dollar(6)));
        self::assertFalse(Money::franc(6)->equals(Money::dollar(6)));
    }

    public function testCurrency(): void
    {
        self::assertEquals('USD', Money::dollar(1)->currency());
        self::assertEquals('CHF', Money::franc(1)->currency());
    }

    public function testAddition(): void
    {
        $sum = Money::dollar(5)->plus(Money::dollar(5));
        self::assertEquals(Money::dollar(10), $sum);
    }

    public function testSimpleAddition(): void {
        $sum = Money::dollar(5)->plus(Money::dollar(5));
        $bank = new Bank();
        $reduced = $bank->reduced($sum, "USD");
        self::assertEquals(Money::dollar(10), $reduced);
    }
}
