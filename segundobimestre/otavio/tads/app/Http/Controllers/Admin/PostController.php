<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; // responsável por tratar requisições HTTP

/**
 * Controller para administrar o formulário
 */
class PostController extends Controller
{
    /**
     * Exibe o formulário
     */
    public function create()
    {
        return view('posts.create'); // posts\create.blade.php
    }

    /**
     * Salvar o formulário (Post)
     */
    public function store(Request $request)
    {
        // var_dump($request);
        // dump and die
        // all pega todos os campos do request
        dd($request->all());
    }
}
