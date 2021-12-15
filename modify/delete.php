<?php
session_start();
session_regenerate_id(true);
require_once '../views/funcion.php';

if (!isset($_SESSION['rol']) && $_SESSION['rol'] != 0) {
    header('locatin: login.php');
} else {
    if ($_SESSION['rol'] != 1) {
        header('location: login.php');
    }
}

$delete = new Objeto();
$crud = new CRUD();
$conexion = Conexion::ConectarBD();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM publicacion WHERE id = '$id';";
    $respuesta = $crud->Select_for_id($query);
}
?>
<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>ADMIN</title>
</head>

<body>
    <div class="col-12 text-center">
        <a class="btn btn-danger col-3" href="logout.php">
            <h1>cerrar sesion</h1>
        </a>
    </div>
    <!-- MOSTRAR PUBLICACION A ELIMINAR  -->
    <form action="deleting.php" method="post">
        <div class="container col-12 text-center">
            <!-- bg-success -->
            <div class="row m-auto w-100">
                <!-- bg-danger -->
                <?php while ($row = mysqli_fetch_assoc($respuesta)) { ?>
                    <div class="col-sm-11 col-md-11 col-lg-4 my-3 p-2 m-auto">
                        <!-- bg-dark -->
                        <div class="card w-100 m-auto border-primary border-3"">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <h5 class="card-header bg-danger"><?= $row['title'] ?></h5>
                            <img src="data:<?= $row['tipo_img']; ?>;base64,<?php echo base64_encode($row['imgen']); ?>" class="card-img-top" alt="...">
                            <hr>
                            <div class="card-body">
                                <p class="card-text"><?= $row['contenido'] ?></p>
                                <div class="row my-2 m-auto">
                                    <button type="submit" class="btn btn-danger col-10 m-auto" name="d">Eliminar</button>
                                </div>
                                <div>
                                    <a href="../index.php" class="btn btn-success col-10">Inicio</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </form>

    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>