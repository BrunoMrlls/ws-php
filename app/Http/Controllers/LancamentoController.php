<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Lancamento;
use Illuminate\Http\Request;

class LancamentoController extends BaseController
{
    public function listar(){
        // return response()->json(Lancamento::with('categoria','pessoa')->get()->toArray());
        $lancamentos = Lancamento::with('categoria', 'pessoa')->get();
        $result = [];
        foreach ($lancamentos as $lancamento) {
            $endereco_id = $lancamento->pessoa->id;
            $endereco = $this->buscaEndereco($endereco_id);
            $lancamento->pessoa->endereco = $endereco;
            $result[] = $lancamento;
        }
        
        return response()->json($result, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function buscar($id){
        $lancamento = Lancamento::with('categoria', 'pessoa')->findOrFail($id);
        $endereco_id = $lancamento->pessoa->id;
        $lancamento->pessoa->endereco = $this->buscaEndereco($endereco_id);
        return response()->json($lancamento, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function criar(Request $request){
        $lancamento = Lancamento::create($request->all());
        $url = $_SERVER['HTTP_HOST'];
        $resource = '/api/lancamento/';
        $id = $lancamento->id;
        $location = $url . $resource . $id;

        return response()->json($lancamento, 201, [], JSON_UNESCAPED_UNICODE)->header('Location', $location);
    }

    public function atualizar($id, Request $request){
        $lancamento = Lancamento::findOrFail($id);
        $lancamento->update($request->all());
        return response()->json($lancamento, 201);
    }
 
    public function deletar($id){
        Lancamento::findOrFail($id)->delete();
        return response('Deletado com sucesso!', 200);
    }

    public function buscaEndereco($endereco_id){
        $endereco = null;
        if ($endereco_id > 0){
            $endereco = \App\Endereco::where('pessoa_id', '=', $endereco_id)->get()->first();
        }
        return $endereco;
    }
}
