<?php
class A
{

}
$a = new A();
$b = $a;
xdebug_debug_zval('a');
?>