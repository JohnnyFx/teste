<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Produto;

use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoriaController extends Controller
{
    public function index(Request $request){
        $pesquisa = $request->input('pesquisa');
        if(strlen($pesquisa) > 0){
          $categorias = Categoria::where('descricao','LIKE',"%{$pesquisa}%")->get();
        }else{
          $categorias = Categoria::all();
        }

        return view('categoria.index',['categorias' => $categorias,"pesquisa"=>$pesquisa]);

        
    }

    public function add(Request $request){

      $params =$request->all();
      $categoria = new Categoria($params);

      if ($request->hasFile('image')) {
        $categoria->foto = $this->storeImage($request);
      }

      $categoria->save();

      return redirect("/categoria");
    }

    public function delete(Request $request){

        $id = $request->input('id');
        $categoria = Categoria::find($id);
        
        if(!empty($categoria['foto'])){
          $this->removeImage($categoria['foto']);    
        }

        $produtos = Produto::where('categoria_id',"=",$categoria->id)->get()->count();


        if($produtos <= 0){
          $categoria->delete();
        }
      

        return redirect("/categoria");
       
      }

    public function detail(Request $request){
    
       $id = $request->input('id');
       $categoria = Categoria::find($id);

       return response()->json($categoria);
      }

      public function pesquisa(Request $request){
    
        $pesquisa = $request->input('pesquisa');
        $categoria = Categoria::where('descricao','LIKE',"%{$pesquisa}%")->get();
        return view('categoria.index',['categorias' => $categoria]);
       }
 

      public function edit(Request $request){
    
        $id = $request->input('token');
        $categoria = Categoria::find($id);
        $categoria->descricao = $request->input('descricao');

        if ($request->hasFile('image')) {

          if(!empty($categoria['foto'])){
            $this->removeImage($categoria['foto']);    
          }

          $categoria->foto = $this->storeImage($request);

        }

        $categoria->save();

        return redirect("/categoria");
       }

       
    public function storeImage(Request $request){
      $photoName = time().'.'.$request->image->getClientOriginalExtension();
      $request->image->move(public_path('upload'), $photoName);
      return $photoName;
    }  

    public function removeImage($foto){
      $pathToImage = public_path('upload/').$foto;
      if (file_exists($pathToImage)) {
        unlink($pathToImage);
      } 
    }
}
