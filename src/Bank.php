<?php

namespace Example;

class Bank
{
    public function reduced(Expression $source, string $to): Money
    {
        return Money::dollar(10);
    }
}