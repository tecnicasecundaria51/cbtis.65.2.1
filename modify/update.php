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


$delete = new Objeto();

$crud = new CRUD();
$conexion = Conexion::ConectarBD();
/* validar datos */
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM publicacion WHERE id = '$id';";
    $respuesta = $crud->Select_for_id($query);
}


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
    <div class="col-12 text-center">
        <a class="btn btn-danger col-3" href="../logout.php">
            <h1>cerrar sesion</h1>
        </a>
    </div>

    <!-- formulario -->
    <?php while ($row = mysqli_fetch_assoc($respuesta)) { ?>
        <form class="w-25 m-auto text-center" action="updating.php" method="post" enctype="multipart/form-data">
            <label for="title" class="form-label bg-info card-header my-2">Ingresa el titulo</label>
            <input type="hidden" class="form-control" name="id" value="<?= $row['id'] ?>">

            <input type="text" class="form-control" name="title" value="<?= $row['title'] ?>">
            <label for="contenido" class="form-label bg-info card-header my-2">Ingresa el contenido</label>
            <textarea type="text" class="form-control" name="contenido" value="<?= $row['contenido'] ?>">

            </textarea>
            <label for="url" class="form-label bg-info card-header my-2">Ingresa el enlace</label>
            <input type="url" class="form-control" name="url" value="<?= $row['url'] ?>">
            <label for="foto" class="form-label bg-info card-header my-2">Ingresa una imagen</label>
            <input type="file" class="form-control" name="foto" value="<?= base64_encode($row['imgen']) ?>">
            <button type="submit" name="submit" class="btn btn-primary w-50 my-3">Enviar</button>
            <div>
                <a href="../index.php" class="btn btn-success col-10">Inicio</a>
            </div>
        </form>
    <?php } ?>
    <!-- mostrar respuesta -->



    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>