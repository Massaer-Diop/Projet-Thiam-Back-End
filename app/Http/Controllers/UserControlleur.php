<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserControlleur extends Controller
{
    public function register(Request $request)
    {
        $donnnes = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string'
        ]);
        $user = User::create([
            'name' => $donnnes['name'],
            'email' => $donnnes['email'],
            'password' => bcrypt($donnnes['password']),
        ]);
        return response()->json([
            'user'=>$user
        ], 200);
    }

    // public function logout(Request $request)
    // {
    //     $token = $request->user()->token();
    //     $token->revoke();
    //     return [
    //         'message' => 'Logged out'
    //     ];
    // }

    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|max:255',
            'password'=>'required'
        ]);
        $login = $request->only('email', 'password');
        if(!Auth::attempt($login))
        {
            return response(['message' => 'Invalid login'], 401);
        };
        /**
         * 
         * @var User $user
         */
        $user= Auth::user();
        return response([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at
        ], 200);

        // $user=User::where('email',$request->email)->first();
        // if(Hash::check($request->password,$user->password)){
        //     $token = $user->createToken('user Password Grand Client')->accessToken;
        //     return response()->json([
        //         'token'=>$token,
        //         'user'=>$user

        //     ],200);
        // }
        // else{
        //     return response()->json([
        //         'message'=>'email  ou mot de passe incorrect',
        //     ],422);
        // }

        
    }

    /* Search for number identity
    *
    * @param  string  $name
    * @return \Illuminate\Http\Response
    */
   public function searchEmail($name)
   {
       return  User::where('email', $name)->first();
   }

   /* Search for number identity
    *
    * @param  string  $name
    * @return \Illuminate\Http\Response
    */
    public function searchPWD($name)
    {
        return  User::where('password', $name)->first();
    }
}
