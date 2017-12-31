//DEFAULT functions
$(".button-collapse").sideNav();

$("#mostrarCadastro").on("click",function(){
    $(this).hide('slow');
    $("#listar").hide("slow");
    $("#cadastrar").show('slow');
});


$(document).ready(function() {
    $('select').material_select();
    
  });
