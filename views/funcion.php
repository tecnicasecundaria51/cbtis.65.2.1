<?php
require_once 'db.php';
class CRUD{
  /* registro */
  public function Registrar($objeto){
      $conexion = Conexion::ConectarBD();
      $insert = "INSERT INTO usuarios  (id_rol, nombre, apellido, email, password) VALUES ('$objeto->rol', '$objeto->nombre', '$objeto->apellido', '$objeto->email', '$objeto->cifrar_password');";
      $conexion->query($insert) or die('bad'. header('refresh:5;url=index.php'));
      echo 'registo exitoso espera 5 segundos';
      header('refresh:5;url=index.php');
    }
    /* login */
    public function Login($login){
      $conexion = Conexion::ConectarBD();
        $sql = "SELECT * FROM usuarios WHERE email = '$login->email';";
        $log = mysqli_query($conexion, $sql) or die('bad'. header('refresh:5;url=index.php'));
        if($log && mysqli_num_rows($log) == 1){
            $usuario = mysqli_fetch_assoc($log);
            $verify = password_verify($login->password, $usuario['password']);
            $rol = $usuario['id_rol'];
            if($verify){
              $_SESSION['rol'] = $rol;
        
              switch($_SESSION['rol']){
                case 1:
                  header('location:admin.php');
                  break;
                case 2:
                  header('location:esc.php');
                  default:
              }
              if(isset($_SESSION['error_login'])){
                session_unset($_SESSION['error_login']);
        
              }
            }else{
              echo 
              $_SESSION['error_login'] = '<div class="w-50 m-auto bg-danger text-center fs-3">'.'<p>'.'Ups, hubo un error comprueba que tus credenciales estan bien'.'</p>'.'<img width="175px" src="memes/perrito2.webp" class="img-fluid text-center" alt="">'.'</div>' ;
            }
          }else{
            echo '<div class="w-50 m-auto bg-danger text-center fs-3">'.'<p>'.'Ups, hubo un error comprueba que tus credenciales estan bien'.'</p>'.'<img width="175px" src="memes/perrito2.webp" class="img-fluid text-center" alt="">'.'</div>' ;
          }
    }
    /* publicacion */
    public function pub_admin($publicacion){
      $conexion = Conexion::ConectarBD();
      $insert = "INSERT INTO publicacion (nombre_img, imgen, tipo_img, url, contenido, title, id_rol)  VALUES ('$publicacion->nombre', '$publicacion->imagenbin', '$publicacion->tipo', '$publicacion->url', '$publicacion->contenido', 
      '$publicacion->title', '$publicacion->rol')";
        $conexion->query($insert) or die('bad'. header('refresh:5;url=index.php'));
        echo '<div class="bg-success text-center">'.'<P>'.'Publicacion exitosa espera 5 segundos'.'</P>'.'<img width="175px" src="../../memes/perrito.jpg" class="img-fluid text-center" alt="">'.'</div>';
        header('refresh:5;url=../index.php');        header('refresh:5;url=index.php');
    }
    public function mostrar(){
      $conexion = Conexion::ConectarBD();
      $mostrartodo = "SELECT * FROM publicacion WHERE id_rol = '1' ;";
      $resultado = $conexion->query($mostrartodo);
      return $resultado;
    }
    public function Select_for_id($query){
      $conexion = Conexion::ConectarBD();
      $eliminar = $conexion->query($query);
      return $eliminar;

    }public function After_Delete($eliminar){
      $conexion = Conexion::ConectarBD();
      $query = "DELETE FROM publicacion WHERE id = '$eliminar->id'";
      $conexion->query($query) or die('<div class="w-50 m-auto bg-danger text-center fs-3">'.'<p>'.'Ups, hubo un error comprueba que este todo bien'.'</p>'.'<img width="175px" src="../views/memes/perrito2.webp" class="img-fluid text-center" alt="">'.'</div>'.header('refresh:5;url=../views/index.php')) ;
      echo '<div class="bg-success">'.'<P>'.'Eliminacion exitosa espera 5 segundos'.'</P>'.'<img width="175px" src="../views/memes/perrito2.webp" class="img-fluid text-center" alt="">'.'</div>'.header('refresh:5;url=../views/index.php');
    }
    public function update_admin($publicacion){
      $conexion = Conexion::ConectarBD();
      $query = "UPDATE publicacion SET nombre_img='$publicacion->nombre', imgen='$publicacion->imagenbin', tipo_img='$publicacion->tipo', url='$publicacion->url',contenido='$publicacion->contenido', title='$publicacion->title' WHERE id='$publicacion->id_d';";
        $conexion->query($query) or die('<div class="w-50 m-auto bg-danger text-center fs-3">'.'<p>'.'Ups, hubo un error comprueba que tus credenciales estan bien'.'</p>'.'<img width="175px" src="../views/memes/perrito2.webp" class="img-fluid text-center" alt="">'.'</div>'. header('refresh:5;url=../../views/index.php'));
        echo '<div class="bg-success text-center">'.'<P>'.'actualizacion exitosa espera 5 segundos'.'</P>'.'<img width="175px" src="../views/memes/perrito2.webp" class="img-fluid text-center" alt="">'.'</div>';
        header('refresh:5;url=../../views/index.php');
    }
}
class Objeto{
    
}