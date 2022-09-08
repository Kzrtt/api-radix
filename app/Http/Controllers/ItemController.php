<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Pedido;

class ItemController extends Controller
{
    public function addItem(Request $request)
    {
        $item = New Item();

        $item->qntdItem = $request->qntdItem;
        $item->idProduto = $request->idProduto;
        $item->idPedido = $request->idPedido;
        $result = $item->save();

        if($result)
        {
            return response()->json([
                'status'=>'200',
                'message'=>'Item inserido com sucesso',
            ]);
        } else {
            return response()->json([
                'status'=>'400',
                'message'=>'Falha ao inserir o item',
            ]); 
        }
    }

    public function getItem($idItem)
    {
        if(Item::where('idItem', $idItem)->exists())
        {
            $item = Item::find($idItem);

            return response()->json([
                'status'=>'200',
                'item'=>$item,
            ]);
        } else {
            return response()->json([
                'status'=>'200',
                'mensagem'=>'O item não existe',
            ]);
        }
    }

    public function getAllItems($idPedido)
    {
        if(Pedido::where('idPedido', $idPedido)->exists())
        {
            $items = Item::all();
            $filtered = $items->filter(function($value, $key) use ($idPedido) {
                return $value->idPedido == $idPedido;
            });

            return response()->json([
                'status'=>'200',
                'items'=>$filtered,
            ]);
        } else {
            return response()->json([
                'status'=>'400',
                'message'=>'esse pedido não existe',
            ]);
        }
    }

    public function deleteItem($idItem)
    {
        if(Item::where('idItem', $idItem)->exists())
        {
            $item = Item::find($idItem);
            $item->delete();

            return response()->json([
                'status'=>'200',
                'mensagem'=>'Item deletado com sucesso',
            ]);
        } else {
            return response()->json([
                'status'=>'400',
                'mensagem'=>'O item não existe',
            ]);
        }
    }
}
