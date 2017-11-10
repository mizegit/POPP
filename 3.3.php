<?php
class ShopProduct {

    public $title;
    public $productMainname;
    public $productFirstname;
    public $price;

    function __construct( $title, $firstName, $mainName, $price) {
        $this->title = $title;
        $this->productFirstname = $firstName;
        $this->productMainname = $mainName;
        $this->price = $price;
    }

    function getProducer() {
        return "{$this->productFirstname}".
        " {$this->productMainname}";
    }

}

$product1 = new ShopProduct("My Antonia", "Willa", "Cather", 5.99);
print "author: {$product1->getProducer()}\n";