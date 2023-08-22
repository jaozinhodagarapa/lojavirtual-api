<?php

namespace App\Http\Controllers;

use App\Http\Requests\Produto as RequestsProduto;
use App\Models\Produto as ModelsProduto;
use Illuminate\Http\Request;

class Produto extends Controller
{
    public function store(RequestsProduto $request)
    {
        $produto = ModelsProduto::create([
            'nome' => $request->nome,
            'codigo' => $request->codigo,
            'preco' => $request->preco,
            'tipo' => $request->tipo,
            'linha' => $request->linha
        ]);

        return response()->json([
            "succes" => true,
            "message" => "Produto cadastrado",
            "data" => $produto
        ], 200);
    }
}
