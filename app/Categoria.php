<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model {
    protected $table = 'categoria';

    protected $fillable = [];

    protected $hidden = [];


    public function lancamentos(){
        return $this->hasMany('App\Lancamento', 'categoria_id');
    }
}