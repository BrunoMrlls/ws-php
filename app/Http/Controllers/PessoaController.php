<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Pessoa;
use Illuminate\Http\Request;

class PessoaController extends BaseController
{
    public function listar(){
        //return response()->json(Pessoa::all());
        return response()->json(Pessoa::with('endereco')->get());
    }

    public function buscar($id){
        return response()->json(Pessoa::findOrFail($id)->with('endereco')->find($id));
        
    }

    public function inserir(Request $request){
        $pessoa = Pessoa::create($request->all());
        return response()->json($pessoa, 201);
    }

    public function alterar($id, Request $request){
        $pessoa = Pessoa::findOrFail($id);
        $pessoa->update($request->all());
        return response()->json($pessoa, 201);
    }

    public function deletar($id){
        Pessoa::findOrFail($id)->delete();
        return response('Deletado com sucesso.', 200);
    }

}
