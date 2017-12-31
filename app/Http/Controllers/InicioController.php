<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Produto;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class InicioController extends Controller
{
    public function index(){
        $produtos = Produto::all()->count();
        $categorias = Categoria::all()->count();
        return view('inicio.index',['produtos' => $produtos,"categorias"=>$categorias]);

    }
}
