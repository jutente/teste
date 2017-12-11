<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;


use Illuminate\Http\Request;

use App\Servidor;

use Response;


class PesquisarController extends Controller
{
    function verificar (Request $req){

      $mat = $req->all();

      $serv = new Servidor;     

      if ($mat['matricula'] != ''){
 
        $serv = $serv->where('matricula','=',$mat['matricula'])->first();
      // dd($serv);
        if (!$serv){

         // dd($mat['matricula']);

          Session::flash('sem_matricula', 'Matricula nao encontrada.');

          return view('matricula');

        }else{
          
          if($serv->cadastrado == 1)        
            return redirect(route('home'));          
             else{
             
              return view('auth\register', compact('serv'));
             }              
        }
      }

    }
}
