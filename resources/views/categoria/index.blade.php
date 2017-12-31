@extends('/base')

@section('title','Categoria')

@section('container')
<br>



<div class="row form">
  
    <div id="listar" class="col s12">
    <ul class="collection with-header">
        <li class="collection-header"><h4> <i class="material-icons lefft">search </i> Filtrar categorias<a class="secondary-content" id="pesquisar"><i class="material-icons blue-text" >add</i></a></h4>
        
        </li>
        <form action="/categoria" method="post" >
        {{ csrf_field() }}
  <div id="campoPesquisa" style="display:none;">
        <li class="collection-item">
        <label for="search">Pesquisa por nome(categoria)</label>
                <input id="search" type="search" name="pesquisa" value="{{$pesquisa}}" >
        </li>

        <li class="collection-item valign-wrapper" >
            <button class="btn waves-effect waves-light center-align light-blue" type="submit" name="action">Pesquisar
                <i class="material-icons right">search  </i>
            </button>
        </li>
        </div>
        </form>
     

       
      </ul>
    

      <ul class="collection with-header">
      <li class="collection-header"><h4>Cadastrados</h4></li>    
    
    @foreach ($categorias as $categoria)
    <li class="collection-item avatar">
      <img src="upload/{{$categoria->foto}}" alt="" class="circle">
      <span class="title">{{$categoria->descricao}}</span>
      

      <div class="secondary-content">
        <i class="material-icons blue-text detalhes" data-valor="{{$categoria->id}}">create</i>
        <a href="/categoria/delete?id={{$categoria->id}}"><i class="material-icons red-text ">delete_forever</i></a>
      </div>
    </li>

    @endforeach
    </ul>
    </div>

    
    <div id="cadastrar" class="col s12" style="display:none">
  <div class="col s12" id="formulario">
    <form id="form" action="/categoria/add" method="post" class="col s12"  enctype="multipart/form-data"    >
        {{ csrf_field() }}
        <div class="row">
            <div class="input-field col s12">
            <i class="material-icons prefix">list</i>
            <input id="descricao" type="text" name="descricao" class="validate">
            <label for="descricao">Descrição</label>
            </div>
        </div>

    <div class="file-field input-field">
      <div class="btn">
        <span>Foto categoria</span>
        <input type="file" name="image">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>

    <div id="imagem">
    </div>
    
   

        <div class="input-field col s12 valign-wrapper">
            <button class="btn waves-effect waves-light center-align light-blue" type="submit" name="action">Enviar
                <i class="material-icons right">send</i>
            </button>
        </div>
  </form>
  </div>  
  </div>

  <div class="fixed-action-btn">
   <a class="btn-floating light-blue btn-large z-depth-3 btn tooltipped" id="mostrarCadastro" data-position="left" data-delay="50" data-tooltip="Cadastrar novo" data-tooltip-id="c4c8f0ad-6b4b-68a2-e705-36d32eaf9f78"><i class="material-icons">add</i></a>

   
  </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

<script>
$(".detalhes").on("click",function(){
        $id = $(this).data("valor");
        $.ajax({
            'url': '/categoria/detail',
            'method': "GET",
            'data': { id: $id},
            'dataType':'json',
            'success':function(data) {
                 $("label").addClass("active");
                 $("#listar").hide("slow");
                 $("#cadastrar").show('slow');
                 $("#mostrarCadastro").hide("slow");
                 $("#descricao").val(data['descricao']);
                 $("#imagem").append("<img class='responsive-img' style='max-width:150px;margin:20px' src='upload/"+data['foto']+"'>");
                
                 
                
                 $("#form").attr('action', '/categoria/edit');
                 $id = data['id'];
                 $('#form').append("<input type='hidden' name='token' value="+$id+" />");

            },
            'error':function(data){
            }
        });   
   });

 
   $("#pesquisar").on("click",function(){
    if($("#campoPesquisa").is(":visible")){

        $("#campoPesquisa").hide('slow');
        
    }else{
        $("#campoPesquisa").show('slow');
    }
   })
  

   $("#categoria").addClass("active");

   
   </script>
@endsection
