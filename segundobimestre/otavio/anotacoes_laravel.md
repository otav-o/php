# Laravel
- Instalação pelo sail:
> curl -s https://laravel.build/tads | bash
  - Mas também pode instalar pelo composer (gerenciador de pacotes do PHP)

> ./vendor/bin/sail up

### Estrutura de pastas

- /app tem 99% do código
- Resources: o que pode ser acessado pelo usuário final (views, arquivos js e css)
- Storage: logs
- Routes: lembrar do padrão MVC
- Tests: testes unitários, por exemplo
- Bootstrap: inicializa alguns componentes do framework
- Arquivo .env: variáveis importantes que diferenciam o ambiente de desenvolvimento do de produção

  - Serve para não colocar as configurações do seu ambiente no código. Geralmente não se commita, cada máquina tem o seu próprio.

  - Configure aqui a porta, o nome do banco e a senha.

  - Não enviar ao entregar o trabalho!


- .gitignore não envia a pasta vendor (muito pesada, gerada pelo composer), nem o .env

  - composer.json: é análogo ao package.json
  - vendor é análoga ao node_modules

### Artisan CLI


- Artisan CLI: similar ao Sail, facilita bastante coisa (ex.: criar um controller) 
  - É um php CLI (não é executado no servidor, e sim na nossa própria máquina)

> php artisan serve
- Já starta um servidor Laravel, mas insuficiente para colocar em produção. Usado quando estamos com o composer.

  - Sem o composer, usar o sail up

  - > ./vendor/bin/sail up

### Padrão MVC - relembrando

1. **Model**: regras de negócio, como os dados serão persistidos, cálculos, etc.
2. **Controller**: como vai acontecer, para onde vai, como a requisição será retornada.
3. **View**: única que *não fica dentro de /app*, e sim em resources (junto com js e css)

### Criando o primeiro controller

- > php artisan make:controller HelloWorldControllers

  - só facilita o caminho, lembre-se que pode fazer manualmente
  - não tem como criar view pelo artisan

- dentro de resources > views: criar uma pasta chamada hello_world e, dentro, o arquivo index.blade.php

- Usaremos somente o routes/web.php, e não os outros arquivos desta pasta, pois faremos apenas aplicações web.

- `Route::get($route, $callback);`

- $callback: função que será chamada quando esta rota for executada.


- > php artisan route:list

- Rotas e seus verbos (get, post, put, patch, delete, options)

  - ```php
    // rota, nomeController@metodo
    Route::get('hello-world', [HelloWorldController::class], 'index');
    // Rota hello-world que acessa o método index da HelloWorldController
    
    Route::post('hello-world', []);
    ```

- Para uma rota que executa a mesma coisa para mais de um verbo: **match**.

  - ```php
    Route::match(['post', 'get'], 'teste-rota', function () {
        echo "Entrou na rota com match";
    });
    ```


- Quando vai executar a mesma coisa para qualquer verbo naquela rota: **any.**

  - ```php
    Route::any('teste-any', function () {
        echo "Esta rota é indiferente ao verbo HTTP";
    });
    ```


- Sem precisar criar um controller, usando a função de callback para exibir uma view [conferir].

  - ```php
    Route::view('boas-vindas', 'hello-world.index');
    ```


- **Receber parâmetro** da url pela função de callback: usar o nome da variável igual
  - Visualmente melhor do que usar ?id
  
  - ```php
    Route::get('post/excluir/{id}', function ($id) {
        return $id;
    });
    
    Route::get('post/excluir2/{id}', [HelloWorldController::class, 'retornaId']);
    
    Route::get('post/{excluir?}', [HelloWorldController::class, 'retornaId2']);
    ```
  
  - Usar regex nas rotas: só executa se o parâmetro for compatível, caso contrário dá um 404 not found
  
  - ```php
    Route::get('post/{id}', [HelloWorldController::class, 'retornaId'])->where(['id' => '[0-9]+']);
    ```

- **Nicknames** para as rotas: servem para não ter que atualizar as referências toda vez que uma rota for modificada.
  
  - Basta colocar ->name('alias-da-rota')
  
  - ```php
    Route::get('ola', [HelloWorldController::class, 'index'])->name('ola-nome');
    ```

  - ```php+HTML
    <body>
        <h1> O HelloWorldController chamou esta view</h1>
        <p><a href="/hello-world">Home com url fixa</a></p>
        <p><a href="{{route('ola-nome')}}">Home usando o nome da rota</a></p>
    </body>
    ```
- **Prefixos** (`Route::prefix(path)->group()`): todas as uris abaixo começarão com 'avisos'.

  - Passar para uma função anônima todas as rotas que terão o prefixo.

  - ```php
    Route::prefix('avisos')->group(function () {
        Route::get('/', function () {
            echo "index";
        });
    
        Route::put('criar', function () {
            echo "criar";
        });
    
        Route::get('exibr', function () {
            echo "exibr";
        });
    
        Route::delete('apagar', function () {
            echo "apagar";
        });
    });
    ```

    
