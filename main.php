<?php


class Animal
{
    private static $counter = 0;
    private $id;
    protected $min;
    protected $max;

    public function __construct()
    {
        $this->id = self::$counter++;
    }

    public function work()
    {
        return rand($this->min, $this->max);
    }
}

class Cow extends Animal
{
    protected $min = 8;
    protected $max = 12;
}

class Chicken extends Animal
{
    protected $min = 0;
    protected $max = 1;
}

class Farm
{
    public $cows = [];
    protected $chickens = [];

    protected $milk = 0;
    protected $eggs = 0;

    public function setCows($count)
    {
        for ($i = 0; $i < $count; $i++) {
            $this->cows[] = new Cow();
        }
    }

    public function setChickens($count)
    {
        for ($i = 0; $i < $count; $i++) {
            $this->chickens[] = new Chicken();
        }
    }

    public function setResult()
    {
        foreach ($this->cows as $cow) {
            $this->milk += $cow->work();
        }

        foreach ($this->chickens as $chicken) {
            $this->eggs += $chicken->work();
        }
    }

    public function showResult()
    {
        echo 'коровки дали ' . $this->milk . ' литров молочка';
        echo '<br>';
        echo 'курочки снесли ' . $this->eggs . ' яичек';
    }
}

$bobsFarm = new Farm();
$bobsFarm->setCows(10);
$bobsFarm->setChickens(20);
$bobsFarm->setResult();
$bobsFarm->showResult();