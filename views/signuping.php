<?php
session_start();
session_regenerate_id(true);
error_reporting(0);

require_once 'funcion.php';

$objeto;
$crud = new CRUD();
$conexion = Conexion::ConectarBD();



if (isset($_SESSION['rol'])) {
    switch ($_SESSION['rol']) {
        case 1:
            header('location:admin.php');
            break;
        case 2:
            header('location:esc.php');
            break;

        default:
    }
}

$nombre = "";
$apellido = "";
$email = "";
$password = "";
if (isset($_POST['submit'])) {
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conexion, $_POST['nombre']) : false;
    $apellido = isset($_POST['apellido']) ? mysqli_real_escape_string($conexion, $_POST['apellido']) : false;
    $email = isset($_POST['correo']) ? mysqli_real_escape_string($conexion, trim($_POST['correo'])) : false;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($conexion, $_POST['password']) : false;
    $rol = isset($_POST['roles']) ? mysqli_real_escape_string($conexion, $_POST['roles']) : false;

    $errores =  array();
    /* validar nombre */
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
        $nombre_valid = true;
    } else {
        $nombre_valid = false;
        array_push($errores, "Ingrese tu nombre correctamente");
    }
    /* validar apellido */

    if (!empty($apellido) && !is_numeric($apellido) && !preg_match("/[0-9]/", $apellido)) {
        $apellido_valid = true;
    } else {
        $apellido_valid = false;
        array_push($errores, "Ingrese tus apellidos correctamente");
    }
    /* validar email */
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_valid = true;
    } else {
        $email_valid = false;
        array_push($errores, "Ingrese tu correo electronico correctamente");
    }
    /* validar password */
    if (!empty($password) && strlen($password) > 7) {
        $password_valid = true;
    } else {
        $password_valid = false;
        array_push($errores, "Ingrese una contraseña alfa numerica(minimo 8 caracteres)");
    }
    if (!empty($rol) && strlen($rol) > 0) {
        $rol = true;
    } else {
        $rol = false;
        array_push($errores, "Ingrese un rol");
    }


    $guardar_usr = false;
    /* mostrar errores */
    if (count($errores) > 0) {
        echo "<div class='bg-danger col-12 mx-auto w-50'>";
        for ($i = 0; $i < count($errores); $i++) {
            echo "<li class='fs-4 text-dark'>\"" . $errores[$i] . "\"</li>";
            echo 'espera 5 segundos';
            header('refresh:5;url=signup.php');
        }
    } else {
        echo "<div class='bg-success col-12 mx-auto w-50'>" . "Todo Correcto." . '</br>';
        $guardar_usr = true;
        $cifrar_password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 20]);
        $objeto->nombre = $nombre;
        $objeto->apellido = $apellido;
        $objeto->email = $email;
        $objeto->cifrar_password = $cifrar_password;
        $objeto->rol = $rol;
        $crud->Registrar($objeto);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>


    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
<?php header('refresh:5;url=login.php'); ?>