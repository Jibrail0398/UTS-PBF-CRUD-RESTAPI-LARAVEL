<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;//Panggil Library JWT
use Firebase\JWT\Key;//Panggil Library JWT Key

class userMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // //Ambil Bearer Token
        // $jwt = $request->bearerToken();
        
        // //Kondisi jika token kosong
        // if($jwt == 'null' || $jwt == ''){
        //     return response()->json(
        //         [
        //             'messages'=>'Token kosong'
        //         ],401);
        // }else{//Kondisi jika token tidak kosong

        //     //decrypt token
        //     $decoded = JWT::decode($jwt, new KEY(env('JWT_SECRET_KEY'),'HS256'));
        //     return $next($request);
        // }

        $jwt = $request->bearerToken();
        
        if ($jwt == 'null' || $jwt == '') {
            return response()->json(['messages' => 'Token kosong'], 401);
        }
        
        try {
            $decoded = JWT::decode($jwt, new KEY(env('JWT_SECRET_KEY'), 'HS256'));
            
            if (in_array($decoded->role, $roles)) {
                return $next($request);
            }
            
            return response()->json(['messages' => 'Anda tidak memiliki hak akses'], 401);
        } catch (Exception $e) {
            return response()->json(['messages' => 'Token tidak valid'], 401);
        }

    }
}
// <?php

// namespace App\Http\Middleware;

// use Closure;
// use Illuminate\Http\Request;
// use Firebase\JWT\JWT;//Panggil Library JWT
// use Firebase\JWT\Key;//Panggil Library JWT Key

// class userMiddleware
// {
//     /**
//      * Handle an incoming request.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
//      * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
//      */
//     public function handle(Request $request, Closure $next)
//     {
//         //Ambil Bearer Token
//         $jwt = $request->bearerToken();
        
//         //Kondisi jika token kosong
//         if($jwt == 'null' || $jwt == ''){
//             return response()->json(
//                 [
//                     'messages'=>'Token kosong'
//                 ],401);
//         }else{//Kondisi jika token tidak kosong

//             //decrypt token
//             $decoded = JWT::decode($jwt, new KEY(env('JWT_SECRET_KEY'),'HS256'));
//             return $next($request);
//         }

//     }
// }
