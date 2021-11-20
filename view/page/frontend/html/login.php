<?php
session_start();

# Caso a sessão exista
if (@$_SESSION['logged']) {
    header('Location: cliente_dashboard.php');
}

?>

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
        <title>Login | Bla³</title>
    </head>
    <body>
    <?php 
        # CABEÇALHO
        include('header.php');
    ?>
    <div class="container">
        <div class="row">
        
            <div class="col-md-12 login-box">
                <div class="page-title text-center">
                    <h3>Fazer login na Bla³</h3>
                </div>
                
                <form action="../../../../model/frontend/login_DB.php" method="POST" class="login-form">
                <div class="msg-erro text-center">
                    <?php
                        if (isset($_GET['erro'])) {
                            if ($_GET['erro'] == 'userPwd') {
                    ?>
                                <span class="erro-message">E-mail ou senha inválido.</span>
                    <?php
                            }
                        }
                    ?>
                </div>
                    <label for="email" class="label-email">E-mail:</label>
                    <input type="text" name="email" id="email" size="40" required="required" class="campo">
                    <br>
                    
                    <label for="senha" class="label-senha">Senha:</label>
                    <input type="password" name="senha" id="senha" size="40" required="required" class="campo">
                    <br>

                    <div class="botao-div">
                        <button type="submit" name="enviar" class="botao">Entrar</button>
                    </div>
                </form>
                <div class="cadastro text-center col-md-12">
                    <span class="form-instructions">Não é cadastrado?</span>
                    <a href="../../frontend/html/cadastro.php" title="Criar conta" class="criar-conta"> Criar conta </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>