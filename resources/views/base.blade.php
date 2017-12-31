
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>New Way - Teste</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  <link rel="stylesheet" href="<?php echo asset('css/ghpages.css')?>" type="text/css"> 
  <style>
  .search-wrapper {
    display: block;
    font-size: 16px;
    font-weight: 300;
    width: 100%;
    height: 45px;
    margin: 0;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    padding: 0 45px 0 15px;
    border: 0;
}
</style>
</head>
<body>

<a href="#" data-activates="nav-mobile" class="button-collapse top-nav waves-effect waves-light circle hide-on-large-only"><i class="material-icons">menu</i></a>
<ul id="nav-mobile" class="side-nav fixed  grey lighten-4">
  <li class="logo"><a id="logo-container" href="/" class="brand-logo">
    <img src="http://www.gruponewway.com.br/wp-content/themes/newway-theme/img/logotipo-newway-solucoes-web-e-mobile.png" width="100%" id="front-page-logo"></a>
  </li>
        <li class="bold" class="inicio">
          <a class="waves-effect waves-teal" href="{{ url('inicio') }}" >Início</a>
        </li>

        <li class="bold" class="produto">
          <a class="waves-effect waves-teal" href="{{ url('produto') }}" >Produto</a>
        </li>

        <li class="bold" class="categoria">
          <a class="waves-effect waves-teal" href="{{ url('categoria') }}" >Categoria</a>
        </li>
</ul>
<ul id="nav-mobile" class="side-nav fixed show-on-large  grey lighten-4">
        <li class="logo"><a id="logo-container" href="/" class="brand-logo">
          <img src="http://www.gruponewway.com.br/wp-content/themes/newway-theme/img/logotipo-newway-solucoes-web-e-mobile.png" width="100%" id="front-page-logo"></a>
        </li>
        <li class="bold" class="inicio">
          <a class="waves-effect waves-teal" href="{{ url('inicio') }}" >Início</a>
        </li>
        <li class="bold" id="produto"><a class="waves-effect waves-teal" href="{{ url('produto') }}" id="produto">Produto</a></li>
        <li class="bold"  id="categoria"><a class="waves-effect waves-teal" href="{{ url('categoria') }}"  id="categoria">Categoria</a></li>
</ul>
        </li>



<main>

<nav class="top-nav" style="background-color:#00a6eb;">
    <div class="container">
      <div class="nav-wrapper">
        <a class="page-title">@yield('title')</a>
      </div>
    </div>
</nav>

<div class="container">
@yield('container')
</div>
</main>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
  <script type="text/javascript" src="<?php echo asset('js/funcoes.js')?>"></script>
  </body>
</html>


