<?php

namespace Example;

abstract class Money {
    protected $amount;
    protected $currency;

    public function __construct(int $amount, string $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function equals(Money $object): bool
    {
        return $this->amount === $object->amount;
    }

    abstract public function times(int $multiplier): Money;

    abstract public function currency(): string;

    public static function dollar(int $amount): Dollar {
        return new Dollar($amount, "USD");
    }
    public static function franc(int $amount): Franc {
        return new Franc($amount, "CHF");
    }
}


