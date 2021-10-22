<?php
    include('../../../Conexao/conexao.php');

    $sqlInstruct = "SELECT * FROM eventos ORDER BY eventos.id DESC";
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
    <title>Eventos | Painel Bla³</title>
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
                                <span class="success-message">Evento de ID <?php echo $_GET['user_id']; ?> atualizado.</span>
                <?php
                            }
                        }
                    }
                ?>
            </div>
            <div class="col-md-12 lista-cliente">
                <div class="row info-btns">
                    <div class="col-md-6">
                        <div class="qtd-eventos">
                        <?php
                            if ($query->num_rows != 0) {
                        ?>
                                <span>Há <?php echo $query->num_rows; ?> eventos cadastrados.</span>
                        <?php 
                            }
                        ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="acoes">
                            <div class="botoes">
                                <a href="criar-evento.php" class="white-font">Criar Evento</a>
                            </div>
                        </div>
                    </div>
                </div>
                <table style="width: 100%;">
                    <thead>
                        <tr>
                            <th colspan="4" class="table-title">EVENTOS</th>
                        </tr>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Categoria</th>
                            <th>Data</th>
                            <th>Classificação Indicativa</th>
                            <th>Total de Ingressos</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if (!$query->num_rows != 0) {
                    ?>
                            <tr>
                                <td>Não há eventos para listar.</td>
                            </tr>
                    <?php
                        } else {
                            $html = '';
                            while ($evento = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                                $html = '<tr>
                                            <td>' . $evento['id'] . '</td>
                                            <td>' . $evento['nome'] . '</td>
                                            <td>' . $evento['categoria'] . '</td>
                                            <td>' . $evento['data_evento'] . '</td>
                                            <td>' . $evento['classificacao_indicativa'] . '</td>
                                            <td>' . $evento['total_ingresso'] . '</td>
                                            <td><a href="evento_edit.php?id=' . $evento['id'] . '">Editar</a></td>
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