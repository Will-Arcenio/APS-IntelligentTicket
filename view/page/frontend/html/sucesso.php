<?php 
    session_start(); //inicia a sessão
    
    if(!$_SESSION['compraFinalizada']) {
        header('Location: homepage.php');
    die;
    }

?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../../../../skins/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../../../skins/css/bootstrap-theme.min.css">
        <script src="../../../../js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../../../../skins/css/estilo.css">
        <link rel="stylesheet" href="../../../../skins/css/style.css">
        <title>Sucesso | Bla²</title>
    </head>
    <body>
        <?php 
            //verificar se o usuario esta logado
            if (!$_SESSION['logged_front']) {
                header('Location: login.php');

            }
            include('header.php'); 

            include('../../../../Conexao/conexao.php');            

            $data_pedido       = date ('Y-m-d');
            $data_pagamento    = date ('Y-m-d');
            $id_user           = $_SESSION['logged_front']['user_id'];

            foreach ($_SESSION['carrinho'] as $id => $qtd){
                $sqlInstructCart = "SELECT * FROM `eventos` WHERE id='$id'";
                $queryHome = mysqli_query($conexao, $sqlInstructCart);
                $exibe = mysqli_fetch_array($queryHome, MYSQLI_ASSOC);
    
                $preco  = number_format(($exibe['preco_unitario']),2,',','.');

                $valor_total = $exibe['preco_unitario'] * $qtd;                              
            } 

            $sqlInstruct = "INSERT INTO pedidos (data_pedido, data_pagamento, id_formapagamento, id_cliente, valor_total)
            VALUES('{$data_pedido}', '{$data_pagamento}', '1', '{$id_user}', '{$valor_total}')";

                $query = mysqli_query($conexao, $sqlInstruct);   


            $sqlInstructPed = "SELECT * FROM pedidos where id_cliente = '$id_user' ORDER BY pedidos.id desc";
            
                
                $queryPed = mysqli_query($conexao, $sqlInstructPed);
                $pedInfos = mysqli_fetch_array($queryPed, MYSQLI_ASSOC);
         ?>
    <div class="container">
        <div class="pedido-recebido col-md-12">
            <h2 class="title">Seu pedido foi recebido. Obrigado por comprar conosco!!</h2>
            <h3> O número do seu pedido é <?php echo $pedInfos['id'] ?></h3>
        </div>
        <div class="col-md-12 pedidoss mp-details-pix">
            <div class="col-md-4">
                <h4 class="mp-details-pix-title">Como pagar com Pix:</h4><br>
                <ul class="mp-steps-congrats mp-pix-left">
                    <li class="mp-details-list">
                        <p class="mp-details-pix-number-p">1</p>
                        <p class="mp-details-list-description">Acesse o app ou site do seu banco</p>
                    </li>
                    <li class="mp-details-list">
                        <p class="mp-details-pix-number-p">2</p>
                        <p class="mp-details-list-description">Busque a opção de pagar com Pix</p>
                    </li>
                    <li class="mp-details-list">
                        <p class="mp-details-pix-number-p">3</p>
                        <p class="mp-details-list-description">Leia o QR code ou código Pix</p>
                    </li>
                    <li class="mp-details-list">
                        <p class="mp-details-pix-number-p">4</p>
                        <p class="mp-details-list-description">Pronto! Você verá a confirmação do pagamento</p>
                    </li>
                </ul>
            </div>
            <div class="col-md-8 mp-text-center mp-pix-right">
                <p class="mp-details-pix-amount text-center">
                    <span class="mp-details-pix-qr">Valor a pagar:</span>
                    <span class="mp-details-pix-qr-value">R$ <?php echo number_format($valor_total,2,',','.'); ?></span>
                </p>
                <p class="mp-details-pix-qr-title text-center"> Escaneie o QR code:</p>
                <img class="mp-details-pix-qr-img" src="../../../../skins/images/pix.jpg">
            <div class="mp-details-pix-container">
                <p class="mp-details-pix-qr-description text-center">Se preferir, você pode pagar copiando e colando o seguinte código</p>
                <div class="mp-row-checkout-pix-container text-center">
                    <input id="mp-qr-code" value="Aa3qA4JvW3TTdo4n89CJd24Su4x29riNI2RoeFzdTCEGKdy5CE" class="mp-qr-input">
                    <button onclick="copy_qr_code()" class="mp-details-pix-button">Copiar</button>
                    <script>
                        function copy_qr_code() {
                            var copyText = document.getElementById("mp-qr-code");
                            copyText.select();
                            copyText.setSelectionRange(0, 99999)
                            document.execCommand("copy");
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
 </div>

</body>

<?php 
    unset($_SESSION['compraFinalizada']);
    # FOOTER
    include('footer.php');
?>