<?php

require('Animal.class.php');
require('Dog.class.php');

$dog = new Dog('Fido', 'mammal');
$cat = new Animal('Minous', 'mammal');

$cat->setName('Minou');

print $dog->move();
print '<br/>';
print $cat->move();
print '<br/>';


print $dog->fetch();
print '<br/>';
// print $cat->fetch();
print '<br/>';

$cat->setIsExtinct(TRUE);

$dog->setIsExtinct(TRUE);

print $dog->makeNoise();
print '<br/>';
print $cat->makeNoise();
print '<br/>';



print '<pre>';
print_r($dog);
print_r($cat);
