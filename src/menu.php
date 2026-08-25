<?php
require __DIR__ . '/vendor/autoload.php';
use App\Basedatos\Conexion;
$pdo = Conexion::obtener();
function mostrarMenu(): void
{
 echo PHP_EOL . "=== TaskBoard CLI ===" . PHP_EOL;
 echo "1. Listar tareas" . PHP_EOL;
 echo "2. Crear tarea" . PHP_EOL;
 echo "3. Marcar tarea como hecha" . PHP_EOL;
 echo "4. Eliminar tarea" . PHP_EOL;
 echo "5. Salir" . PHP_EOL;
 echo "> ";
}
while (true) {
 mostrarMenu();
 $opcion = trim(fgets(STDIN));
 switch ($opcion) {
 case '1':
 $stmt = $pdo->query("SELECT * FROM tareas");
 $tareas = $stmt->fetchAll();
 if (count($tareas) === 0) {
 echo "No hay tareas registradas." . PHP_EOL;
 }
 foreach ($tareas as $fila) {
 echo "#{$fila['id']} - {$fila['titulo']} ({$fila['estado']})" . PHP_EOL;
 }
 break;
 case '2':
 echo "Título de la nueva tarea: ";
 $titulo = trim(fgets(STDIN));
 $stmt = $pdo->prepare(
 "INSERT INTO tareas (titulo, estado) VALUES (:titulo, 'pendiente')"
 );
 $stmt->execute([':titulo' => $titulo]);
 echo "Tarea creada con ID: " . $pdo->lastInsertId() . PHP_EOL;
 break;
 case '3':
 echo "ID de la tarea a marcar como hecha: ";
 $id = trim(fgets(STDIN));
 $stmt = $pdo->prepare(
 "UPDATE tareas SET estado = 'hecho' WHERE id = :id"
 );
 $stmt->execute([':id' => $id]);
 if ($stmt->rowCount() > 0) {
 echo "Tarea #{$id} marcada como hecha." . PHP_EOL;
 } else {
 echo "No se encontró ninguna tarea con ese ID." . PHP_EOL;
 }
 break;
 case '4':
 echo "ID de la tarea a eliminar: ";
 $id = trim(fgets(STDIN));
 $stmt = $pdo->prepare("DELETE FROM tareas WHERE id = :id");
 $stmt->execute([':id' => $id]);
 if ($stmt->rowCount() > 0) {
    echo "Tarea #{$id} eliminada." . PHP_EOL;
 } else {
 echo "No se encontró ninguna tarea con ese ID." . PHP_EOL;
 }
 break;
 case '5':
 echo "¡Hasta luego!" . PHP_EOL;
 exit;
 default:
 echo "Opción no válida, intenta de nuevo." . PHP_EOL;
 }
}
