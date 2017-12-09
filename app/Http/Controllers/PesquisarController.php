<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

use App\Servidor;


class PesquisarController extends Controller
{
    function verificar (Request $req){

      $mat = $req->all();

      $serv = new Servidor;     

      if ($mat['matricula'] != ''){
 
        $serv = $serv->where('matricula','=',$mat['matricula'])->first();
       
        if (!$serv){

         // dd($mat['matricula']);

          Session::flash('sem_matricula', 'Matricula nao encontrada.');

          return view('matricula');

        }else{

          return redirect(route('home'));
        }
      }

      

    }
}
