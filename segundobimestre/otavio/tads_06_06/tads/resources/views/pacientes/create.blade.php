<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar pacientes</title>
</head>
<body>
    <form action="{{route('pacientes.store')}}" method="post">
            @csrf
            <p>
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome">
            </p>
            <p>
                <label for="endereco">Endereço:</label>
                <input type="text" name="endereco" id="endereco">
            </p>
            <p>
                <label for="cpf">CPF:</label>
                <input type="number" name="cpf" id="cpf">
        </p>
        <p>
            <label for="sexo">Sexo:</label>
            <input type="text" name="sexo" id="sexo">
        </p>
        <p>
            <label for="escolaridade">Escolaridade:</label>
            <input type="text" name="escolaridade" id="escolaridade">
        </p>
        <p>
            <label for="email">Email:</label>
            <input type="text" name="email" id="email">
        </p>
        <p>
            <label for="nascimento">Nascimento:</label>
            <input type="text" name="nascimento" id="nascimento">
        </p>
        <p>
            <label for="telefone">Telefone:</label>
            <input type="text" name="telefone" id="telefone">
        </p>
        <p>
            <label for="user_id">Usuario:</label>
            <input type="number" name="user_id" id="user_id">
        </p>
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>