<?php
require('Crud.class.php');

$crud = new Crud('products');

// print_r($crud->getAll());
// var_dump($crud->getByID(1));
// var_dump($crud->delete(1));


$newProduct = [
    'name' => 'Samsung Galaxy Tab',
    'price' => 3000,
    'instock' => 1
];

$id = $crud->insert($newProduct);

var_dump($id);
// todo: wat indien foute data?

print "</pre>";
