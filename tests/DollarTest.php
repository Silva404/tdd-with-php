<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class Dollar {
    public $amount;

    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    public function times($multiplier): Dollar {
        return new Dollar($this->amount * $multiplier);
    }
}

class DollarTest extends TestCase
{
    public function testMultiplication(): void
    {
        $five = new Dollar(5);
        $product = $five->times(2);
        self::assertEquals(10, $product->amount);
        $product = $five->times(3);
        self::assertEquals(15, $product->amount);
    }
}