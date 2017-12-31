<?php
error_reporting(E_ALL & ~(E_NOTICE|E_WARNING));
echo error_reporting();
$a = 1;
$b = "$a";
echo "\n".$b;