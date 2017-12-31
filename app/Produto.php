<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = "produto";
    public $timestamps = false;

    protected $fillable = array('descricao','categoria_id');

    public function categoria(){
               return  $this->belongsTo("App\Categoria");
        }

}
