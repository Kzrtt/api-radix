<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Vendedor;

class ProdutoController extends Controller
{
    public function getEveryProduct() {
        $products = Produto::all();

        if(isset($products))
        {
            return response()->json([
                'status'=>'200',
                'products'=>$products,
            ]);
        } else {
            return response()->json([
                'status'=>'400',
                'message'=>'Falha ao retornar os produtos',
            ]);
        }
    }

    public function getProduto($idProduto)
    {
        if(Produto::where('idProduto', $idProduto)->exists())
        {
            $produto = Produto::find($idProduto);

            return response()->json([
                'status'=>'200',
                'produto'=>$produto,
            ]);
        } else {
            return response()->json([
                'status'=>'400',
                'message'=>'produto não existe',
            ]);
        }
    }
    
    public function getAllProdutos($idVendedor)
    {

        if(Vendedor::where('idVendedor', $idVendedor)->exists())
        {
            $produtos = Produto::all();
            $filtered =  $produtos->filter(function ($value, $key) use ($idVendedor) {
                return $value->idVendedor == $idVendedor;
            });
            
            return response()->json([
                'status'=>'200',
                'produtos'=>$filtered,
            ]);

        } else {
            return response()->json([
                'status'=>'400',
                'message'=>'esse vendedor não existe',
            ]);
        }

    }

}
