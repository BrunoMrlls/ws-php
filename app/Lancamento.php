<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lancamento extends Model {
    public $timestamps = false;
    protected $table = 'lancamento';

    protected $appends = array('dataVencimento', 'dataPagamento');
    protected $fillable = ['descricao', 'dataVencimento', 'dataPagamento', 'valor', 
        'obs', 'tipo', 'categoria', 'pessoa'];
    protected $hidden = ['categoria_id', 'pessoa_id', 'dt_venc', 'dt_pag'];

    public function categoria(){
        return $this->belongsTo('App\Categoria', 'categoria_id');
    }

    public function pessoa(){
       return $this->belongsTo('App\Pessoa', 'pessoa_id');
    }

    public function getDataVencimentoAttribute(){   
        return $this->attributes['dt_venc'];
    }
    public function getDataPagamentoAttribute(){
        if (isset($this->attributes['dt_pag'])){
            return $this->attributes['dt_pag'];
        }else{
            $this->attributes['dt_pag'] = null;
        }
    }

    public function setDataVencimentoAttribute($value){
        $this->dt_venc = $value;
    }

    public function setDataPagamentoAttribute($value){
        $this->dt_pag = $value;
    }

    public function setPessoaAttribute($value){
        $this->pessoa_id = $value['id'];
    }

    public function setCategoriaAttribute($value){
        $this->categoria_id = $value['id'];
    }
}