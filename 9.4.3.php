<?php
abstract class CommsManager {
    const APPT    = 1;
    const TDD     = 2;
    const CONTACT = 3;
    abstract function getHeaderText();
    abstract function make( $flag_int );
    abstract function getFooterText();
}

class BloggsCommsManager extends CoomsManager {
    function getHeaderText() {
        return "BloggsCal header\n";
    }

    function make( $flag_int ) {
        switch ( $flag_int ) {
            case self::APPT:
                return new BloggerApptEncoder();
            case self::CONTACT:
                return new BloggerContactEncoder();
            case self::TTD:
                return new BloggsTtdEncoder();
        }
    }
    
    function getFooterText() {
        return "BloggsCal footer\n";
    }
}