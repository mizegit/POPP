<?php
class ShopProduct {
    public $title;
    public $firstname;
    public $mainname;
    public $price;

    private $id = 0;
    
    public function setId( $id ) {
        $this -> id = $id;
    }

    public static function getInstance( $id, PDO $pdo ) {
        $stmt = $pdo -> prepare("Select * from product where id=?");
        $result = $stmt->execute(array($id));
        $row = $stmt->fetch();
        if ( empty( $row ) ) {return null;}

        if ($row['type'] == "book") {
            $product = new BookProduct(
                $row['title'],
                $row['firstname'],
                $row['mainname'],
                $row['price'],
                $row['numpages']
            );
        } else if ( $row['type'] == "cd") {
            $product = new CDProduct(
                $row['title'],
                $row['firstname'],
                $row['mainname'],
                $row['price'],
                $row['playlength']
            );
        } else {
            $product = new ShopProduct(
                $row['title'],
                $row['firstname'],
                $row['mainname'],
                $row['price']
            );
        }

        $product->setId($row['id']);
        //$product->setDiscount($row['discount']);
        return $product;
    }
}

class CDProduct extends ShopProduct {
    public $playlength;
}

class BookProduct extends ShopProduct {
    function __construct($title, $firstname, $mainname, $price, $numpages)
    {
        $this->title = $title;
        $this->firstname = $firstname;
        $this->mainname = $mainname;
        $this->price = $price;
        $this->numpages = $numpages;
    }
    public $numpages;
}

$dsn = "sqlite:D:\\Code\\POPP\\test.db";
$pdo = new PDO( $dsn, null, null);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$obj = ShopProduct::getInstance(6, $pdo);
var_dump($obj);