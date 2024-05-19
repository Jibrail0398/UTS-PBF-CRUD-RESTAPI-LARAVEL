<?php

namespace App\Http\Controllers;


use App\Models\User;// panggil model user
use Illuminate\Support\Facades\Validator; //panggil library untuk memvalidasi inputan
use Illuminate\Http\Request;



class registerController extends Controller
{
    //fitur untuk registrasi akun
    public function register(Request $request){
        //Validasi inputan
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8'
        ]);
        if($validator->fails()){
            return response()->json($validator->messages(),422);
        }
        
        //create user ke tabel users
        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password)
        ]);
        //Jika registrasi berhasil
        if($user) {
            return response()->json('Registrasi berhasil')->setStatusCode(201);
        }
        //Jika registrasi gagal
        return response()->json('Registrasi gagal')->setStatusCode(409);
    }
}
