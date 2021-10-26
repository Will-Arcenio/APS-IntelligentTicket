<?php
    include('../../../Conexao/conexao.php');

    $sqlInstruct = "SELECT * FROM ambientes ORDER BY id DESC";
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
    <title>Ambientes | Painel Bla³</title>
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
                                <span class="success-message">Ambiente de ID <?php echo $_GET['event_id']; ?> atualizado.</span>
                <?php
                            }
                        }
                    }
                ?>
                <?php
                    # Mensagem de Sucesso ao Criar Ambiente
                    if (isset($_GET['success'])) {
                        if ($_GET['success'] == 1) {
                ?>
                            <span class="success-message">Ambiente adicionado.</span>
                <?php
                        }
                    }
                ?>
                <?php
                    # Mensagem de Erro ao Criar Ambiente
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == 1) {
                ?>
                            <span class="erro-message">
                                Ocorreu um problema ao adicionar o ambiente.
                                <br>
                                Erro: <?php echo $_GET['msg']; ?>
                            </span>
                <?php
                        }
                    }
                ?>
            </div>
            <div class="col-md-12 lista-ambiente">
                <div class="row info-btns">
                    <div class="col-md-6">
                        <div class="qtd-ambientes">
                        <?php
                            if ($query->num_rows != 0) {
                        ?>
                                <span>Há <?php echo $query->num_rows; ?> ambientes cadastrados.</span>
                        <?php 
                            }
                        ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="acoes">
                            <div class="botoes">
                                <a href="criar_ambiente.php" class="white-font">Criar Ambiente</a>
                            </div>
                        </div>
                    </div>
                </div>
                <table style="width: 100%;">
                    <thead>
                        <tr>
                            <th colspan="5" class="table-title">AMBIENTES</th>
                        </tr>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Endereço</th>
                            <th>Qtd Público</th>
                            <th>Ambiente Fechado</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if (!$query->num_rows != 0) {
                    ?>
                            <tr>
                                <td>Não há ambientes para listar.</td>
                            </tr>
                    <?php
                        } else {
                            $html = '';
                            while ($ambiente = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                                $html = '<tr>
                                            <td>' . $ambiente['id'] . '</td>
                                            <td>' . $ambiente['nome'] . '</td>
                                            <td>' . $ambiente['endereco'] . '</td>
                                            <td>' . $ambiente['qtd_publico'] . '</td>
                                            <td>' . ($ambiente['ambiente_fechado'] == 'S' ? 'Sim' : 'Não') . '</td>
                                            <td><a href="ambiente_edit.php?id=' . $ambiente['id'] . '">Editar</a></td>
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