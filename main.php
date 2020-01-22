<?php

class Animal
{
    private static $counter = 0;
    private $id;
    public $typeAnimal;
    public $typeProduct;
    protected $min;
    protected $max;

    public function __construct($typeAnimal, $typeProduct, $min, $max)
    {
        $this->id = self::$counter++;
        $this->typeAnimal = $typeAnimal;
        $this->typeProduct = $typeProduct;
        $this->min = $min;
        $this->max = $max;
    }

    public function work()
    {
        return rand($this->min, $this->max);
    }
}

class Farm
{
    protected $animals = [];

    public function setAnimals($count, $typeAnimal, $typeProduct, $min, $max)
    {
        for ($i = 0; $i < $count; $i++) {
            $this->animals[$typeAnimal][] = new Animal($typeAnimal, $typeProduct, $min, $max);
        }
    }

    public function showResult()
    {
        foreach ($this->animals as $typeAnimal) {
            $harvest = 0;
            foreach ($typeAnimal as $animal) {
                $harvest += $animal->work();
            }
            echo $typeAnimal[0]->typeAnimal . ' - ' .
                $typeAnimal[0]->typeProduct . ' - ' . $harvest . '<br>';
        }

    }
}

$bobsFarm = new Farm();
$bobsFarm->setAnimals(20, 'корова', 'молоко', 8, 12);
$bobsFarm->setAnimals(10, 'корова', 'молоко', 5, 9);
$bobsFarm->setAnimals(12, 'курачка', 'яйца', 0, 2);
$bobsFarm->showResult();