<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Endereco;
use App\Models\Cliente;

class EnderecoController extends Controller
{
    public function addEndereco(Request $request)
    {
        $endereco = New Endereco();

        $endereco->apelidoEndereco = $request->apelidoEndereco;
        $endereco->endereco = $request->endereco;
        $endereco->complemento = $request->complemento;
        $endereco->numero = $request->numero;
        $endereco->statusEndereco = $request->statusEndereco;
        $endereco->idCliente = $request->idCliente;

        $result = $endereco->save();

        if($result)
        {
            return response()->json([
                'status'=>'200',
                'message'=>'Endereco inserido com sucesso',
                'endereco'=>$endereco,
            ]);
        } else {
            return response()->json([
                'status'=>'400',
                'message'=>'Falha ao inserir o endereco',
            ]); 
        }

         
    }

    public function updateEndereco(Request $request, $idEndereco)
    {
        if(Endereco::where('idEndereco', $idEndereco)->exists())
        {
            $endereco = Endereco::find($idEndereco);

            $endereco->apelidoEndereco = $request->apelidoEndereco;
            $endereco->endereco = $request->endereco;
            $endereco->complemento = $request->complemento;
            $endereco->numero = $request->numero;
            $endereco->statusEndereco = $request->statusEndereco;
            $endereco->idCliente = $request->idCliente;

            $endereco->save();

            return response()->json([
                'status'=>'200',
                'message'=>'Endereco atualizado com sucesso',
            ]);
        } else {
            return response()->json([
                'status'=>'400',
                'message'=>'Endereco não existe',
            ]);
        }
    }

    public function getAllEnderecos($id)
    {
        if(Cliente::where('idCliente', $id)->exists())
        {
            $enderecos = Endereco::all();
            $filtered =  $enderecos->filter(function ($value, $key) use ($id) {
                return $value->idCliente == $id;
            });
            
            if($filtered->isEmpty()){
                return response()->json([
                    'status'=>'400',
                    'message'=>'cliente não possui endereços',
                ]);
            } else {
                return response()->json([
                    'status'=>'200',
                    'enderecos'=>$filtered,
                ]);
            }

            

        } else {
            return response()->json([
                'status'=>'400',
                'message'=>'esse cliente não existe',
            ]);
        }
    }

    public function getEndereco($idEndereco)
    {   
        if(Endereco::where('idEndereco', $idEndereco)->exists())
        {
            $endereco = Endereco::find($idEndereco);

            return response()->json([
                'status'=>'200',
                'endereco'=>$endereco,
            ]);
        } else {
            return response()->json([
                'status'=>'400',
                'message'=>'O endereco não existe',
            ]);
        }
    }

    public function deleteEndereco($idEndereco)
    {
        if(Endereco::where('idEndereco', $idEndereco)->exists())
        {
            $endereco = Endereco::find($idEndereco);
            $endereco->statusEndereco = 0;
            $endereco->save();

            return response()->json([
                'status'=>'200',
                'message'=>'O endereco foi deletado com sucesso',
            ]);
        } else {
            return response()->json([
                'status'=>'400',
                'message'=>'O endereco não existe',
            ]);
        }
    }
}
