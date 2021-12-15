<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>signup</title>
</head>
<body>
  
<form class="row w-50 mx-auto needs-validation" action="signuping.php" method="POST" >
  <div class="col-12">
    <label for="nombre" class="form-label">Ingrese su nombre</label>
    <input type="text" class="form-control" name="nombre" required>
  </div>
  <div class="col-12">
    <label for="apellido" class="form-label">Ingrese su apellido</label>
    <input type="text" class="form-control" name="apellido" required >
  </div>
  <div class="col-12">
    <label for="correo" class="form-label">Ingrese su correo electronico</label>
    <div class="input-group has-validation">
      <span class="input-group-text" id="inputGroupPrepend">@</span>
      <input type="email" class="form-control" name="correo" aria-describedby="inputGroupPrepend" required>
    </div>
  </div>
  <div class="col-12">
    <label for="password" class="form-label">Ingrese una contraseña alfa numerica</label>
    <input type="password" class="form-control" name="password" required>
  </div>

  <div class="w-75 m-auto ">
    <select name="roles" class="form-select my-2 text-center">
      <option value="1">Admin</option>
      <option value="2">usr</option>
    </select>
  </div>
  <div class="clearfix"></div>

  <div class="w-50 m-auto">
    <button class="btn btn-success col-12 p-2" type="submit" name="submit" value="submit">Enviar</button>
  </div>
</form>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
