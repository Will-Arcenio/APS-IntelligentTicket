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
        <title>Painel do Cliente | Bla³</title>
    </head>
    <body>
        <div class="dashboard-page">
        <?php 
            # CABEÇALHO
            include('header.php');
        ?>
        <div class="container content">
            <div class="row">
                <div class="msg col-md-9 col-md-offset-3">
                    <?php
                        # Mensagem de Sucesso ao Atualizar Dados
                        if (@$_SESSION['cli_info_update']) {
                    ?>
                            <span class="success-message">Dados atualizados.</span>
                    <?php
                            unset($_SESSION['cli_info_update']);
                        }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 tabs-options">
                    <ul class="dashboard-options">
                        <li class="first-dash-item"><a href="cliente_dashboard.php">Dashboard</a></li>
                        <li><a href="cliente_account.php">Informações da Conta</a></li>
                        <li class="last-dash-item"><a href="cliente_orders.php">Meus Pedidos</a></li>
                    </ul>
                </div>
                <div class="col-md-9 ultimos-pedidos">
                    <div class="row">
                        <div class="dash-hello-user col-md-10">
                            <h3 class="dash-title">Olá, <?php echo $_SESSION['logged_front']['user_name'] ?>!</h3>
                        </div>
                    </div>

                    <?php
                    # SQL para pegar os últimos pedidos do Cliente
                    $sqlGetPedidos = "SELECT *, fp.nome AS forma_pagamento FROM pedidos INNER JOIN formas_pagamento AS fp ON (fp.id = pedidos.id_formapagamento) WHERE id_cliente = '{$_SESSION['logged_front']['user_id']}' LIMIT 5";
                    
                    $queryPedidos = mysqli_query($conexao, $sqlGetPedidos);
                    
                    #var_dump($queryPedidos);
                    if ($queryPedidos->num_rows == 0) {
                        echo 'Você ainda não realizou nenhum pedido.';
                    } else {
                    ?>
                        <div class="table-title">
                            <h4>Últimos Pedidos</h4>
                        </div>
                        <div class="table-content">
                            <table class="dash-pedidos" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Nº Pedido</th>
                                        <th>Data Pedido</th>
                                        <th>Data Pagamento</th>
                                        <th>Valor Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                <?php
                                while ($pedido = mysqli_fetch_array($queryPedidos, MYSQLI_ASSOC)) {
                                ?>
                                    <tr>
                                        <td><?php echo $pedido['id'] ?></td>
                                        <td><?php echo date('d/m/Y H:i:s', strtotime($pedido['data_pedido'])) ?></td>
                                        <td><?php echo ($pedido['data_pagamento'] == '0000-00-00 00:00:00' ? '-----' : date('d/m/Y H:i:s', strtotime($pedido['data_pagamento']))) ?></td>
                                        <td><?php echo $pedido['valor_total'] ?></td>
                                    </tr>
                                <?php
                                }
                                ?>

                                </tbody>
                            </table>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
<?php 
    # FOOTER
    include('footer.php');
?>
</html>