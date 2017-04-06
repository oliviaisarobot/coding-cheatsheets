<?php
//If $y > 10, $x will say 'foo', else it'll say 'bar'
$x = ($y > 10) ? 'foo' : 'bar';

//Short way of saying <? print $foo ? >, useful in HTML templates
<?= $foo ? >

//Shorthand way of doing the for loop, useful in html templates
for ($x=1; $x < 100; $x++):
   //Do something
end for;

//Shorthand way of the foreach loop
foreach ($array as $key=>$value):
   //Do something;
endforeach;

//Another way of If/else:
if ($x > 10):
    doX();
    doY();
    doZ();
else:
    doA();
    doB();
endif;

//You can also do an if statement without any brackets or colons if you only need to
//execute one statement after your if:

if ($x = 100)
   doX();
$x = 1000;

// PHP 5.4 introduced an array shorthand

$a = [1, 2, 3, 4];
$b = ['one' => 1, 'two' => 2, 'three' => 3, 'four' => 4];
 ?>
