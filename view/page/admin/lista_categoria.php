<?php
    include('../../../Conexao/conexao.php');

    $sqlInstruct = "SELECT * FROM categorias ORDER BY id DESC";
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
    <link rel="stylesheet" href="../../../skins/css/estilo-admin.css">
    <link rel="stylesheet" href="../../../skins/css/style.css">
    <title>Categorias | Painel Bla³</title>
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
                    if (isset($_GET['updated']) && isset($_GET['categoria_id'])) {
                        if ($_GET['updated'] == 1) {
                            if ($_GET['categoria_id']) {
                ?>
                                <span class="success-message">Categoria de ID <?php echo $_GET['categoria_id']; ?> atualizada.</span>
                <?php
                            }
                        }
                    }
                ?>
                <?php
                    # Mensagem de Sucesso ao Criar Categoria
                    if (isset($_GET['success'])) {
                        if ($_GET['success'] == 1) {
                ?>
                            <span class="success-message">Categoria adicionada.</span>
                <?php
                        }
                    }
                ?>
                <?php
                    # Mensagem de Erro ao Criar Categoria
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == 1) {
                ?>
                            <span class="erro-message">
                                Ocorreu um problema ao adicionar a categoria.
                                <br>
                                Erro: <?php echo $_GET['msg']; ?>
                            </span>
                <?php
                        }
                    }
                ?>
            </div>
            <div class="col-md-12 lista-categoria">
                <div class="row info-btns">
                    <div class="col-md-6">
                        <div class="qtd-categorias">
                        <?php
                            if ($query->num_rows != 0) {
                        ?>
                                <span>Há <?php echo $query->num_rows; ?> categorias cadastradas.</span>
                        <?php 
                            }
                        ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="acoes">
                            <div class="botoes">
                                <a href="criar_categoria.php" class="white-font">Criar Categoria</a>
                            </div>
                        </div>
                    </div>
                </div>
                <table style="width: 100%;">
                    <thead>
                        <tr>
                            <th colspan="3" class="table-title">CATEGORIAS</th>
                        </tr>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if (!$query->num_rows != 0) {
                    ?>
                            <tr>
                                <td>Não há categorias para listar.</td>
                            </tr>
                    <?php
                        } else {
                            $html = '';
                            while ($categoria = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                                $html = '<tr>
                                            <td>' . $categoria['id'] . '</td>
                                            <td>' . $categoria['nome'] . '</td>
                                            <td><a href="categoria_edit.php?id=' . $categoria['id'] . '">Editar</a></td>
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