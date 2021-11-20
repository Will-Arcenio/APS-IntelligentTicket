<?php

    include('../../Conexao/conexao.php');

    $id                        = $_POST['id'];
    $nome                      = $_POST['nome'];
    $categoria                 = $_POST['categoria'];
    $ambiente                  = $_POST['ambiente'];
    $data                      = $_POST['data'];
    $classificacao_indicativa  = $_POST['classificacao_indicativa'];
    $emite_certificado         = $_POST['emite_certificado'];
    $preco_unitario            = $_POST['preco_unitario'];
    $destaque                  = (isset($_POST['evento_destaque']) ? 'S' : 'N');
    $mais_vendido              = (isset($_POST['evento_mais_vendido']) ? 'S' : 'N');
    $cancelado                 = (isset($_POST['evento_cancelado']) ? 'S' : 'N');
    $motivo                    = $_POST['evento_motivo_cancel'];
    $reembolso                 = (isset($_POST['evento_reembolso']) ? 'S' : 'N');

    $reembolsoFeito = false;
    $qtdIngressos   = 0;
    $totalReembolso = 0;
    
    # Pega o nome da Imagem
    $nome_imagem               = $_FILES['imagem']['name'];

    # Pega o local temporário da Imagem
    $imagem_temp               = $_FILES['imagem']['tmp_name'];

    # Diretório das imagens dos eventos
    $diretorio                 = '../../skins/images/eventos/';


    # SQL Ambiente
    $sqlAmbiente   = "SELECT * FROM ambientes WHERE id = '{$ambiente}'";
    $queryAmbiente = mysqli_query($conexao, $sqlAmbiente);
    $ambienteInfos = mysqli_fetch_array($queryAmbiente, MYSQLI_ASSOC);
    
    # Quantidade de público no Ambiente
    $amb_qtdPublico = $ambienteInfos['qtd_publico'];

    # SQL Configuração
    $sqlConfig       = "SELECT * FROM config WHERE id = '1'";
    $queryConfig     = mysqli_query($conexao, $sqlConfig);
    $percentualInfo  = mysqli_fetch_array($queryConfig, MYSQLI_ASSOC);

    # Percentual de público
    $percentual = $percentualInfo['valor'];

    // Calcula a quantidade de ingressos que o evento pode vender, de acordo com a configuração do percentual de público do GOVERNO
    $ingressos_tot = round($amb_qtdPublico * ($percentual / 100));

    $sqlInstruct = "UPDATE eventos SET nome = '{$nome}', id_categoria = '{$categoria}', id_ambiente = '{$ambiente}', data_evento = '{$data}', classificacao_indicativa = '{$classificacao_indicativa}', emite_certificado = '{$emite_certificado}', preco_unitario = '{$preco_unitario}', url_imagem = '{$nome_imagem}', total_ingresso = '{$ingressos_tot}', destaque = '{$destaque}', mais_vendido = '{$mais_vendido}', ev_cancelado = '{$cancelado}', motivo_cancelamento = '{$motivo}', reembolso = '{$reembolso}' WHERE id = '{$id}'";

    if (move_uploaded_file($imagem_temp, $diretorio . $nome_imagem)) {
        echo 'Imagem salva.';
    } else {
        echo 'Não foi possível salvar a imagem.';
        if ($_FILES['imagem']['name'] == '') {
            
            # Caso não tenha imagem, pega a imagem anterior para, posteriormente, excluir do diretório
            $sqlSelect   = "SELECT url_imagem FROM eventos WHERE id = '{$id}'";
            $querySelect = mysqli_query($conexao, $sqlSelect);
            $evt         = mysqli_fetch_array($querySelect, MYSQLI_ASSOC);

            # Excluir a imagem no Diretório
            unlink($_SERVER['DOCUMENT_ROOT'] . '/IntelligentTicket/skins/images/eventos/' . $evt['url_imagem']);
        }
    }

    $query = mysqli_query($conexao, $sqlInstruct);

    if ($query) {

        # Fazer reembolso dos Ingressos do Evento caso seja necessário
        if ($reembolso === 'S' && $cancelado === 'S') {
            # Select do Reembolso para verificar a quantidade de ingressos vendidos do Evento
            $sqlSelectReembolso = "SELECT COUNT(id_evento) AS qtd_ingressos, SUM(valor_unitario) AS valor_total_reembolso FROM ingressos INNER JOIN pedidos ON (ingressos.id_cliente = pedidos.id_cliente AND ingressos.id_pedido = pedidos.id) WHERE id_evento = {$id}";
            $querySelectReembolso = mysqli_query($conexao, $sqlSelectReembolso);
            $selectReembolso = mysqli_fetch_array($querySelectReembolso, MYSQLI_ASSOC);
            $qtdIngressos   = $selectReembolso['qtd_ingressos'];
            $totalReembolso = $selectReembolso['valor_total_reembolso'];;
            $reembolsoFeito = true;
            return header('Location: ../../view/page/admin/lista_evento.php?updated=1&event_id=' . $id . '&reembolso=' . $reembolsoFeito . '&qty=' . $qtdIngressos . '&total=' . $totalReembolso);
        }
        header('Location: ../../view/page/admin/lista_evento.php?updated=1&event_id=' . $id);
    } else {
        echo "Erro: " . mysqli_error($conexao);
    }