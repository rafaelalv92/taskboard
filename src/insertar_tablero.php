<?php
require __DIR__ . '/vendor/autoload.php';
use App\Basedatos\Conexion;
$pdo = Conexion::obtener();
$sql = "INSERT INTO tableros (nombre) VALUES (:nombre)";
$stmt = $pdo->prepare($sql);
$stmt->execute([':nombre' => 'Sprint 1 - Proyecto TaskBoard']);
$tableroId = $pdo->lastInsertId();
echo "Tablero creado con ID: {$tableroId}" . PHP_EOL;
$sqlColumna = "INSERT INTO columnas (titulo, orden, tablero_id)
 VALUES (:titulo, :orden, :tablero_id)";
 $stmtColumna = $pdo->prepare($sqlColumna);
$columnasIniciales = [
 ['titulo' => 'Por hacer', 'orden' => 1],
 ['titulo' => 'En progreso', 'orden' => 2],
 ['titulo' => 'Hecho', 'orden' => 3],
];
foreach ($columnasIniciales as $col) {
 $stmtColumna->execute([
 ':titulo' => $col['titulo'],
 ':orden' => $col['orden'],
 ':tablero_id' => $tableroId,
 ]);
}
echo "Columnas iniciales creadas correctamente." . PHP_EOL;