<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastrar post</title>
</head>

<body>
  <form action="{{route('posts.store')}}?armazena=true" method="post">
    <!-- armazena=true é enviar algo via get. Chega ne request pelo $request->query() -->
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

</html>