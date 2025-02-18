<?php
require_once('DB.class.php');
require_once('Crud.class.php');

$crud = new Crud('products');

print "<pre>";
print_r($crud->getAll());
var_dump($crud->getByID(4));
var_dump($crud->delete(4));


// $newProduct = [
//     'name' => 'Samsung Galaxy Tab',
//     'price' => 3000,
//     'instock' => 1
// ];

// $id = $crud->create('Samsung Galaxy Tab 123', 3001, 1);

// var_dump($id);
// todo: wat indien foute data?

print "</pre>";
