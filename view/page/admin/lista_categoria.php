<?php
    # Inicia a sessão e valida
    session_start();
    if (!$_SESSION['painel-logged']) {
        header('Location: login.php');
    }

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
                    if (@$_SESSION['cat_updated']['updated'] && @$_SESSION['cat_updated']['categoria_id']) {
                        if (@$_SESSION['cat_updated']['updated'] == 1) {
                            if (@$_SESSION['cat_updated']['categoria_id']) {
                ?>
                                <span class="success-message">Categoria de ID <?php echo @$_SESSION['cat_updated']['categoria_id']; ?> atualizada.</span>
                <?php
                                unset($_SESSION['cat_updated']);
                            }
                        }
                    }
                ?>
                <?php
                    # Mensagem de Sucesso ao Criar Categoria
                    if (@$_SESSION['cat_created']) {
                        if (@$_SESSION['cat_created']['created'] == 1) {
                ?>
                            <span class="success-message">Categoria adicionada.</span>
                <?php
                            unset($_SESSION['cat_created']);
                        }
                    }
                ?>
                <?php
                    # Mensagem de Erro ao Criar Categoria
                    if (@$_SESSION['cat_created']) {
                        if (@$_SESSION['cat_created']['created'] == 0) {
                ?>
                            <span class="erro-message">
                                Ocorreu um problema ao adicionar a categoria.
                                <br>
                                Erro: <?php echo @$_SESSION['cat_created']['msg']; ?>
                            </span>
                <?php
                            unset($_SESSION['cat_created']);
                        }
                    }
                ?>
                <?php
                    # Mensagem de Sucesso ao Deletar Categoria
                    if (@$_SESSION['cat_deleted']['deleted']) {
                        if (@$_SESSION['cat_deleted']['deleted'] == 1) {
                ?>
                            <span class="success-message">Categoria deletada.</span>
                <?php
                            unset($_SESSION['cat_deleted']);
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
                            <th colspan="4" class="table-title">CATEGORIAS</th>
                        </tr>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th colspan="2" style="text-align: center;" class="th-action">Ação</th>
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
                                            <td style="text-align: right"><a href="categoria_edit.php?id=' . $categoria['id'] . '"><i class="icon-pencil"></i></a></td>
                                            <td><a href="../../../model/admin/categoria_delete_DB.php?id=' . $categoria['id'] . '"><i class="icon-bin"></i></a></td>
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