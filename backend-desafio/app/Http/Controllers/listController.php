<?php

namespace App\Http\Controllers;

use App\Models\Listdata;
use Illuminate\Http\Request;

class listController extends Controller
{
    // funcao para exibir lista
    public function listagem(Request $request){
        
        $ListUser = Listdata::all();
        
        return response()->json($ListUser);
    }

    // funcao responsavel por adicionar os dados    
    public function adicionar (Request $request){
        
        $newUser = new Listdata();
        $newUser->nome = $request->name;
        $newUser->descricao = $request->descricao;
        $newUser->modal = $request->modal; 
        $newUser->valor = $request->valor;
        $newUser->save();

        return response()->json('success');
    }

    //Editar usuario em especidfico
    public function editar(ListUser $user, Request $request){

        return response()->json($user);
    }    
    
    //pegar dados do view e add no banco
    public function update(ListUser $user, Ruequest $request){
        $user->name = $request->name;
        $user->descricao = $request->descricao;
        $user->marca = $request->marca;
        $user->valor = $request->valor;
        $user->save();

        return response()->json('success');
    }

    //delte
    public function delete(ListUser $user, Ruequest $request){
        
        $ladata->delete();

        return response()->json('success');
    }

}
