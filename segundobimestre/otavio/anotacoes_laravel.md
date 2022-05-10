# Laravel
- Instalação pelo sail:
> curl -s https://laravel.build/tads | bash
  - Mas também pode instalar pelo composer (gerenciador de pacotes do PHP)

> ./vendor/bin/sail up

- Observar a estrutura de pastas: app tem 99% do código
- Resources: o que pode ser acessado pelo usuário final (views, arquivos js e css)
- Storage: logs
- Routes: padrão MVC
- Tests: testes unitários, por exemplo
- Bootstrap: inicializa alguns componentes do framework


- Arquivo .env: variáveis importantes que diferenciam o ambiente de desenvolvimento do de produção
  - Serve para não colocar as configurações do seu ambiente no código. Geralmente não se commita, cada máquina tem o seu próprio.
  - Configure aqui a porta, o nome do banco e a senha.
  - Não enviar ao entregar o trabalho.
- .gitignore não envia a pasta vendor (muito pesada, gerada pelo composer), nem o .env
- composer.json: é análogo ao package.json


- Artisan CLI: similar ao Sail, facilita bastante coisa (ex.: criar um controller) 
  - É um php CLI (não é executado no servidor, e sim na nossa própria máquina)
  > php artisan serve
  - Já starta um servidor Laravel, mas insuficiente para colocar em produção. Quando estamos com o composer
  - Sem o composer, usar o sail up (outro comando mais acima)


  Model: regras de negócio, como os dados serão persistidos, cálculos, etc.
  Controller: como vai acontecer, para onde vai, como a requisição será retornada.
  View: única que não fica dentorro de app, e sim em resources (junto com js e css)


  ---

  php artisan make:controller HelloWorldControllers
  - só facilidta o caminho, pode fazer manualmente
  - não tem como criar view pelo artisan

  dentro de resources > views: criar uma pasta chamada hellow_world e, dentro, o arquivo index.blade.php
