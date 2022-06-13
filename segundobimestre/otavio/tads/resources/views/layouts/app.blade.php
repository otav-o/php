<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TADS</title>
</head>
<body>
  <div class="container">
    <h1>@yield('title')</h1>
    @yield('content')
    <!-- significa que o blade vai colocar aqui o que eu definir como content. Definição do espaço -->
    <!-- trata-se da montagem do template -->
  </div>
  <footer>
    @yield('footer')
  </footer>
</body>
</html>