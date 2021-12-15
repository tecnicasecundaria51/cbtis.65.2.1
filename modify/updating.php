<?php
require_once '../views/funcion.php';
session_start();
session_regenerate_id(true);
error_reporting(0);
if (!isset($_SESSION['rol']) && $_SESSION['rol'] != 0) {
  header('locatin: ../views/login.php');
} else {
  if ($_SESSION['rol'] != 1) {
    header('location: ../views/login.php');
  }
}
$publicacion = new Objeto();
$crud = new CRUD();
$conexion = Conexion::ConectarBD();

if (isset($_POST['submit'])) {
  $id_d = $_POST['id'];
  $title = isset($_POST['title']) ? mysqli_real_escape_string($conexion, $_POST['title']) : false;
  $contenido = isset($_POST['contenido']) ? mysqli_real_escape_string($conexion, $_POST['contenido']) : false;
  $url = isset($_POST['url']) ? mysqli_real_escape_string($conexion, trim($_POST['url'])) : false;
  if (isset($_FILES['foto']['name'])) {
    $tipo = $_FILES['foto']['type'];
    $nombre = $_FILES['foto']['name'];
    $tamano = $_FILES['foto']['size'];
    $imagensub = fopen($_FILES['foto']['tmp_name'], 'r');
    $imagenbin = fread($imagensub, $tamano);
    $imagenbin = mysqli_escape_string($conexion, $imagenbin);

    $publicacion->title = $title;
    $publicacion->nombre = $nombre;
    $publicacion->contenido = $contenido;
    $publicacion->url = $url;
    $publicacion->tipo = $tipo;
    $publicacion->imagenbin = $imagenbin;
    $publicacion->id_d = $id_d;
    $crud->update_admin($publicacion);
  }
}
header('refresh:5;url=../views/login.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <title>ADMIN</title>
</head>

<body>

  <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>