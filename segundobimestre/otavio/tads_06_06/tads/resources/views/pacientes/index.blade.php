<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pacientes</title>
</head>
<body>
    <table>
        <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>Usuario</th>
            <th>Alterar</th>
            <th>Excluir</th>
        </tr>
        <?php
            foreach ($pacientes as $paciente) :
        ?>
        <tr>
            <td>{{$paciente->nome}}</td>
            <td>{{$paciente->cpf}}</td>
            <td>{{$paciente->user_id}}</td>
            <td>
                <form action="{{route('pacientes.edit',['paciente' => $paciente->id])}}" method="get">
                    <input type="submit" value="Alterar">
                </form>
            </td>
            <td>
                <form action="{{route('pacientes.destroy',['paciente' => $paciente->id])}}" method="post">
                    @method('DELETE')
                    @csrf
                    <input type="submit" value="Excluir">
                </form>
            </td>
        </tr>
        <?php 
            endforeach;
        ?>
    </table>
    
</body>
</html>