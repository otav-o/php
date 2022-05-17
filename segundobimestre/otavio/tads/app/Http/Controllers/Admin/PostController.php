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
        dd($request->title);
        dd($request->input('title'));
        dd($request->descricao);
        dd($request->input('description'));

        if ($request->has('title')) {
            echo $request->title;
            dd($request->title);
            // imprime mesmo se estiver null. Não lida com o vazio, apenas analisa se existe o campo
        }

        if ($request->hasAny(['title', 'content', 'slug'])) {
            // o mesmo que o de cima, mas verifica mais de um por vez.
        }

        $request->only();
        $request->except();

        if ($request->only(['title', 'slug'])) {

        }

        if ($request->has('title')) {
            dd($request->query('armazena'));
            // query() retorna null se o parâmetro não veio por GET, e sim POST
        }

        // api que retorna mensagem
        return response('Retorno do request', 200);

        // api que retorna json

        // é possível passar um cookie e sua validade
        return response('Retorno do tipo json', 200)->cookie()

        // Após realizar as ações, pode redirecionar para uma página
        return redirect('/')

        return redirect()->route('home')
    }
}
