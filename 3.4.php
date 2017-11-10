<?php
class AddressManager {
    private $addresses = array("8.8.8.8", "114.114.114.114");

    function outputAddress( $resolve ) {
        if ( !is_bool( $resolve ) ) {
            die( "outputAddress() requires a Boolean argument\n" );
        }
        foreach ( $this->addresses as $address ) {
            print $address;
            if ( $resolve ) {
                print "(". gethostbyaddr($address).")";
            }
            print "\n";
        }
    }
}

$setting = simplexml_load_file("setting.xml");
$manager = new AddressManager();
$manager->outputAddress( (string)$setting->resolvedomains );