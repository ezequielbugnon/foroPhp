
<div class="container" id="conteiner">
    
      
<?php $respon = Utils::show();?>
    

    <?php if($respon) : ?>
    <div class="row">
        <div class="col-md-4 mt-5">
        <table class="table table-dark">
          <thead>
            <tr>
              <th scope="col">Contenido</th>
              <th scope="col">Tema</th>
            </tr>
          </thead>
          <tbody>  
             <?php while($ke = $respon->fetch_object()) :?>
            <tr>
              <th scope="row"><?=$ke->contenido?></th>
              <td><?=$ke->nombre?></td>
              <td><a href="<?=base_url.'topic/editar&id='.$ke->id_topic?>" class="btn btn-warning btn-block">Editar</a><button class="btn btn-danger btn-block" value="<?=$ke->id_topic?>" id="borrar">Borrar</button></td>
            </tr>
            <tr>
              <?php endwhile; ?>

          </tbody>
        </table>
        </div>
       <?php endif; ?> 
        
      
        
        <div class="col-md-6 mt-5 mx-5 p-5 bg-dark text-white rounded-left">
              <?php if(isset($_SESSION['topic']) && $_SESSION['topic'] == 'create' ) :?>

                  <div class="alert alert-info mt-2 mx-auto" role="alert">
                      Tema creado correctamente
                  </div>
              <?php elseif (isset($_SESSION['topic']) && $_SESSION['topic'] == 'failed') : ?>
                  <div class="alert alert-danger  mt-2  mx-auto" role="alert">
                      Algo ha fallado
                  </div>
              <?php elseif (isset($_SESSION['topic']) && $_SESSION['topic'] == 'delete') : ?>
                 <div class="alert alert-info  mt-2  mx-auto" role="alert">
                       Topic eliminado
                 </div>
               <?php elseif (isset($_SESSION['editarNew']) && $_SESSION['editarNew'] == 'completed') : ?>
                 <div class="alert alert-info  mt-2  mx-auto" role="alert">
                       Topic editado correctamente
                 </div>
               <?php elseif (isset($_SESSION['editarNew']) && $_SESSION['editarNew'] != 'completed') : ?>
                 <div class="alert alert-info  mt-2  mx-auto" role="alert">
                       Topic no editado
                 </div>
              <?php endif; ?>

              <?php Utils::deleteSession('topic'); ?>
            
            <?php if(!isset($_SESSION['editar']) || $_SESSION['editar'] == 'failed') :?>
            
            <form method="post" action="<?=base_url?>topic/create">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Tema</label>
                  <input type="text" class="form-control" name="tema" id="exampleFormControlInput1" >
                </div>

                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Contenido</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" name="contenido" rows="3"></textarea>
                </div>
                 <?php $response = Utils::obtenerCat(Database::connect());?>
                       <?php if($response):?>
               <div class="form-group ">
                   <label for="exampleFormControlSelect1">Categoria</label>
                   <select class="form-control mb-5" id="exampleFormControlSelect1" name="categoria">
                     <?php while($res = $response->fetch_object() ): ?>
                       <option value="<?=$res->id?>"><?=$res->nombre;?></option> 
                     <?php endwhile;?>
                   </select>
                 </div>
                <?php endif; ?>
                <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">Submit</button>
              </form>
        </div>
    </div>
    
     <?php elseif (isset($_SESSION['editar']) && $_SESSION['editar'] != 'failed') : ?>
           
            
           
            <form method="post" action="<?=base_url?>topic/editarNew">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Tema</label>
                  <input type="text" class="form-control" name="tema" id="exampleFormControlInput1" value="<?=$ed->nombre?>" >
                </div>

                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Contenido</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" name="contenido" rows="3"><?=$ed->contenido?></textarea>
                </div>
                 <?php $response = Utils::obtenerCat(Database::connect());?>
                       <?php if($response):?>
               <div class="form-group ">
                   <label for="exampleFormControlSelect1">Categoria</label>
                   <select class="form-control mb-5" id="exampleFormControlSelect1" name="categoria" >
                     <?php while($resp = $response->fetch_object() ): ?>
                       <option value="<?=$resp->id?>"><?=$resp->nombre;?></option> 
                     <?php endwhile;?>
                   </select>
                 </div>
                <?php endif; ?>
                <input type="hidden" name="id_topic" value="<?=$ed->id_topic?>" >
                <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">Submit</button>
              </form>
        </div>
    </div>
  
   
     <?php endif; ?>
         <?php Utils::deleteSession('editar'); ?>
    <?php Utils::deleteSession('editarNew'); ?>
</div>