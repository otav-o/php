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
}
