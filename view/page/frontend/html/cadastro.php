
<!DOCTYPE html>
<html lang="pt-BR">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../../../../skins/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../../../skins/css/bootstrap-theme.min.css">
        <script src="../../../../js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../../../../skins/css/estilo.css">
        <link rel="stylesheet" href="../../../../skins/css/style.css">
        <title>Cadastre-se | Bla³</title>
</head>
<body>
    <?php 
        # CABEÇALHO
        include('header.php');
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 login-box">
                <div class="page-title text-center">
                    <h3>Cadastre-se na Bla³</h3>
                </div>
                <form action="../../../../model/frontend/cadastro_DB.php" method="POST" class="login-form">
                    <div class="row">
                        <!-- <div class="col-md-2">
                            <label for="id">Código</label>
                            <input type="text" name="id" id="id" readonly="true" class="campo" required="required">
                        </div> -->
                        <div class="col-md-6">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" id="nome" required="required" class="campo">
                        </div>
                        <div class="col-md-6">
                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" id="cpf"  maxlength="14" minlength="14" required="required" class="campo">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="endereco">Endereço</label>
                            <input type="text" name="endereco" endereco="endereco" class="campo" required="required">
                        </div>
                        <div class="col-md-6">
                            <label for="telefone">Telefone</label>
                            <input type="text" name="telefone" id="telefone" required="required" class="campo">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="email">E-mail</label>
                            <input type="text" name="email" email="email" class="campo" required="required">
                        </div>
                        <div class="col-md-6">
                            <label for="senha">Senha</label>
                            <input type="password" name="senha" id="senha" size="50" required="required" class="campo">
                        </div>
                    </div>     
                    <br>   
                    <br>          
                    <div class="botao-div">
                        <button type="submit" name="criar_conta" class="botao">Criar Conta</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php mysqli_close($conexao); ?>