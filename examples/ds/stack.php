<?php
namespace examples\ds;

use data_structures\Stack;

require_once '../../data_structures/Stack.php';



$p = new Stack();
$p1 = new Stack();
$p1->push(10);
$p1->push(20);
$p1->push(30);
//$p1->show();

echo "<hr>";
$p->push(5);
$p->push(5);
$p->push(5);
//$p->show();

//echo "<hr>";
$p->concat($p1);
$p->show();

//echo "<hr>";
//$p2 = $p->copy();
//$p2->show();

//echo "<hr>";
//$p2->reverse();
//$p2->show();

echo "<hr>";
$p->replace(5, 'aa');
$p->show();



/*
echo "<hr>";
$p5 = new Stack();
$p5->pushMany(8,12, 61, 4, 0, 7);
$p5->show();
echo "<hr>";
$p5->reverse();
$p5->show();
echo "<hr>";
$ret = $p5->popMany(2);
var_dump($ret);
$p5->show();*/
