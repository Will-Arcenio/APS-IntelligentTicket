<?php
session_start();

if (!$_SESSION['logged_front']) {
    header('Location: login.php');
}

include('../../../../Conexao/conexao.php');
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
        <title>Informações da Conta | Bla³</title>
    </head>
    <body>
    <?php 
        # CABEÇALHO
        include('header.php');
    ?>
    <div class="container content">
        <?php
        #var_dump($_SESSION['logged_front']);
        ?>
        <div class="row">
            <div class="col-md-3 tabs-options">
                <ul class="dashboard-options">
                    <li class="first-dash-item"><a href="cliente_account.php">Informações da Conta</a></li>
                    <li class="last-dash-item"><a href="cliente_orders.php">Meus Pedidos</a></li>
                </ul>
            </div>
            <div class="col-md-9 ultimos-pedidos">
                <div class="row">
                    <div class="dash-hello-user col-md-10">
                        <h3 class="dash-title">Informações de Conta</h3>
                    </div>
                    <div class="dash-logout-user col-md-2">
                        <a href="logout.php"><i class="icon-exit" title="Desconectar"></i></a>
                    </div>
                </div>

            <?php
            # SQL para pegar os últimos pedidos do Cliente
            $sqlAccInfo = "SELECT * FROM clientes WHERE id = '{$_SESSION['logged_front']['user_id']}'";
            #var_dump($sqlAccInfo);
            
            $queryAccInfo = mysqli_query($conexao, $sqlAccInfo);
            
            if (!$queryAccInfo) {
                echo 'Não há dados para exibir.';
            } else {
                $cliente = mysqli_fetch_array($queryAccInfo, MYSQLI_ASSOC);
            ?>
                <form action="../../../../model/frontend/account_edit_DB.php" method="POST" class="dashboard-account-form">
                    <div class="row">
                        <!-- <div class="col-md-2">
                            <label for="id">Código</label>
                            <input type="text" name="id" id="id" readonly="true" class="campo" required="required">
                        </div> -->
                        <div class="col-md-6">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" id="nome" required="required" class="campo" value="<?php echo $cliente['nome'] ?>" onchange="formataCPF()">
                        </div>
                        <div class="col-md-6">
                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" id="cpf"  maxlength="14" minlength="14" required="required" class="campo" value="<?php echo $cliente['cpf'] ?>">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="endereco">Endereço</label>
                            <input type="text" name="endereco" endereco="endereco" class="campo" required="required" value="<?php echo $cliente['endereco'] ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="telefone">Telefone</label>
                            <input type="text" name="telefone" id="telefone" required="required" maxlength="14" class="campo" value="<?php echo $cliente['telefone'] ?>">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="email">E-mail</label>
                            <input type="text" name="email" email="email" class="campo" required="required" value="<?php echo $cliente['email'] ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="senha">Senha</label>
                            <input type="password" name="senha" id="senha" size="50" class="campo">
                        </div>
                    </div>     
                    <br>   
                    <br>          
                    <div class="botao-div">
                        <button type="submit" name="criar_conta" class="botao">Atualizar Dados</button>
                    </div>
                </form>
            <?php
            }
            ?>
            </div>
        </div>
    </div>
    <script>
        function formataCPF(){
        var cpf = "00000000000";

        return console.log(formataCPF(cpf));

        //retira os caracteres indesejados...
        cpf = cpf.replace(/[^\d]/g, "");

        //realizar a formatação...
            return cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");
        }
    </script>
</body>
<?php 
    # FOOTER
    include('footer.php');
?>
</html>