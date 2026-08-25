<?php
require __DIR__ . '/vendor/autoload.php';
use App\Basedatos\Conexion;
$pdo = Conexion::obtener();
$sql = "SELECT * FROM tareas WHERE estado = :estado";
$stmt = $pdo->prepare($sql);
$stmt->execute([':estado' => 'pendiente']);
$tareas = $stmt->fetchAll();
if (count($tareas) === 0) {
 echo "No hay tareas pendientes." . PHP_EOL;
}
foreach ($tareas as $fila) {
 echo "#{$fila['id']} - {$fila['titulo']}" . PHP_EOL;
}