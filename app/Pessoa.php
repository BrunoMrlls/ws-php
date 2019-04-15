<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model {
    protected $table = 'pessoa';

    protected $fillable = ['nome', 'ativo'];

    protected $hidden = ['endereco_id'];

    public function endereco(){
        return $this->belongsTo('App\Endereco', 'endereco_id');
    }
}