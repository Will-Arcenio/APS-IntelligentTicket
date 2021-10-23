<?php

    include('../../Conexao/conexao.php');

    $nome                      = $_POST['nome'];
    $categoria                 = $_POST['categoria'];
    $ambiente                  = $_POST['ambiente'];
    $data                      = $_POST['data'];
    $classificacao_indicativa  = $_POST['classificacao_indicativa'];
    $emite_certificado         = $_POST['emite_certificado'];

    # Variáveis
    $amb_qtdPublico = '';
    $percentual     = '';
    $ingressos_tot  = 0;

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

    # Criando evento
    $sqlInstruct = "INSERT INTO eventos (nome, id_categoria, id_ambiente, data_evento, classificacao_indicativa, emite_certificado, total_ingresso) VALUES ('{$nome}', '{$categoria}', '{$ambiente}', '{$data}', '{$classificacao_indicativa}', '{$emite_certificado}', '{$ingressos_tot}')";

    $query = mysqli_query($conexao, $sqlInstruct);

    if ($query) {
        header('Location: ../../view/page/admin/lista_evento.php?success=1');
    } else {
        header('Location: ../../view/page/admin/lista_evento.php?error=1&msg=' . mysqli_error($conexao));
    }

?>
