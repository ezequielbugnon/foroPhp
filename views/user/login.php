
<?php if(isset($_SESSION['logueado']) &&  $_SESSION['logueado'] != 'failed'){
     header('Location:/foro');
}
?>



<div class="container">
    
    <?php if(isset($_SESSION['logueado']) && $_SESSION['logueado'] == 'failed')  :?>
         <div class="alert alert-info mt-2 mx-auto" role="alert">
                       Algunos datos no coinciden!!!
            </div>
    <?php endif;?>
    
    <form class="col-6 bg-info mt-5 py-5 mx-auto" action="<?=base_url?>user/log" method="post">

  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="text" class="form-control" name="email" placeholder="Ingresa tu email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Contraseña</label>
    <input type="password" class="form-control" name="password" placeholder="Ingresa tu contraseña">
  </div>
 
        <button type="submit" name="submit" class="btn btn-primary btn-block btn-dark mt-5">Ingresar</button>

    <a href="<?=base_url?>user/register" class="badge badge-light mt-5 p-2">Registrate</a>
  </div>
</form>
</div>