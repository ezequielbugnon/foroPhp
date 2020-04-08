 

<?php if($_GET['page'] <= 0 || $_GET['page']> $total_page || !$_GET['page']){
  header('location: http://localhost/foro/topic/index&page=1');
}

?>

<div class="container">
<?php $limit = ($_GET['page']-1)*$cantidad_por_pagina;?>
<?php $response = Utils::allTopic($limit,$cantidad_por_pagina, Database::connect()); ?>
<table class="table mt-5 table table-striped">
  <thead class="thead-dark">
      
    <tr>
  
      <th scope="col">Autor</th>
      <th scope="col">Pregunta</th>
      <th scope="col">Categoria</th>
    </tr>
     
  </thead>
  <tbody>
     
     <?php foreach($response as $key): ?>   
    <tr>
      <td><?=$key['nombre']?></td>
      <td><a href="<?=base_url.'topic/show&id='.$key['id_topic']?>"><?= substr($key['contenido'],0, 35);?></a></td>
       <td><a href="<?=base_url.'categorias/index&categoria='.$key['categoria']?>"><?=$key['categoria']?></a></td>
    </tr>
     <?php endforeach; ?>  
  </tbody>
</table>

<nav class="mt-5">
  <ul class="pagination">
   
   
    <?php for($i=1; $i<= $total_page; $i++) :?>
    <li class="page-item"><a class="page-link" href="<?=base_url?>topic/index&page=<?=$i?>"> <?=$i?> </a></li>
    <?php endfor; ?>
     <li <?= $_GET['page'] == 1 ? 'class="page-item disabled"'  : 'class="page-item"' ?>><a class="page-link" href="<?=base_url?>topic/index&page=<?=$_GET['page']-1?>">Anterior</a></li>

    <li  <?= $_GET['page'] == $total_page ? 'class="page-item disabled"' : 'class="page-item"' ?>><a class="page-link" href="<?=base_url?>topic/index&page=<?=$_GET['page']+1?>" >Siguiente</a></li>
  </ul>
</nav>



</div>