<?php
class ShopProduct {
    private $id = 0;
    
    public function setId( $id ) {
        $this -> id = $id;
    }

    public static function getInstance( $id, PDO $pdo ) {
        $stmt = $pdo -> prepare("Select * from products where id=?");
        $result = $stmt->execute(array($id));
        $row = $stmt->fetch();
        if ( empty( $row ) ) {return null;}

        if ($row['type'] == "book") {
            $product = new BookProduct(
                $row['title'],
                $row['firstname'],
                $row['mainname'],
                $row['pricename'],
                $row['numpage']
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
        $product->setDiscount($row['discount']);
        return $product;
    }
}