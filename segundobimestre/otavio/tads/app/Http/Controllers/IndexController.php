<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke() // Single Action Controller - apenas o método __invoke()
    {
        // nome_pasta.arquivo
        // ['nome_da_variavel' => 'valor'] - passa para a view
        return view('hello_world.index', ['nome' => 'Joãozinho']);
    }
}
