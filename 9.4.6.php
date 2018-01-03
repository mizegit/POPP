<?php
class Sea {}
class EarthSea extends Sea {}
class MarsSea extends Sea {}

class Plains {}
class EarthPlains extends Plains {}
class MarsPlains extends Plains {}

class Forest {}
class EearthForest extends Forest {}
class MarsForest extends Forest {}

class TerraininFactory {
    private $sea;
    private $forest;
    private $plains;

    function __construct( Sea $sea, Plains $plains, Forest $forset ) {
        $this->sea = $sea;
        $this->plains = $plains;
        $this->forest = $forset;
    }

    function getSea() {
        return clone $this->sea;
    }
    
    function getPlains() {
        return clone $this->plains;
    }

    function getForest() {
        return clone $this->forest;
    }
}

$factory = new TerraininFactory( new EarthSea(),
    new EarthPlains(),
    new EearthForest() );

print_r( $factory->getSea() );
print_r( $factory->getPlains() );
print_r( $factory->getForest() );