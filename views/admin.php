<?php
require_once 'funcion.php';
session_start();
session_regenerate_id(true);
error_reporting(0);

if (!isset($_SESSION['rol']) && $_SESSION['rol'] != 0) {
  header('locatin: login.php');
} else {
  if ($_SESSION['rol'] != 1) {
    header('location: login.php');
  }
}
$crud = new CRUD();

$conexion = Conexion::ConectarBD();

$resultado = $crud->mostrar();
$query = "SELECT * FROM publicacion;";
    $respuesta = $crud->Select_for_id($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../style.css">

  <title>ADMIN</title>
</head>

<body>
  <div class="col-12 text-center">
    <?php if($_SESSION['rol'] == 1) {?>
    <a class="btn btn-danger col-3" href="../logout.php">
      <h1 class="">cerrar sesion</h1>
    </a>
    <?php }?>
  </div>
  <!-- formulario -->
  <form class="w-25 m-auto text-center" action="new.php" method="post" enctype="multipart/form-data">
    <label for="title" class="form-label bg-info card-header my-2">Ingresa el titulo</label>
    <input type="text" class="form-control" name="title">
    <label for="contenido" class="form-label bg-info card-header my-2">Ingresa el contenido</label>
    <textarea type="text" class="form-control" name="contenido">

  </textarea>
    <label for="url" class="form-label bg-info card-header my-2">Ingresa el enlace</label>
    <input type="url" class="form-control" name="url">
    <input type="number" class="form-control" value="<?= $_SESSION['rol']?>" name="id_rol">

    <label for="foto" class="form-label bg-info card-header my-2">Ingresa una imagen</label>
    <input type="file" class="form-control" name="foto">
    <button type="submit" name="submit" class="btn btn-primary w-50 mt-3">Enviar</button>

  </form>
  <!-- mostrar respuesta -->
  <div class="container col-12 text-center">
    <!-- bg-success -->
    <div class="row m-auto w-75">
      <!-- bg-danger -->
      <?php while ($row = mysqli_fetch_assoc($respuesta)) { ?>
        <div class="col-sm-11 col-md-11 col-lg-4 my-3 p-2 m-auto">
          <!-- bg-dark -->
          <div class="card w-100 m-auto border-primary border-3"">
    <h5 class=" card-header bg-danger"><?= $row['title'] ?></h5>
            <img src="data:<?= $row['tipo_img']; ?>;base64,<?php echo base64_encode($row['imgen']); ?>" class="img" alt="...">
            <hr>
            <div class="card-body">
              <p class="card-text"><?= $row['contenido'] ?></p>
              <input type="hidden" name="id" value="<?= $row['id'] ?>">
              <div class="row my-5 m-auto">
                <a href="../modify/delete.php?id=<?= $row['id'] ?>" class="btn btn-danger col-5 me-3 m-auto">Eliminar</a>
                <a href="../modify/update.php?id=<?= $row['id'] ?>" class="btn btn-success col-5 ms-3 m-auto">Actualizar</a>

              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>

  <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>