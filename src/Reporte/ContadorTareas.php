<?php
namespace App\Reporte;
use App\Modelo\Tarea;
class ContadorTareas
{
 public static function resumen(array $tareas): string
 {
 $total = count($tareas);
 $pendientes = 0;
 $hechas = 0;
 foreach ($tareas as $tarea) {
 if ($tarea->getEstado() === 'pendiente') {
 $pendientes++;
 } elseif ($tarea->getEstado() === 'hecho') {
 $hechas++;
 }
 }
 return "Total: {$total} | Pendientes: {$pendientes} | Hechas: {$hechas}";
 }
}