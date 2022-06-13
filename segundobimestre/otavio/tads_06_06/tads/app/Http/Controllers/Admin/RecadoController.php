<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecadoController extends Controller
{
    public function create()
    {
     return view('recados.create');
    }

    public function store(Request $request)
    {
        if (empty($request->nome) || empty($request->cidade) || empty($request->email) || empty($request->recado)){
            return back()->withInput();
        }else{
            dd($request->all());
        }
    }
}
