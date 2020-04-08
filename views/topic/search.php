 

<div class="container">

<table class="table mt-5 table table-striped">
  <thead class="thead-dark">
      
    <tr>
  
      <th scope="col">Tema</th>
      <th scope="col">Pregunta</th>
      <th scope="col">Categoria</th>
    </tr>
     
  </thead>
  <tbody>
         
     <?php if(isset($response) && $response->num_rows > 0 ): ?>   
     <?php foreach($response as $key): ?>   
    <tr>
      <td><?=$key['nombre']?></td>
      <td><a href="<?=base_url.'topic/show&id='.$key['id_topic']?>"><?= substr($key['contenido'],0, 35);?></a></td>
       <td><a href="<?=base_url.'categorias/index&categoria='.$key['cat']?>"><?=$key['cat']?></a></td>
    </tr>
     <?php endforeach; ?>  
       <?php elseif(!$response || $response->num_rows == 0): ?> 
         <div class="alert alert-danger  mt-2  mx-auto" role="alert">
                      No hay entradas!!!
                  </div>
           <?php endif; ?>  
  </tbody>
</table>





</div>