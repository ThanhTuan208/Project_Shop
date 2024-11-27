<?php
require 'connect.php';
require "model/database.php";
require 'model/products.php';
require 'model/manufactures.php';
require 'model/protypes.php';

$product = new Products();
$manufactures = new Manufactures();
$protype = new Prototypes();