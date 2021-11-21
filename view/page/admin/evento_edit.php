<?php
    # Inicia a sessão e valida
    session_start();
    if (!$_SESSION['painel-logged']) {
        header('Location: login.php');
    }

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
    <title>Editar Evento | Painel Bla³</title>
</head>
<body class="painel-admin">
    <?php 
        # CABEÇALHO ADMIN
        include('docs/header_admin.php');
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 lista-evento">
                <form action="../../../model/admin/evento_edit_DB.php" method="POST" enctype="multipart/form-data">
                    <?php
                        $id = @$_GET['id'];

                        $sql = "SELECT * FROM eventos WHERE id = {$id}";

                        $query     = mysqli_query($conexao, $sql);
                        $evento = mysqli_fetch_array($query, MYSQLI_ASSOC);
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
                            <input type="text" name="id" id="id" readonly="true" value="<?php echo $evento['id']; ?>" class="input-number" required="required">
                        </div>
                        <div class="col-md-10">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" id="nome" size="50" value="<?php echo $evento['nome']; ?>" required="required">
                        </div>
                    </div>

                    <br>
                    
                    <div class="row">
                        <div class="col-md-3">
                            <label for="categoria">Categoria</label>
                            <select name="categoria" id="categoria">
                            <?php
                                $sqlCateg   = "SELECT * FROM categorias ORDER BY nome ASC";
                                $queryCateg = mysqli_query($conexao, $sqlCateg);

                                while ($categoria = mysqli_fetch_array($queryCateg, MYSQLI_ASSOC)) {
                            ?>
                                <option value="<?php echo $categoria['id']; ?>" <?php if ($categoria['id'] == $evento['id_categoria']) { ?>selected="selected" <?php } ?>><?php echo $categoria['nome']; ?></option>
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
                                $sqlAmb   = "SELECT * FROM ambientes ORDER BY nome ASC";
                                $queryAmb = mysqli_query($conexao, $sqlAmb);

                                while ($ambiente = mysqli_fetch_array($queryAmb, MYSQLI_ASSOC)) {
                            ?>
                                <option value="<?php echo $ambiente['id']; ?>" <?php if ($ambiente['id'] == $evento['id_ambiente']) { ?>selected="selected" <?php } ?>><?php echo $ambiente['nome']; ?></option>
                            <?php
                                }
                            ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="data">Data</label>
                            <input type="date" id="data" name="data" value="<?php echo date('Y-m-d', strtotime($evento['data_evento'])); ?>" required="required">
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="classificacao_indicativa">Classificação Indicativa</label>
                            <input type="text" id="classificacao_indicativa" name="classificacao_indicativa" value="<?php echo $evento['classificacao_indicativa'] ?>" required="required">
                        </div>
                        <div class="col-md-3">
                            <label for="emite_certificado">Emite Certificado</label>
                            <select name="emite_certificado" id="emite_certificado">
                                <option value="0" <?php if ($evento['emite_certificado']  == 0) { ?> selected="selected" <?php } ?>>Não</option>
                                <option value="1" <?php if ($evento['emite_certificado']  == 1) { ?> selected="selected" <?php } ?>>Sim</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="total_ingressos">Total de Ingressos</label>
                            <input type="text" id="total_ingressos" name="total_ingressos" value="<?php echo $evento['total_ingresso']; ?>" readonly>
                        </div>
                        <div class="col-md-2">
                            <label for="preco_unitario">Preço Unitário</label>
                            <input type="text" id="preco_unitario" name="preco_unitario" class="input-number" value="<?php echo $evento['preco_unitario']; ?>">
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="imagem">Imagem</label><br>
                            <?php
                            # Caso o evento possua imagem
                            if ($evento['url_imagem']) {
                            ?>
                                <img src="../../../skins/images/eventos/<?php echo $evento['url_imagem'] ?>" alt="<?php echo $evento['url_imagem'] ?>" width="22px" height="22px" title="<?php echo $evento['url_imagem'] ?>"/>
                                <input type="file" id="imagem" name="imagem" value="<?php echo $evento['url_imagem'] ?>" style="display: inline; width: 92%;">
                            <?php
                            } else {
                            ?>
                                <input type="file" id="imagem" name="imagem" value>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="col-md-3 ev-destaque">
                            <div class="col-md-12 ev-label-check">
                                <label for="evento_destaque">Destaque</label>
                            </div>
                            <div class="col-md-12 ev-input-check">
                                <input type="checkbox" id="evento_destaque" name="evento_destaque" <?php if ($evento['destaque'] == 'S') { ?> checked <?php } ?>>
                            </div>
                        </div>
                        <div class="col-md-3 ev-mais-vendido">
                            <div class="col-md-12 ev-label-mais-vendido">
                                <label for="evento_mais_vendido">Mais Vendido</label>
                            </div>
                            <div class="col-md-12 ev-input-mais-vendido">
                                <input type="checkbox" id="evento_mais_vendido" name="evento_mais_vendido" <?php if ($evento['mais_vendido'] == 'S') { ?> checked <?php } ?>>
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-3 ev-cancelado">
                            <div class="col-md-12 ev-label-cancel">
                                <label for="evento_cancelado">Cancelado</label>
                            </div>
                            <div class="col-md-12 ev-input-cancel">
                                <input type="checkbox" id="evento_cancelado" name="evento_cancelado" <?php if ($evento['ev_cancelado'] == 'S') { ?> checked <?php } ?>>
                            </div>
                        </div>
                        <div class="col-md-6 ev-motivo-cancel">
                            <div class="col-md-12 ev-label-motivo-cancel">
                                <label for="evento_motivo_cancel">Motivo do Cancelamento</label>
                            </div>
                            <div class="col-md-12 ev-input-motivo">
                                <input type="text" id="evento_motivo_cancel" name="evento_motivo_cancel" value="<?php echo $evento['motivo_cancelamento'] ?>">
                            </div>
                        </div>
                        <div class="col-md-3 ev-reembolso">
                            <div class="col-md-12 ev-label-reembolso">
                                <label for="evento_reembolso">Reembolsar</label>
                            </div>
                            <div class="col-md-12 ev-input-reembolso">
                                <input type="checkbox" id="evento_reembolso" name="evento_reembolso" <?php if ($evento['reembolso'] == 'S') { ?> checked <?php } ?>>
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="botao-div">
                        <button type="submit" name="salvar" class="botao"><i class="icon-floppy-disk"></i> Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php mysqli_close($conexao); ?>