<?php 
require_once 'funcion.php';
session_start();
session_regenerate_id(true);
error_reporting(0);
$login = new Objeto();
$crud = new CRUD();
$conexion = Conexion::ConectarBD();



/* validar rol y redireccionar */
if(isset($_SESSION['rol'])){
  switch($_SESSION['rol']){
    case 1:
      header('location:admin.php');
    break;
    case 2:
      header('location:esc.php');
    break;

    default:
  }
}
/* validar datos */
if(isset($_POST['submit'])){
  $email = trim($_POST['email']);
  $password  = $_POST['password'];

  $login->email = $email;
  $login->password = $password;
  $crud->Login($login);


}
  
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>login</title>
</head>
<body>
<form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
  <div class="mb-3 mx-auto w-50">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input name="email" type="email" class="form-control" id="exampleInputEmail1" required aria-describedby="emailHelp">
  </div>
  <div class="mb-3 mx-auto w-50">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1" required>
  </div>
  <div class="mb-3 form-check mx-auto w-50">
    <button name="submit" type="submit" class="btn btn-primary m-auto">Submit</button>
  </div>
</form>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>