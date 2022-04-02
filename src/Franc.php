<?php

namespace Example;

class Franc extends Money
{
    public function times(int $multiplier): Money
    {
        return Money::franc($this->amount * $multiplier);
    }

    public function currency(): string
    {
        return $this->currency;
    }
}