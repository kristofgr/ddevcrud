<?php

class Dog extends Animal
{

    public function fetch()
    {
        return $this->name . ' brings back the ball...';
    }

    public function makeNoise()
    {
        return $this->name . ": WOEF WOEF";
    }

    public function test()
    {
        return $this->getValidSpecies('test');
    }
}
