<?php

class Country
{
    public $name;
    public $population;
    public $capital;

    public function __construct($name, $population, $capital)
    {
        $this->name = $name;
        $this->population = $population;
        $this->capital = $capital;
    }

    public function __toString()
    {
        return "**$this->name**\n\nPopulation: " . number_format($this->population) . "\nCapital: $this->capital";
    }
}

$countries = array(
    new Country("Ukraine", 44134693, "Kyiv"),
    new Country("United States", 332403650, "Washington, D.C."),
    new Country("China", 1444216107, "Beijing"),
    new Country("India", 1407045977, "New Delhi"),
    new Country("Japan", 124714362, "Tokyo"),
);
