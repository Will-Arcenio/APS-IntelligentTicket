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
    <title>Cadastrar Evento | Painel Bla³</title>
</head>
<body class="painel-admin">
    <?php 
        # CABEÇALHO ADMIN
        include('docs/header_admin.php');
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 lista-evento">
                <form action="../../../model/admin/evento_create_DB.php" method="POST">
                    <?php
                        $sql   = "SELECT * FROM categorias ORDER BY nome ASC";
                        
                        $query = mysqli_query($conexao, $sql);
                    ?>

                    <div class="row">
                        <div class="col-md-2">
                            <label for="id">Código</label>
                            <input type="text" name="id" id="id" readonly="true" class="input-number" required="required">
                        </div>
                        <div class="col-md-10">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" id="nome" size="50" required="required">
                        </div>
                    </div>

                    <br>
                    
                    <div class="row">
                        <div class="col-md-3">
                            <label for="categoria">Categoria</label>
                            <select name="categoria" id="categoria">
                            <?php
                                while ($categoria = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                            ?>
                                <option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['nome']; ?></option>
                            <?php
                                }
                            ?>
                            </select>
                        </div>
                        <div class="col-md-5">
                            <label for="ambiente">Local</label>
                            <select name="ambiente" id="ambiente">
                                <!-- <option value="0">Selecione um local</option> -->
                            <?php
                                $sql   = "SELECT * FROM ambientes ORDER BY nome ASC";
                                $query = mysqli_query($conexao, $sql);

                                while ($ambiente = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                            ?>
                                <option value="<?php echo $ambiente['id']; ?>"><?php echo $ambiente['nome']; ?></option>
                            <?php
                                }
                            ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="data">Data</label>
                            <input type="date" id="data" name="data" required="required">
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="classificacao_indicativa">Classificação Indicativa</label>
                            <input type="text" id="classificacao_indicativa" name="classificacao_indicativa" required="required">
                        </div>
                        <div class="col-md-3">
                            <label for="emite_certificado">Emite Certificado</label>
                            <select name="emite_certificado" id="emite_certificado">
                                <option value="0">Não</option>
                                <option value="1">Sim</option>
                            </select>
                        </div>
                    </div>

                    <br>

                    <div class="botao-div">
                        <button type="submit" name="salvar" class="botao">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php mysqli_close($conexao); ?>