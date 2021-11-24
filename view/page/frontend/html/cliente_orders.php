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
        <title>Meus Pedidos | Bla³</title>
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
                    <li class="first-dash-item"><a href="cliente_dashboard.php">Dashboard</a></li>
                    <li><a href="cliente_account.php">Informações da Conta</a></li>
                    <li class="last-dash-item"><a href="cliente_orders.php">Meus Pedidos</a></li>
                </ul>
            </div>
            <div class="col-md-9 ultimos-pedidos">
                <div class="row">
                    <div class="dash-hello-user col-md-10">
                        <h3 class="dash-title">Meus Pedidos</h3>
                    </div>
                </div>

            <?php
            # SQL para pegar os últimos pedidos do Cliente
            $sqlGetPedidos = "SELECT pedidos.id, pedidos.data_pedido, pedidos.data_pagamento, pedidos.id_formapagamento, pedidos.qtd_parcelas, pedidos.id_cliente, pedidos.valor_total, fp.nome AS forma_pagamento FROM pedidos INNER JOIN formas_pagamento AS fp ON (fp.id = pedidos.id_formapagamento) WHERE id_cliente = '{$_SESSION['logged_front']['user_id']}'";

            #var_dump($sqlGetPedidos);
            
            $queryPedidos = mysqli_query($conexao, $sqlGetPedidos);
            
            #var_dump($queryPedidos);
            if ($queryPedidos->num_rows == 0) {
                echo 'Você ainda não realizou nenhum pedido.';
            } else {
            ?>
                <div class="table-title">
                    <h4>Pedidos</h4>
                </div>
                <div class="table-content">
                    <table class="dash-pedidos" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Nº Pedido</th>
                                <th>Data Pedido</th>
                                <th>Data Pagamento</th>
                                <th>Valor Total</th>
                                <th>Ações</th>
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
                                <td><a href="pedido_view.php?id=<?php echo $pedido['id'] ?>" enabled="false"><i class="icon-eye" title="Visualizar Pedido"></i></a></td>
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
</body>
<?php 
    # FOOTER
    include('footer.php');
?>
</html>