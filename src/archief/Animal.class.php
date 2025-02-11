<?php

require('DB.class.php');

class Animal
{
    use DB;

    public $name;
    public $is_extinct;
    public $species;
    private $allowed_species = ["mammal", "bird", "fish", "reptile", "amphibian"];

    public function __construct(String $n, String $s, bool $e = FALSE)
    {
        $this->name = $n;
        $this->species = $this->getValidSpecies($s);
        $this->is_extinct = $e;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getIsExtinct()
    {
        return $this->is_extinct;
    }

    public function getSpecies()
    {
        return $this->species;
    }

    public function setName(String $n)
    {
        $this->name = $n;
    }

    public function setIsExtinct(bool $e)
    {
        $this->is_extinct = $e;
    }

    public function setSpecies(String $s)
    {
        $this->species = $this->getValidSpecies($s);
    }

    protected function getValidSpecies(String $s)
    {
        $s = trim(strtolower($s));
        if (in_array($s, $this->allowed_species))
            return $s;
        return NULL;
    }

    public function move()
    {
        return $this->name . " is moving....";
    }

    public function makeNoise()
    {
        if ($this->is_extinct)
            return $this->name . " is forever silent... :(";
        return $this->name . " is making a noise";
    }
}
