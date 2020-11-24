<?php
namespace examples\ds;

use data_structures\LinkedList;

require_once '../../data_structures/LinkedList.php';

$l1 = new LinkedList();
$l2 = new LinkedList();



$l2->addEndMany(2, 4, 6, 8);

$l1->addEnd(1);
$l1->addEnd(3);
$l1->addEnd(5);
$l1->show();
echo "<hr>";
$l1->concat($l2);
$l1->show();
echo "<hr>";
$l1->destroy();

$l1->show();
 
