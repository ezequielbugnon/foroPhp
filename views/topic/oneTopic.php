<div class="container" id="content_one">
     <?php if(isset($_SESSION['comment']) && $_SESSION['comment'] == 'eliminado'): ?> 
        
                  <div class="alert alert-info mt-2 mx-auto" role="alert">
                      Comentario eliminado correctamente
                  </div>
    <?php elseif (isset($_SESSION['comment']) && $_SESSION['comment'] == 'no eliminado') : ?>
                  <div class="alert alert-danger  mt-2  mx-auto" role="alert">
                      Algo ha fallado
                  </div>
    <?php endif; ?>
   <?php if($result): ?> 
    <?php foreach($result as $key): ?> 
  <div class="media mt-5">
  <img class="mr-3" src="" alt="">
  <div class="media-body">
    <h5 class="mt-0"><?=$key['nombre'] ?></h5>
   <?=$key['contenido']?>
    
   <?php if($_SESSION['identity']):?> 
    <form action="<?=base_url?>comentario/publicar" method="post">
        <input class="form-control mt-3" type="text" name="comentarios" placeholder="Añade tu comentarioo" >
        <input type="hidden" name="id_topic" value="<?=$key['id_topic']?>">
    </form>
    <?php endif; ?> 
    
    <?php if($comment):?> 
    <?php  foreach($comment as $com): ?>
    <div class="media mt-3 ">
      <a class="pr-3" href="#">
        <img src="" alt="">
      </a>
      <div class="media-body ">
        <h5 class="mt-0"><?= $com['nombre']?> ha dicho:</h5>
        <?= $com['contenido']?>
    
        <?php if($_SESSION['identity']['id'] == $com['id_usuario'] ):?>
        <a><button class="btn btn-danger" type="submit" id="borrar2" value="<?=$com['id_comentarios']?> <?=$com['id_topic_comment']?>">Borrar</button></a>
       <?php endif;?>
      </div>
    </div>
     <?php endforeach;?>
  </div>

    <?php endif;?> 
    </div>
      
    <?php endforeach;?>
    <?php endif; ?>
    <?php Utils::deleteSession('comment')  ?>
</div>