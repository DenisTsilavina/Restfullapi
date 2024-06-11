<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class UserController extends Controller
{
    public function index(){
        $user= User::all();
        return response()->json($user);
    }
    public function Store(Request $request){
        $user = new User();
        $user -> name=$request->name;
        $user-> email= $request-> email;
        $user-> password= $request-> password;
        $user->save();
        
        return response()->json([
            "message"=> "Ajouter User"
        ], 201);
    }
    public function show($id){
        $user=User::find($id);
        if (!empty($user))
        {
            return response()->json($user);
        }else{
            return response()-> json([
                "message"=>"user n'existe pas"
            ], 404);
        }
    }
    public function update( Request $request, $id)
    {
        if( User::where('id',$id)->exist()){
            $user= User::find($id);
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=$request->password;

            $user ->save();

            return response()->json([
                "message"=>"User update "
            ],404);
        }
        else{
            return response()->json([
                "message"=>"User n'existe pas "
            ],404);
        }
    }

    public function destroy($id) {
        if( User::where('id',$id)->exist()){
            $user=User::find($id);
            $user->delete();
            return response()->json([
                "message"=>"User supprimer avec success "
            ],202);
        }
        else{
            return response()->json([
                "message"=>"User n'existe pas "
            ],404);
        }
        
    }
}
