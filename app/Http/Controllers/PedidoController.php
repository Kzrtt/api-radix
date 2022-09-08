<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Cliente;

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

    public function getAllPedidos($id){
        
        if(Cliente::where('idCliente', $id)->exists())
        {
            $pedidos = Pedido::all();
            $filtered = $pedidos->filter(function($value, $key) use ($id) {
                return $value->idCliente == $id;
            });

            return response()->json([
                'status'=>'200',
                'pedidos'=>$filtered,
            ]);
        } else {
            return response()->json([
                'status'=>'400',
                'message'=>'esse cliente não existe',
            ]);
        }
    }
}
