<?php
require('Crud.class.php');

$crud = new Crud('products');

print "<pre>";
print_r($crud->getAll());
print "</pre>";
