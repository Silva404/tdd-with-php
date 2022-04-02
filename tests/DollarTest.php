<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class Dollar
{
    private $amount;

    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    public function times($multiplier): Dollar
    {
        return new Dollar($this->amount * $multiplier);
    }

    public function equals(Dollar $object): bool
    {
        return $this->amount === $object->amount;
    }
}

class Franc
{
    private $amount;

    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    public function times($multiplier): Franc
    {
        return new Franc($this->amount * $multiplier);
    }

    public function equals(Franc $object): bool
    {
        return $this->amount === $object->amount;
    }
}

class DollarTest extends TestCase
{
    public function testDolarMultiplication(): void
    {
        $five = new Dollar(5);
        self::assertEquals(new Dollar(10), $five->times(2));
        self::assertEquals(new Dollar(15), $five->times(3));
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
        self::assertTrue($dollar->equals(new Dollar(5)));
    }
}