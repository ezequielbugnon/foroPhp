
<div class="container">
    <?php if(isset($_SESSION['datos'])  && $_SESSION['datos'] == 'faltan datos') : ?>
        <div class="alert alert-danger col-6 mt-2 mx-auto" role="alert">
            Faltan datos
        </div>
    <?php elseif (isset($_SESSION['register'])  && $_SESSION['register'] == 'complete') :?>
         <div class="alert alert-info col-6 mt-2 mx-auto" role="alert">
             Datos correctos <a href="<?=base_url?>user/login">Logueate</a>
        </div>
    <?php elseif (isset($_SESSION['register'])  && $_SESSION['register'] == 'failed') :?>
        <div class="alert alert-info col-6 mt-2 mx-auto" role="alert">
            Algo salio mal
        </div>
    <?php endif; ?>
    <?php Utils::deleteSession('datos');
           Utils::deleteSession('register');  
            ?>
    
<form class="col-6 bg-info mt-5 py-4 mx-auto" action="<?=base_url?>user/signin" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre</label>
    <input type="text" class="form-control" name="nombre" placeholder="Ingresa tu nombre">
   
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Apellido</label>
    <input type="text" class="form-control" name="apellido" placeholder="Ingresa tu apellido">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="text" class="form-control" name="email" placeholder="Ingresa tu email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Contraseña</label>
    <input type="password" class="form-control" name="password" placeholder="Ingresa tu contraseña">
  </div>
 
  <button type="submit" name="submit" class="btn btn-primary btn-block btn-dark mt-4">Enviar</button>
</form>
</div>