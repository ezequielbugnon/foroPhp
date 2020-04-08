<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand mx-5" href="#">Foro</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    
      <li class="nav-item dropdown">
       <?php if(isset($_SESSION['logueado']) && $_SESSION['logueado'] != 'failed'):?>   
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <?php foreach($_SESSION['logueado']  as $index => $sec):?>
                    <?= $sec ?>
           <?php endforeach;?>
        </a>
        
        <div class="dropdown-menu " aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?=base_url?>user/perfil">Perfil</a>
          <a class="dropdown-item" href="<?=base_url?>user/logout">Cerrar Sección</a>
        </div> 
        <?php endif;?> 
          
        <?php if(!isset($_SESSION['logueado']) || $_SESSION['logueado'] == 'failed'):?>
        <li class="nav-item">
        <a class="nav-link" href="<?=base_url?>user/login">Logeate</a>
        </li>
        <?php endif; ?>
        <li class="nav-item active">
        <a class="nav-link" href="<?=base_url?>">Menu <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="<?=base_url?>topic/index">Tema</a>
        </li>
    </ul>
      <form class="form-inline my-2 my-lg-0" method="post" action="<?=base_url?>topic/search">
          <input class="form-control mr-sm-2" name="search"  type="search" placeholder="Busqueda" aria-label="Search">
      <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Busqueda</button>
    </form>
  </div>
</nav>

 