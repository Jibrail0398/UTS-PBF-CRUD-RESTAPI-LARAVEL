<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; //library untuk memvalidasi inputan
use App\Models\Categories; //memanggil model Category

class categoriesController extends Controller
{
    public function read(){
        $categories = Categories::all();
        return response()->json($categories)->setStatusCode(200);
    }
    public function create(Request $request){
        //Melakukan validasi inputan
        $validator = Validator::make($request->all(),['name' => 'required|max:255|string']);

        //Apabila inputan salah
        if($validator->fails()){
            return response()->json($validator->messages())->setStatusCode(422);
        }   
        //inputan yang sudah benar
        $validated = $validator->validate();


        //Apabila Kategori sudah ada
        $oldCategories = Categories::where('name',$validated['name'])->first();
        
        if($oldCategories){
            return response()->json('Kategori sudah ada')->setStatusCode(422);
        }
        // input ke tabel categories 
        Categories::create([
            'name' => $validated['name']
        ]);
        return response()->json('Kategori berhasil disimpan')->setStatusCode(201);
    }

    public function update(Request $request,$id){
        //Melakukan validasi inputan
        $validator = Validator::make($request->all(),['name' => 'required|max:255|string']);
        //Apabila inputan salah
        if($validator->fails()){
            return response()->json($validator->messages())->setStatusCode(422);
        }

        //Pencarian by ID
        $Category = Categories::find($id);


        if($Category){
            
            $Category->update($validator->validated());
            return response()->json('Kategori berhasil diubah')->setStatusCode(201);
        }
        return response()->json('Data kategori tidak ditemukan')->setStatusCode(404);        
    }
    public function delete($id){

        //cari id yang akan di delete
        $checkData = Categories::find($id);

        //kondisi jika datanya ada
        if($checkData){
            //Code untuk hapus
            Categories::where('id', $id)->delete();

            return response()->json('Kategori berhasil dihapus')->setStatusCode(200);
        }
        return response()->json('Data kategori tidak ditemukan')->setStatusCode(404);
    }
}
