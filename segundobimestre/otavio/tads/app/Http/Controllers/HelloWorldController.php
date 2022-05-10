<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloWorldController extends Controller
{
    public function index()
    {
        $text = "Olá mundo";
        echo $text;
        return view('hello_world.index'); // nomeDaPasta.index
    }

    public function retornaId($id)
    {
        return $id + 1;
    }

    public function retornaId2($id = 0)
    {
        return $id + 2;
    }
}
