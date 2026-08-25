<?php
require __DIR__ . '/vendor/autoload.php';
use App\Modelo\Tablero;
use App\Modelo\Columna;
$tablero = new Tablero('Sprint 1');
$tablero->agregarColumna(new Columna('Por hacer'));
$tablero->agregarColumna(new Columna('En progreso'));
$tablero->agregarColumna(new Columna('Hecho'));
echo "Tablero: " . $tablero->getNombre() . PHP_EOL;
echo "Columnas: " . $tablero->contarColumnas() . PHP_EOL;