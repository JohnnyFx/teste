@extends('/base')

@section('title','Início')

@section('container')



<div class="row">

    <div class="col s6 m6 l6">
        <div class="card z-depth-3">
            <div class="card-content purple  white-text center-align">
                <p class="card-stats-title"><i class="mdi-editor-attach-money"></i> Produtos </p>
                    <h4 class="card-stats-number">{{$produtos}}</h4>
                <p></p>
            </div>
            <div class="card-action purple darken-2 center-align">
                 <a href="{{ url('produto') }}"  class="btn-floating btn-large waves-effect waves-light white center-align pulse"><i class="material-icons purple-text">launch</i></a>            </div>
        </div>
    </div>
  
      <div class="col s6 m6 l6">
            <div class="card z-depth-3">
                <div class="card-content  cyan  white-text center-align">
                    <p class="card-stats-title"><i class="mdi-social-group-add"></i> Categorias</p>
                    <h4 class="card-stats-number">{{$categorias}}</h4>
                    <p></p>    
                </div>
                <div class="card-action  cyan darken-2 center-align">
                     <a  href="{{ url('categoria') }}"  class="btn-floating btn-large waves-effect waves-light white center-align pulse"><i class="material-icons cyan-text">launch</i></a>                </div>
            </div>
        </div>

        

@endsection

