<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model {
    protected $table = 'endereco';

    protected $hidden = ['pessoa_id'];

    protected $fillable = [];

    public function pessoa(){
        return $this->hasOne('App\Pessoa', 'pessoa_id');
    }

}