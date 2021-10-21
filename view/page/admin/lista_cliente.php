<?php
    include('../../../Conexao/conexao.php');

    $sqlInstruct = "SELECT * FROM clientes ORDER BY clientes.id DESC";
    $query = mysqli_query($conexao, $sqlInstruct);
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
    <link rel="stylesheet" href="../../../skins/css/estilo.css">
    <link rel="stylesheet" href="../../../skins/css/style.css">
    <title>Clientes | Painel Bla³</title>
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
                    if (isset($_GET['updated']) && isset($_GET['user_id'])) {
                        if ($_GET['updated'] == 1) {
                            if ($_GET['user_id']) {
                ?>
                                <span class="success-message">Cliente de ID <?php echo $_GET['user_id']; ?> atualizado.</span>
                <?php
                            }
                        }
                    }
                ?>
            </div>
            <div class="col-md-12 lista-cliente">
                <div class="qtd-clientes">
                    <span>Há <?php echo $query->num_rows; ?> clientes cadastrados.</span>
                </div>
                <table style="width: 100%;">
                    <thead>
                        <tr>
                            <th colspan="4" class="table-title">CLIENTES</th>
                        </tr>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Endereço</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if (!$query) {
                    ?>
                            <tr>
                                <td>Não há clientes para listar.</td>
                            </tr>
                    <?php
                        } else {
                            $html = '';
                            while ($cliente = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                                $html = '<tr>
                                            <td>' . $cliente['id'] . '</td>
                                            <td>' . $cliente['nome'] . '</td>
                                            <td>' . $cliente['cpf'] . '</td>
                                            <td>' . $cliente['endereco'] . '</td>
                                            <td><a href="cliente_edit.php?id=' . $cliente['id'] . '">Editar</a></td>
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