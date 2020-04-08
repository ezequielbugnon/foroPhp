var borrar = document.querySelectorAll('#borrar');
var borrar2 = document.querySelectorAll('#borrar2');
var conteiner = document.querySelector('#conteiner');
var listado = document.querySelectorAll('#listado');
var content_one = document.querySelector('#content_one');
var arr ="";


borrar.forEach(function (ele){
     
    ele.addEventListener('click', añadirBoton);
   
})

borrar2.forEach(function (ele){
   
    ele.addEventListener('click', añadirBoton2);
   
})




function añadirBoton(e){
  
    var contenido = document.createElement('div');
    
    contenido.innerHTML = "<div class='modal mt-5' tabindex='-1' role='dialog'>"+
        "<div class='modal-dialog' role='document'>"+
          "<div class='modal-content'>"+
            "<div class='modal-header'>"+
              "<h5 class='modal-title'>Eliminar Topic</h5>"+
              "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>"+
               " <span aria-hidden='true'>&times;</span>"+
              "</button>"+
            "</div>"+
            "<div class='modal-body'>"+
              "<p>¿Realmente deseas eliminar el topic?</p>"+
            "</div>"+
            "<div class='modal-footer'>"+
              "<a href='/foro/topic/delete&id="+e.target.value+"' type='button' class='btn btn-primary'>Si</a>"+
              "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>"+
            "</div>"+
          "</div>"+
        "</div>"+
      "</div>";
    contenido.children[0].style.display = "block";
   
     conteiner.appendChild(contenido);
    
     cerrar(contenido.children[0].children[0].children[0].children[2].children[1], contenido);
     cerrar(contenido.children[0].children[0].children[0].children[0].children[1], contenido);
}


function añadirBoton2(e){
  
    var contenido = document.createElement('div');
    
    contenido.innerHTML = "<div class='modal mt-5' tabindex='-1' role='dialog'>"+
        "<div class='modal-dialog' role='document'>"+
          "<div class='modal-content'>"+
            "<div class='modal-header'>"+
              "<h5 class='modal-title'>Eliminar comentario</h5>"+
              "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>"+
               " <span aria-hidden='true'>&times;</span>"+
              "</button>"+
            "</div>"+
            "<div class='modal-body'>"+
              "<p>¿Realmente deseas eliminar el comentario?</p>"+
            "</div>"+
            "<div class='modal-footer'>"+
              "<a href='/foro/comentario/delete&id="+e.target.value+"' type='button' class='btn btn-primary'>Si</a>"+
              "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>"+
            "</div>"+
          "</div>"+
        "</div>"+
      "</div>";
    contenido.children[0].style.display = "block";
  
    content_one.appendChild(contenido);
    
     cerrar(contenido.children[0].children[0].children[0].children[2].children[1], contenido);
     cerrar(contenido.children[0].children[0].children[0].children[0].children[1], contenido);
}



function cerrar(close,contenido){
   close.addEventListener('click', function(e){
        contenido.remove();
    });
}

listado.forEach(function (ele){
  
 
    ele.addEventListener('click', tocarLi);
   
})


function tocarLi(e){
    
    if(!e.target.classList.contains('active')){
        if(arr.classList){
            arr.classList.remove('active');
        }
         
        e.target.classList.add('active');
        arr = e.target;
    }else{
        e.target.classList.remove('active');
    }
    
}



