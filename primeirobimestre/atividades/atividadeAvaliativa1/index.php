<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>

</head>

<body style="padding: 50px;">
    <header>
        <h1 class="h1">Cadastro de pessoa</h1>
    </header>

    <main>
        <form method="POST" action="valores.php">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Email" name="email">
            </div>
            <div class="mb-3">
                <label for="endereco" class="form-label">Endereço</label>
                <textarea class="form-control" id="endereco" rows="3" name="endereco"></textarea>
            </div>

            <select name="ocupacao" class="form-select" aria-label="Selecione seu cargo">

                <option selected>Profissão</option>
                <?php
                $profissoes = ["Engenheiro de Software", "Analista de Segurança da Informação", "Analista de Sistemas", "Administrador de Sistemas", "Administrador de banco de dados (DBA)", "Gestor de Tecologias da Informação", "Arquiteto de Redes", "Desenvolvedor"];

                for ($i = 0; $i < count($profissoes); $i += 1)
                    echo "<option value='$i'>$profissoes[$i]</option>";
                ?>
            </select>
            <br>
            <select name="genero" id="genero" class="form-select">
                <option selected>Gênero</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
                <option value="Prefiro não informar">Prefiro não informar</option>
                <option value="Outro">Outro</option>
            </select>
            <br>
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                <p>Área de interesse</p>
                <?php
                $areasDeInteresse = ["Banco de Dados", "Engenharia de Software", "Redes de Computadores", "Desenvolvimento de Jogos", "Programação back-end", "Programação front-end", "Mineração de Dados"];

                for ($i = 0; $i < count($areasDeInteresse); $i += 1) {
                    echo "<input type='checkbox' class='btn-check' id='$areasDeInteresse[$i]' autocomplete='off'>";
                    echo "<label class='btn btn-outline-primary' for='$areasDeInteresse[$i]'>$areasDeInteresse[$i]</label>";
                }
                ?>
            </div>

            <h3 class="h3">Fale conosco</h3>
            <div class="mb-3">
                <label for="mensagem" class="form-label">Mensagem</label>
                <textarea name="mensagem" class="form-control" id="mensagem" rows="3"></textarea>
            </div>

            Deseja receber nossas promoções?
            <div class="form-check">
                <input class="form-check-input" type="radio" name="promocoes" id="simPromocoes">
                <label class="form-check-label" for="simPromocoes">
                    Sim
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="promocoes" id="naoPromocoes" checked>
                <label class="form-check-label" for="naoPromocoes">
                    Não
                </label>
            </div>


            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Senha</span>
                <input name="senha" type="password" class="form-control" aria-label="Senha" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Confirmar</span>
                <input name="confirmacaoSenha" type="password" class="form-control" aria-label="Senha" aria-describedby="inputGroup-sizing-default">
            </div>

            <input type="submit" class="btn btn-success" value="Enviar">

        </form>


    </main>
    <footer>

        <small>Primeira atividade avaliativa de TADS - Otávio Dioscânio 15/03/2022</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>