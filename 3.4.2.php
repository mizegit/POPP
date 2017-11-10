<?php
class Wrong {}
class ShopProductWriter {
    function write(ShopProduct $shopProduct){
    }
}
class ShopProduct{}
$writer = new ShopProductWriter();
$writer->write( new Wrong() );
