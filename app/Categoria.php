<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = "categoria";
    public $timestamps = false;

    protected $fillable = array('descricao');
    
    public function produtos(){
        return $this->hasMany("App\Produto");
        }

    }
