<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conversa;
use App\Models\Cliente;
use App\Models\Vendedor;
use App\Models\MsgCliente;
use App\Models\MsgVendedor;

class MsgsController extends Controller
{
    public function getChats($idCliente) {
        if(Cliente::where('idCliente', $idCliente)->exists())
        {
            $chats = Conversa::all();
            $vendedores = Vendedor::all();
            $filtered =  $chats->filter(function ($value, $key) use ($idCliente) {
                return $value->idCliente == $idCliente;
            });

            if(count($filtered) == 1) {
                return response()->json([
                    'status'=>'201',
                    'chat'=>$filtered,
                    'vendedores'=> $vendedores,
                ]);
            }
            
            return response()->json([
                'status'=>'200',
                'chats'=>$filtered,
                'vendedores'=> $vendedores,
            ]);

        } else {
            return response()->json([
                'status'=>'400',
                'message'=>'Esse cliente não possui conversas'
            ]);
        }
    }  
    
    public function getAllMessages($idConversa) {
        $allMessagesCliente = MsgCliente::all();
        $allMessagesVendedor = MsgVendedor::all();

        if(Conversa::where('idConversa', $idConversa)->exists()) {
            $filteredCliente = $allMessagesCliente->filter(function ($value, $key) use ($idConversa) {
                return $value->idConversa == $idConversa;
            });
            $filteredVendedor = $allMessagesVendedor->filter(function ($value, $key) use ($idConversa) {
                return $value->idConversa == $idConversa;
            });
            
            if($filteredCliente->isEmpty() && $filteredVendedor->isEmpty()){
                return response()->json([
                    'status'=>'400',
                    'message'=>'a conversa não possui mensagens'
                ]);
            } else if($filteredCliente->isEmpty() || $filteredVendedor->isEmpty()){
                if($filteredCliente->isEmpty()){
                    return response()->json([
                        'status'=>'201',
                        'msgVendedor'=> $filteredVendedor,
                    ]);
                } else {
                    return response()->json([
                        'status'=>'202',
                        'msgCliente'=> $filteredCliente,
                    ]);
                }
            } else {
                return response()->json([
                    'status'=>'200',
                    'msgCliente'=>$filteredCliente,
                    'msgVendedor'=>$filteredVendedor,
                ]);
            }

            
        } else {
            return response()->json([
                'status'=>'400',
                'mensagem'=>'conversa não existe'
            ]);
        }
    }

    public function sendMessage(Request $request) {
        $msgCliente = new MsgCliente();

        $msgCliente->mensagem = $request->mensagem;
        $msgCliente->data = $request->data;
        $msgCliente->idConversa = $request->idConversa;

        $result = $msgCliente->save();

        if($result)
        {
            return response()->json([
                'status'=>'200',
                'message'=>'Mensagem enviada com sucesso',
            ]);
        } else {
            return response()->json([
                'status'=>'400',
                'message'=>'Falha ao enviar a mensagem',
            ]); 
        }
    }
}
