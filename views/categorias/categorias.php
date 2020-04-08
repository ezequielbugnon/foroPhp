
<div class="container" >
<h1 class="display-2"><?=$params?></h1>
<ul class="list-group mt-5" id="listado" style="cursor: pointer">
  <?php foreach($result as $key) :?>
    <li class="list-group-item "><a href="<?=base_url?>topic/show&id=<?=$key['id_topic']?>"><?=$key['contenido']?></a></li>
 <?php endforeach;?>
</ul>
</div>