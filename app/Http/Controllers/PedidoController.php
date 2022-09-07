<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;

class PedidoController extends Controller
{
    public function inserirPedido(Request $request)
    {
        $pedido = New Pedido();

        $pedido->data = $request->data;
        $pedido->frete = $request->frete;
        $pedido->idCliente = $request->idCliente;
        $pedido->idVendedor = $request->idVendedor;
        $pedido->idCupomCliente = $request->idCupomCliente;
        $pedido->idEntregador = $request->idEntregador;
        $result = $pedido->save();

        if($result)
        {
            return response()->json([
                'status'=>'200',
                'message'=>'Pedido inserido com sucesso',
            ]);
        } else {
            return response()->json([
                'status'=>'400',
                'message'=>'Falha ao inserir o pedido',
            ]); 
        }
    }

    public function getPedido($idPedido)
    {
        if(Pedido::where('idPedido', $idPedido)->exists())
        {
            $pedido = Pedido::find($idPedido);

            return response()->json([
                'status'=>'200',
                'pedido'=>$pedido,
            ]);
        } else {
            return response()->json([
                'status'=>'400',
                'pedido'=>'O pedido não existe',
            ]);
        }
    }

    public function getAllPedidos(){
        
        $pedidos = Pedidos::all();

        if(isset($pedidos))
        {
            return response()->json([
                'status'=>'200',
                'pedidos'=>$pedidos,
            ]);
        } else {
            return response()->json([
                'status'=>'400',
                'message'=>'Falha ao retornar os pedidos',
            ]);
        }
    }
}
