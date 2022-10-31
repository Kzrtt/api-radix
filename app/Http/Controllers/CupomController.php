<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cumpom;
use App\Models\CupomCliente;
use Illuminate\Support\Carbon;

class CupomController extends Controller
{
    public function getAllCupons()
    {
        $cupom = Cumpom::all();

        if(isset($cupom))
        {
            return response()->json([
                'status'=>'200',
                'cupons'=>$cupom,
            ]);
        } else {
            return response()->json([
                'status'=>'400',
                'message'=>'Falha ao retornar os cupons',
            ]);
        }
    }

    public function getCuponsCliente($idCliente) 
    {
        if(CupomCliente::where('idCliente', $idCliente)->exists())
        {   
            $allCupons = Cumpom::all(); 
            $cuponsCliente = CupomCliente::all();
            $filtered = $cuponsCliente->filter(function ($value, $key) use ($idCliente) {
                return $value->idCliente == $idCliente;
            })->values()->all();

            $myTime = now(); 

            return response()->json([
                'status'=>'200',
                'cupons'=>$filtered,
                'allCupons'=> $allCupons,
            ]);

        } else {
            return response()->json([
                'status'=>'400',
                'message'=>'esse cliente não tem cupons',
            ]);
        }
    }
}
