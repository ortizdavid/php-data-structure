<?php
namespace examples\ds;

use data_structures\Queue;

require_once '../../data_structures/Queue.php';


$f = new Queue();
$f->enqueue(6);
$f->enqueue(8);
$f->enqueueMany(10, 20, 30);
$f->show();

echo "<br>saiu: {$f->dequeue()}<br>";
$f->show();
echo "<hr>";
echo "Tamanho: ".$f->size();
echo "<hr>";
echo "Frente: {$f->front()}<br>Fundo: {$f->back()}";
echo "<hr>";
$f1=$f->copy();
$f1->reverse();
$f1->show();
echo "<hr>";
$f1->replace(30, 71);
$f1->destroy();
$f1->show();


/*
$f2 = new Queue();
$f2->enqueueMany(2, 1, 5, 8, 0);
$f2->show();
echo "<hr>";
$f2->dequeueMany(2);
$f2->show();*/