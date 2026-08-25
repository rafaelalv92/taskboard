<?php
require __DIR__ . '/vendor/autoload.php';
use App\Basedatos\Conexion;
$pdo = Conexion::obtener();
$stmt = $pdo->query("SELECT * FROM tableros ORDER BY fecha_creacion DESC");
$tableros = $stmt->fetchAll();
foreach ($tableros as $tablero) {
 echo "#{$tablero['id']} - {$tablero['nombre']}" . PHP_EOL;
 $sqlCol = "SELECT titulo FROM columnas WHERE tablero_id = :id ORDER BY orden";
 $stmtCol = $pdo->prepare($sqlCol);
 $stmtCol->execute([':id' => $tablero['id']]);
 foreach ($stmtCol->fetchAll() as $columna) {
 echo " → " . $columna['titulo'] . PHP_EOL;
 }
}