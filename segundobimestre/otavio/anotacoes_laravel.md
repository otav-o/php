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
  
  - Basta colocar -> name('alias-da-rota')
  
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


### Resource Controller

- Controller como recurso

  - Alguns controllers existem apenas para CRUD

- >  php artisan make:controller UserController --resource

  - com o --resource, já cria os métodos do crud (index, create, store, show, edit, update, destroy)

  - Outra diferença: colocar uma rota específica para o resource

  - ```php
    Route::resource('/user', UserController::class); // web.php
    ```

### Single Action Controllers

- Método mágico invoke()

  - Todos os métodos mágicos começam com `__`

- Não precisa chamar o método quando registrar a rota

  - ```php
    Route::get('/', IndexController::class)
    ```

### Criação de um formulário

- Observe que é um formulário como qualquer outro, com a diferença de ter um `echo csrf_field()` ou `@csrf` para permitir o método POST e de existir uma rota no action.

  - A rota é criada no routes\web.php, e pode ser feita assim:

    - ```php
      Route::prefix('admin')->namespace('admin')->group(function () {
          Route::prefix('posts')->name('posts.')->group(function () {
              Route::get('/create', [PostController::class, 'create'])->name('create');
              Route::post('/store', [PostController::class, 'store'])->name('store');
          });
      });
      ```

    - Significa que há o grupo/prefixo admin na URI. Dentro dele, há outro grupo posts. Este é nomeado com `posts.` e possuem duas rotas: create e store. A primeira chama o método create do PostController e tem o nome create.

    - Lembrando da importância dos nomes: se a rota e o prefixo mudarem, só precisa alterar neste ponto do código, pois os nomes vão referenciar as novas rotas automaticamente (para links)

  - ```php+HTML
    <body>
        <form action="{{route('posts.store')}}" method="post">
            <!-- cria um token para não ser rejeitado (cross validation) -->
            @csrf
            <!-- ou -->
            <?php echo csrf_field() ?>
            <div class="form-group">
                <label for="title">Título:</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Descrição:</label>
                <input type="text" name="description" id="description" class="form-control">
            </div>
            <div class="form-group">
                <label for="content">Conteúdo</label>
                <textarea name="content" id="content" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="slug">Slug:</label>
                <input type="text" name="slug" id="slug" class="form-control">
            </div>
            <button class="btn btn-lg btn-success">Criar postagem</button>
        </form>
    </body>
    ```

- Observações extras: Blade é o criador de templates; Os controllers ficam em App -> http -> controllers; CSRF - Cross Validation é um recurso de segurança.


> php artisan migrate:install
  - Executa o que está no up

> php artisan migrate:rollback 
  - Executa o que está no down
  - Desfaz a última migração feita.

> php artisan make:migration create_table_posts --create=posts
  - as migrações têm a data e o timestamp no nome
  - $table->timestamps() no método u cria duas colunas: created_at e updated_at. Serve para controle dos registros.

> php artisan migrate
  - Executa a mnigração


---
24/05/2022

### Eloquent
- ORM do Laravel
- Criar o model com o nome da tabela só que em singular.
  - Se não for seguir o padrão, usar `protected $table = 'post';`

```php
// Na PostController
public function index() {
    dd(Post::all()); // dump and die
}


```



> 06/06/2022, segunda