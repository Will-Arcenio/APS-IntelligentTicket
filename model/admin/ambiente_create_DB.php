<?php

    include('../../Conexao/conexao.php');

    $id               = $_POST['id'];
    $nome             = $_POST['nome'];
    $endereco         = $_POST['endereco'];
    $qtd_publico      = $_POST['qtd_publico'];
    $ambiente_fechado = $_POST['ambiente_fechado'];

    // # Variáveis
    // $amb_qtdPublico = '';
    // $percentual     = '';
    // $ingressos_tot  = 0;

    // # SQL Ambiente
    // $sqlAmbiente   = "SELECT * FROM ambientes WHERE id = '{$ambiente}'";
    // $queryAmbiente = mysqli_query($conexao, $sqlAmbiente);
    // $ambienteInfos = mysqli_fetch_array($queryAmbiente, MYSQLI_ASSOC);
    
    // # Quantidade de público no Ambiente
    // $amb_qtdPublico = $ambienteInfos['qtd_publico'];

    // # SQL Configuração
    // $sqlConfig       = "SELECT * FROM config WHERE id = '1'";
    // $queryConfig     = mysqli_query($conexao, $sqlConfig);
    // $percentualInfo  = mysqli_fetch_array($queryConfig, MYSQLI_ASSOC);

    // # Percentual de público
    // $percentual = $percentualInfo['valor'];

    // // Calcula a quantidade de ingressos que o evento pode vender, de acordo com a configuração do percentual de público do GOVERNO
    // $ingressos_tot = round($amb_qtdPublico * ($percentual / 100));

    # Criando ambiente
    $sqlInstruct = "INSERT INTO ambientes (nome, endereco, qtd_publico, ambiente_fechado) VALUES ('{$nome}', '{$endereco}', '{$qtd_publico}', '{$ambiente_fechado}')";

    $query = mysqli_query($conexao, $sqlInstruct);

    if ($query) {
        header('Location: ../../view/page/admin/lista_ambiente.php?success=1');
    } else {
        header('Location: ../../view/page/admin/lista_ambiente.php?error=1&msg=' . mysqli_error($conexao));
    }

?>
