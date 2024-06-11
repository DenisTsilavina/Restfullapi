<?php
namespace App\Traits;

use GuzzleHttp\Psr7\Message;

trait HttpResponses 
{
    protected function success($data,$message=null,$code=200){
        return response()->json([
            'status'=> 'requete succesfull',
            'message'=>$message,
            'data'=>$data

        ], $code
            
    );
    }
    protected function frame($data,$message=null,$code=200){
        return response()->json([
            'status'=> 'requete succesfull',
            'message'=>$message,
            'data'=>$data

        ], $code
            
    );
    }
}
