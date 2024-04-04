<?php

        $servidor = "sql105.infinityfree.com";
        $usuario = "if0_36299517";
        $password = "qKmYgYrnF3cuAM";

        try {
          $conexion = new PDO("mysql:host=$servidor;dbname=if0_36299517_db_libreria", $usuario, $password);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
        echo "Error al conectar a la base de datos: " . $e->getMessage();
        exit();
        }

// Recuperar los datos del formulario
$nombre = $_POST["nombre"];
$asunto = $_POST["asunto"];
$comentario = $_POST["comentario"];
$correo = $_POST["correo"];

// Obtener la fecha actual
$fecha = date("Y-m-d");

// Preparar la consulta SQL
$sql = "INSERT INTO contacto (nombre, asunto, comentario, correo, fecha) VALUES (:nombre, :asunto, :comentario, :correo, :fecha)";

$stmt = $conexion->prepare($sql);

// Vincular los parámetros
$stmt->bindParam(":nombre", $nombre);
$stmt->bindParam(":asunto", $asunto);
$stmt->bindParam(":comentario", $comentario);
$stmt->bindParam(":correo", $correo);
$stmt->bindParam(":fecha", $fecha);

// Ejecutar la consulta
$exito = false;
try {
  $stmt->execute();
  $exito = true;
} catch (PDOException $e) {
  echo "<p class='alert alert-danger'>Error al enviar el mensaje: " . $e->getMessage() . "</p>";
}

// Cerrar la conexión
$conexion = null;

if ($exito) {
  header("Location: contacto.php?success=1");
  exit();
} else {
  echo "<p class='alert alert-danger'>Error al enviar el mensaje</p>";
}

?>
