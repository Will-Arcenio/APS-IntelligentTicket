<?php
    include('../../../Conexao/conexao.php');
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
    <title>Editar evento | Painel Bla³</title>
</head>
<body class="painel-admin">
    <?php 
        # CABEÇALHO ADMIN
        include('docs/header_admin.php');
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 lista-categoria">
                <form action="../../../model/admin/categoria_edit_DB.php" method="POST">
                    <?php
                        $id = @$_GET['id'];

                        $sql = "SELECT * FROM categorias WHERE id = {$id}";

                        $query     = mysqli_query($conexao, $sql);
                        $categoria = mysqli_fetch_array($query, MYSQLI_ASSOC);
                    ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="btn-back">
                                <a href="<?php echo $_SERVER['HTTP_REFERER'] ?>"><i class="icon-arrow-left2"></i> Voltar</a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <label for="id">Código</label>
                            <input type="text" name="id" id="id" readonly="true" class="input-number" required="required" value="<?php echo $categoria['id'] ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" id="nome" size="50" required="required" onkeyup="removeAcentos()" value="<?php echo $categoria['nome'] ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="url">Url</label>
                            <input type="text" id="url" name="url" readonly="true" value="<?php echo $categoria['url'] ?>">
                        </div>
                    </div>

                    <br>

                    <div class="botao-div">
                        <button type="submit" name="salvar" class="botao">Salvar</button>
                    </div>
                </form>
                <script>
                    function removeAcentos() {
                        let categoria = document.getElementById('nome').value;
                        let url       = categoria.normalize('NFD').replace(/[\u0300-\u036f]/g, "").toLowerCase();
                        url           = url.replace(/\s+/g, "-");
                        document.getElementById('url').value = url;
                    }
                </script>
            </div>
        </div>
    </div>
</body>
</html>

<?php mysqli_close($conexao); ?>