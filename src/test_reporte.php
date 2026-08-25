<?php
require __DIR__ . '/vendor/autoload.php';
use App\Modelo\Tarea;
use App\Reporte\ContadorTareas;
$t1 = new Tarea('Tarea 1');
$t2 = new Tarea('Tarea 2');
$t3 = new Tarea('Tarea 3');
$t3->marcarComoHecha();
$tareas = [$t1, $t2, $t3];
echo ContadorTareas::resumen($tareas) . PHP_EOL;
