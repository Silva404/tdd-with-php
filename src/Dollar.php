<?php

namespace Example;

class Dollar extends Money
{
    public function times(int $multiplier): Money
    {
        return Money::dollar($this->amount * $multiplier);
    }

    public function currency(): string
    {
        return $this->currency;
    }
}

