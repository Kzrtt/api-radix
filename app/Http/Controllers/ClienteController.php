<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Vendedor;
use App\Models\tblVendedorFav;

class ClienteController extends Controller
{
    public function addCliente(Request $request)
    {
        $cliente = New Cliente();

        $cliente->nomeCliente = $request->nomeCliente;
        $cliente->cpfCliente = $request->cpfCliente;
        $cliente->emailCliente = $request->emailCliente;
        $cliente->senhaCliente = $request->senhaCliente;
        $cliente->statusCliente = $request->statusCliente;

        $result = $cliente->save();

        if($result)
        {
            return response()->json([
                'status'=>'200',
                'message'=>'Cliente inserido com sucesso',
            ]);
        } else {
            return response()->json([
                'status'=>'400',
                'message'=>'Falha ao inserir o cliente',
            ]); 
        }
         
    }

    public function updateCliente(Request $request, $idCliente)
    {
        if(Cliente::where('idCliente', $idCliente)->exists())
        {
            $cliente = Cliente::find($idCliente);

            $cliente->nomeCliente = $request->nomeCliente;
            $cliente->cpfCliente = $request->cpfCliente;
            $cliente->emailCliente = $request->emailCliente;
            $cliente->senhaCliente = $request->senhaCliente;
            $cliente->statusCliente = $request->statusCliente;

            $cliente->save();

            return response()->json([
                'status'=>'200',
                'message'=>'Cliente atualizado com sucesso',
            ]);
        } else {
            return response()->json([
                'status'=>'400',
                'message'=>'Cliente não existe',
            ]);
        }
    }

    public function getAllClientes()
    {
        $cliente = Cliente::all();

        if(isset($cliente))
        {
            return response()->json([
                'status'=>'200',
                'clientes'=>$cliente,
            ]);
        } else {
            return response()->json([
                'status'=>'400',
                'message'=>'Falha ao retornar os clientes',
            ]);
        }
    }

    public function getCliente($idCliente)
    {   
        if(Cliente::where('idCliente', $idCliente)->exists())
        {
            $cliente = Cliente::find($idCliente);

            return response()->json([
                'status'=>'200',
                'cliente'=>$cliente,
            ]);
        } else {
            return response()->json([
                'status'=>'400',
                'message'=>'O cliente não existe',
            ]);
        }
    }

    public function deleteCliente($idCliente)
    {
        if(Cliente::where('idCliente', $idCliente)->exists())
        {
            $cliente = Cliente::find($idCliente);
            $cliente->statusCliente = 0;
            $cliente->save();

            return response()->json([
                'status'=>'200',
                'message'=>'O cliente foi deletado com sucesso',
            ]);
        } else {
            return response()->json([
                'status'=>'400',
                'message'=>'O cliente não existe',
            ]);
        }
    }

    public function loginCliente($email, $senha)
    {
        $user = Cliente::where('emailCliente', $email)->first();

        if($user)
        {

            if($user->senhaCliente == $senha)
            {
                return response()->json([
                    'status'=>'200',
                    'loginResult'=>'1',
                    'user'=>$user,
                ]);
            } else {
                return response()->json([
                    'status'=>'400',
                    'loginResult'=>'Senha incorreta',
                ]); 
            }

        } else {
            return response()->json([
                'status'=>'400',
                'loginResult'=>'O email não existe, ou está errado',
            ]); 
        }
    }

    public function addIsFavorite(Request $request)
    {
        $isFavorite = New TblVendedorFav();

        $isFavorite->idCliente = $request->idCliente;
        $isFavorite->idVendedor = $request->idVendedor;

        $result = $isFavorite->save();

        if($result)
        {
            return response()->json([
                'status'=>'200',
                'message'=>'isFav inserido com sucesso',
            ]);
        } else {
            return response()->json([
                'status'=>'400',
                'message'=>'Falha ao inserir o isFav',
            ]); 
        }
        
    }

    public function getIsFavorite($idCliente, $idVendedor)
    {
        if(TblVendedorFav::where(['idCliente', '=', $idCliente], ['idVendedor', '=', $idVendedor])->exists())
        {
            $isFavorite = TblVendedorFav::where(['idCliente', '=', $idCliente], ['idVendedor', '=', $idVendedor]);
            
            return response()->json([
                'status'=>'200',
                'isFavorite'=>$isFavorite,
            ]);
        } else {
            return response()->json([
                'status'=>'400',
                'message'=>'não existe ainda',
            ]);
        }
    }

    public function isFavoriteToTrue($idIsFav)
    {
        if(TblVendedorFav::where('idVendedorFav', $idIsFav)->exists()){

            $isFavorite = TblVendedorFav::find($idIsFav);
            $isFavorite->isFavorite = 1;
            $isFavorite->save();
        }
    }

    public function isFavoriteToFalse($idIsFav)
    {
        if(TblVendedorFav::where('idVendedorFav', $idIsFav)->exists()){

            $isFavorite = TblVendedorFav::find($idIsFav);
            $isFavorite->isFavorite = 0;
            $isFavorite->save();
        }
    }
}

