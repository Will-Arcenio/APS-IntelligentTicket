<?php

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="skins/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="skins/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="skins/css/estilo.css">
    <title>Login | Intelligent Ticket</title>
</head>
<body class="login-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12 login-box">
                <form action="login_DB.php" method="POST" class="login-form">
                    <label for="login" class="label-login">Login:</label>
                    <input type="text" name="login" id="login" size="50" required="required" class="campo">

                    <br>
                    <br>
                    
                    <label for="senha" class="label-senha">Senha:</label>
                    <input type="password" name="senha" id="senha" size="40" required="required" class="campo">

                    <br>
                    <br>

                    <div class="botao-div">
                        <button type="submit" name="enviar" class="botao">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>