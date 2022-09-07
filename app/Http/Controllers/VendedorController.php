<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendedor;

class VendedorController extends Controller
{
    public function getVendedor($idVendedor)
    {
        if(Vendedor::where('idVendedor', $idVendedor)->exists())
        {
            $vendedor = Vendedor::find($idVendedor);

            return response()->json([
                'status'=>'200',
                'vendedor'=>$vendedor,
            ]);
        } else {
            return response()->json([
                'status'=>'400',
                'message'=>'vendedor não existe',
            ]);
        }
    }

    public function getAllVendedores() {
        $vendedor = Vendedor::all();

        if(isset($vendedor))
        {
            return response()->json([
                'status'=>'200',
                'vendedores'=>$vendedor,
            ]);
        } else {
            return response()->json([
                'status'=>'400',
                'message'=>'Falha ao retornar os vendedores',
            ]);
        }
    }
}
