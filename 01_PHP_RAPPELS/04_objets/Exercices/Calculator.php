<?php namespace App;

class Calculator
{

    public function __construct(private $precision = 2)
    {}

    public function add(float $a, float $b): float
    {

        return round($a + $b, $this->precision);
    }

    public function multiply(float $a, float $b): float
    {

        return round($a * $b, $this->precision);
    }

    public function division(float $a, float $b): float
    {

        // arrête le script avec une fatale erreure throw lance une exception 
        if ($b === 0.0) throw new \DivisionByZeroError("Impossible de diviser par zéro");

        return round($a / $b, $this->precision);
    }

    public function sum(float ...$numbers):float
    {
        $sum = 0.00;
        foreach ($numbers as $number) $sum += $number;

        return $sum;
    }
}

$calculator = new Calculator();

// try {
//     // test le code métier
//     echo $calculator->division(1, 2) . PHP_EOL;
//     echo $calculator->division(1., 0.8) . PHP_EOL;
//     echo $calculator->sum(1, 2, 3, 5, 8) . PHP_EOL;
//     // echo $calculator->division(1, 0) . PHP_EOL;
//      // echo $calculator->sum(1, 2, 3, "bonjour") . PHP_EOL;

//     // attraper le exception 
// } catch (TypeError | DivisionByZeroError $e) {

//     echo $e->getMessage() . PHP_EOL;
//     echo "Oups " . PHP_EOL;

// }