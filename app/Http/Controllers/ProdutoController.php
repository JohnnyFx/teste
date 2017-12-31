<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Categoria;
use App\ImagemProduto;
use App\User;

use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class ProdutoController extends Controller
{

    public function index(Request $request){
        //$produtos = DB::table('produtos')->get();
        $pesquisa = $request->input('pesquisa');
        $categoria = $request->input('categoria');
        
        if(is_null($categoria)){
          $produtos = Produto::where('descricao','LIKE',"%{$pesquisa}%")->get();
        }else{
          $produtos = Produto::where('descricao','LIKE',"%{$pesquisa}%")->where('categoria_id',"=",$categoria)->get();
        }

        $categorias = Categoria::all();

        foreach($produtos as $produto){
          $produto->foto = 'upload/'.ImagemProduto::select('foto')->where("produto_id","=",$produto->id)->pluck("foto")->first();
        }
        return view('produto.index',['produtos' => $produtos,"categorias"=>$categorias,"pesquisa"=>$pesquisa]);
    }

    public function add(Request $request){
      $params =$request->all();
      $produto = new Produto($params);
      $produto->save();

      if ($request->hasFile('image')) {
        foreach($request->image as $foto){
          $imagem_produto = new ImagemProduto();
          $imagem_produto->produto_id = $produto->id;
          $imagem_produto->foto =  $this->storeImage($foto);
          $imagem_produto->save();
        }
      }
      
      return redirect("/produto")->with('teste', 0);
      
      }

    public function edit(Request $request){
    
      $id = $request->input('token');
      $produto = Produto::find($id);
      $produto->descricao = $request->input('descricao');
      $produto->categoria_id = $request->input('categoria_id');

      $produto->save();

      if ($request->hasFile('image')) {

        $imagensProdutos =  ImagemProduto::where("produto_id","=",$id)->get();

        if(!empty($imagensProdutos)){
          foreach($imagensProdutos as $imagem){
            $this->removeImage($imagem->foto);    
            $imagem->delete();
          }
        }

        foreach($request->image as $foto){
          $imagem_produto = new ImagemProduto();
          $imagem_produto->produto_id = $produto->id;
          $imagem_produto->foto =  $this->storeImage($foto);
          $imagem_produto->save();
        }
      }

      return redirect("/produto");
    }

     public function delete(Request $request){

      $id = $request->input('id');
      $produto = Produto::find($id);

      $imagensProdutos =  ImagemProduto::where("produto_id","=",$id)->get();

      if(!empty($imagensProdutos)){
        foreach($imagensProdutos as $imagem){
          $this->removeImage($imagem->foto);    
          $imagem->delete();
        }
      }

      $produto->delete();

      return redirect("/produto");
     
    } 

    public function detail(Request $request){
    
       $id = $request->input('id');
       $produto = Produto::find($id);
       $produto->fotos =  ImagemProduto::select('foto')->where("produto_id","=",$produto->id)->pluck("foto");


       return response()->json($produto);
    }

      
    public function pesquisa(Request $request){
  
      $pesquisa = $request->input('pesquisa');
      if(strlen($pesquisa)== 0){
        return redirect("/produto");
      }
      $produtos = Produto::where('descricao','LIKE',"%{$pesquisa}%")->get();

      foreach($produtos as $produto){
        $produto->foto = 'upload/'.ImagemProduto::select('foto')->where("produto_id","=",$produto->id)->pluck("foto")->first();
      }
      $categorias = Categoria::all();

      return view('produto.index',['produtos' => $produtos,"categorias"=>$categorias]);
    }

    public function listar(Request $request){
     

      $uname =  $_SERVER['PHP_AUTH_USER'];
      $password = $_SERVER['PHP_AUTH_PW'];
      
      if (Auth::attempt(array('username' => $uname, 'password' => $password))){
            $produtos = Produto::get();
            return $produtos;
      }
      else {        
         return response('Login incorreto', 401);
      }

     }


    public function storeImage($foto){
      $photoName = time().str_random(4).'.'.$foto->getClientOriginalExtension();
      $foto->move(public_path('upload'), $photoName);
      return $photoName;
    }  

    public function removeImage($foto){
      $pathToImage = public_path('upload/').$foto;
      if (file_exists($pathToImage)) {
        unlink($pathToImage);
      } 
    }
    
    
}
