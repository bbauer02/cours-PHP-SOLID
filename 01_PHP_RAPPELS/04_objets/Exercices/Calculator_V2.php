<?php

require __DIR__ . '/Calculator.php';

use App\Calculator as Calcul ;

class Calculator
{

    public function __construct(private Calcul $calcul)
    {}

    public function result(array $expression ):float{

        list($numbers , $operator ) = $expression;
        $op = array_pop($operator);

        return match($op){
            "+" => $this->calcul->add( ...$numbers ),
            "*" => $this->calcul->multiply( ...$numbers ),
            "/" => $this->calcul->division( ...$numbers ),
            "sum" => $this->calcul->sum( ...$numbers ),
            default => throw new InvalidArgumentException("bad operator")
        };
    }
}

$calculator = new Calculator(calcul : new Calcul(precision: 3));

try {
    // test le code métier
    echo $calculator->result([[8,9], ['*']]). PHP_EOL;
    echo $calculator->result([[8,9], ['+']]). PHP_EOL;
    echo $calculator->result([[8,9], ['/']]). PHP_EOL;
    echo $calculator->result([[1,2,3,4,5,6,7,8,9, 10], ['sum']]). PHP_EOL;
    echo $calculator->result([[8,0], ['/']]). PHP_EOL;

    // attraper le exception 
} catch (TypeError | DivisionByZeroError | InvalidArgumentException $e) {

    echo $e->getMessage() . PHP_EOL;
    echo "Oups " . PHP_EOL;

}