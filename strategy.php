<?php


spl_autoload_register(function($className){
    include '';
});

$op = '+';
$processor = new Processor();

switch ($op) {
    case '+':
        $strategy = new PlusStrategy();
        break;
    case '-':
        $strategy = new MinusStrategy();
        break;
}

$processor->setStrategy($strategy);
$result = $processor->operation($a, $b);

class PlusStrategy {
    public function execute($a, $b)
    {
        return $a + $b;
    }
}

/**
 * @param mixed $strategy
 */
class Processor {

    private $strategy;

    /**
     * @param mixed $strategy
     */
    public function setStrategy($strategy)
    {
        $this->strategy = $strategy;
    }


    public function operation($a, $b)
    {
        return $this->strategy->execute($a, $b);
    }
}

$r = new ReflectionClass('Processor');
$r->newInstance();
