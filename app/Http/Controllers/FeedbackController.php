<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function addFeedback(Request $request)
    {
        $feedback = New Feedback();
        
        $feedback->nome = $request->nome;
        $feedback->feedback = $request->feedback;
        $result = $feedback->save();

        if($result)
        {
            return response()->json([
                'status'=>'200',
                'message'=>'Feedback inserido com sucesso',
            ]);
        } else {
            return response()->json([
                'status'=>'400',
                'message'=>'Falha ao inserir o feedback',
            ]); 
        }
    }
}
