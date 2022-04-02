<?php

namespace Example;

abstract class Money {
    protected $amount;

    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    public function equals(Money $object): bool
    {
        return $this->amount === $object->amount;
    }

    abstract public function times(int $multiplier): Money;

    public static function dollar(int $amount): Dollar {
        return new Dollar($amount);
    }
    public static function franc(int $amount): Franc {
        return new Franc($amount);
    }
}


