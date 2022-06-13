<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
       return view('hello_world.index',['nome' => 'Joãozinho']); 
    }
}
