<?php
require 'connect.php';
require "model/database.php";
require 'model/products.php';
require 'model/manufactures.php';
require 'model/protypes.php';
require 'model/users.php';
require 'model/addCart.php';
require 'model/payment.php';

$product = new Products();
$manufactures = new Manufactures();
$protype = new Prototypes();
$user = new User();
$cart = new addToCart();
$payment = new Payment();

