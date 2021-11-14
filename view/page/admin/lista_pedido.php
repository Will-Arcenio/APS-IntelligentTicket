<?php
    # Inicia a sessão e valida
    session_start();
    if (!$_SESSION['logged']) {
        header('Location: login.php');
    }

    include('../../../Conexao/conexao.php');

    $sqlInstruct = "SELECT pedidos.id, pedidos.data_pedido, pedidos.data_pagamento, fp.nome AS id_forma_pagamento, cli.nome AS cliente_id, pedidos.valor_total FROM pedidos INNER JOIN formas_pagamento AS fp ON (pedidos.id_formapagamento = fp.id) INNER JOIN clientes AS cli ON (pedidos.id_cliente = cli.id) ORDER BY pedidos.id DESC";

    $query = mysqli_query($conexao, $sqlInstruct);

    //  AQUI DENTRO PRECISA TER COMO CADASTRAR CATEGORIAS DE EVENTOS.
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../../../skins/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="../../../skins/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../../skins/css/estilo-admin.css">
    <link rel="stylesheet" href="../../../skins/css/style.css">
    <title>Pedidos | Painel Bla³</title>
</head>
<body class="painel-admin">
    <?php 
        # CABEÇALHO ADMIN
        include('docs/header_admin.php');        
    ?>
    <div class="container">
        <div class="row">
            <div class="msg col-md-6">
                <?php
                    if (isset($_GET['updated']) && isset($_GET['event_id'])) {
                        if ($_GET['updated'] == 1) {
                            if ($_GET['event_id']) {
                ?>
                                <span class="success-message">Pedido de ID <?php echo $_GET['event_id']; ?> atualizado.</span>
                <?php
                            }
                        }
                    }
                ?>
                <?php
                    # Mensagem de Sucesso ao Criar Pedido
                    if (isset($_GET['success'])) {
                        if ($_GET['success'] == 1) {
                ?>
                            <span class="success-message">Pedido adicionado.</span>
                <?php
                        }
                    }
                ?>
                <?php
                    # Mensagem de Erro ao Criar Pedido
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == 1) {
                ?>
                            <span class="erro-message">
                                Ocorreu um problema ao adicionar o pedido.
                                <br>
                                Erro: <?php echo $_GET['msg']; ?>
                            </span>
                <?php
                        }
                    }
                ?>
                <?php
                    # Mensagem de Sucesso ao Deletar Pedido
                    if (isset($_GET['deleted'])) {
                        if ($_GET['deleted'] == 1) {
                ?>
                            <span class="success-message">Pedido deletado.</span>
                <?php
                        }
                    }
                ?>
            </div>
            <div class="col-md-12 lista-pedido">
                <div class="row info-btns">
                    <div class="col-md-6">
                        <div class="qtd-pedidos">
                        <?php
                            if ($query->num_rows != 0) {
                        ?>
                                <span>Há <?php echo $query->num_rows; ?> pedidos cadastrados.</span>
                        <?php 
                            }
                        ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="acoes">
                            <div class="botoes">
                                <a href="criar_evento.php" class="white-font">Criar Pedido</a>
                            </div>
                        </div>
                    </div>
                </div>
                <table style="width: 100%;">
                    <thead>
                        <tr>
                            <th colspan="9" class="table-title">EVENTOS</th>
                        </tr>
                        <tr>
                            <th>ID</th>
                            <th>Data Pedido</th>
                            <th>Data Pagamento</th>
                            <th>Forma de pagamento</th>
                            <th>Cliente</th>
                            <th>Valor Total</th>
                            <th class="th-action">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if (!$query->num_rows != 0) {
                    ?>
                            <tr>
                                <td>Não há pedidos para listar.</td>
                            </tr>
                    <?php
                        } else {
                            $html = '';
                            while ($pedido = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                                $html = '<tr>
                                            <td>' . $pedido['id'] . '</td>
                                            <td>' . $pedido['data_pedido'] . '</td>
                                            <td>' . $pedido['data_pagamento'] . '</td>
                                            <td>' . $pedido['id_forma_pagamento'] . '</td>
                                            <td>' . $pedido['cliente_id'] . '</td>
                                            <td>' . $pedido['valor_total'] . '</td>
                                            <td style="text-align: center"><a href="evento_edit.php?id=' . $pedido['id'] . '"><i class="icon-pencil"></i></a></td>
                                            </tr>';
                                echo $html;
                            }
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

<?php mysqli_close($conexao); ?>