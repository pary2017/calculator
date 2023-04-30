<?php

namespace App\Calculator;

class CalcFactory
{
    public function create(string $type): CalcInterface
    {
        return match($type) {
            'add' => new Addition(),
            'sub' => new Subtraction(),
            'division' => new Division(),
            'multiply' => new Multiplication(),
        };
    }
}
