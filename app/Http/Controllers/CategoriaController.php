<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends BaseController
{
    public function listar(){
        return response()->json(Categoria::all());
    }

    public function buscar($id){
        return response()->json(Categoria::findOrFail($id));
    }

    public function inserir(Request $request){
        $categoria = Categoria::create($request->all());
        return response()->json($categoria, 201);
    }

    public function alterar($id, Request $request){
        $categoria = Categoria::findOrFail($id);
        $categoria->update($request->all());
        return response()->json($categoria, 201);
    }

    public function deletar($id){
        Categoria::findOrFail($id)->delete();
        return response('Deletado com sucesso.', 200);
    }

}
