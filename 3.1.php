<?php
class ShopProduct {
    public $title                = "default product";
    public $productMainname      = "main name";
    public $productFirstname     = "first name";
    public $price                = 0;

    function getProducer() {
        return "{$this->productFirstname}".
        " {$this->productMainname}";
    }
}

$product1 = new ShopProduct();
//print $product1->title;

$product1->title = "My Antonia";
$product1->productFirstname = "willa";
$product1->productMainname = "Cather";
$product1->price = 5.99;

print "author: {$product1->getProducer()}\n";