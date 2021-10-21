<!DOCTYPE html>
<html lang="pt-BR">
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
        <title>Carrinho | Intelligent Ticket</title>
    </head>
    <body>
        <div class="header">
            <div class="header container-fluid">
                <div class="col-md-3 col-xs-12 search-area">
                    <form class="d-flex input-group w-auto my-auto mb-3 mb-md-0">
                        <input autocomplete="off" type="search" class="form-control rounded" placeholder="Buscar">
                        <span class="input-group-text border-0 d-none d-lg-flex"><i class="fas fa-search"></i></span>
                      </form>
                </div>
                <div class="div-logo col-md-6 col-xs-12 logo-area text-center">
                    <h1 class="logo"><a href="../html/homepage.html" title="Blablabla" class="logo"><img src="../../../../skins/images/logo.png" alt="Blablabla" width="250px"></a></h1>
                </div>
            </div> 
        </div>
        <div class="container-fluid menu">
            <nav class="navbar-nav">                 
                    <div class="navbar" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#!">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#!">Outro</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#!">Outro</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#!">Outro</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#!">Outro</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#!">Outro</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#!">Outro</a>
                        </li>
                        </ul>
                  </div>
                </div>
              </nav>
        </div>
    </div>
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="container relative">
                    <ul class="bc-links">
                        <li class="Cart">
                        </li>
                    </ul>
                    <h1 class="title-bread">Seu carrinho</h1>
                </div> 
            </div>
        </div>
    </div>
    <div class="container SeuCarrinho">
        <div class="conteudo col-md-8  col-xs-12">      
            <table id="shopping-cart-table" class="data-table cart-table">
                <thead>
                    <tr class="first last">
                        <th rowspan="1"><span class="nobr">Ingressos</span></th>
                        <th rowspan="1">&nbsp;</th>
                        <th rowspan="1">&nbsp;</th>
                        <th colspan="2"><span class="nobr">Preço Unitário</span></th>
                        <th rowspan="1">Quantidade</th>
                        <th class="last" colspan="1">Subtotal</th>
                    </tr>
                </thead>
            <tfoot>
            <tr class="first last">
                <td colspan="50" class="a-right last">
                <button type="submit" name="limpar-carrinho" value="limpar-carrinho" title="Limpar Carrinho" class="limpar-carrinho" id="limpar-carrinho">Limpar Carrinho (FAZER DINAMICO)</button>
                
                </td>
            </tr>
            </tfoot>
            <tbody>
            <tr class="first last odd">
            <td class="pr-img-td"><a href="" title="SHORT LINHO COM FAIXA" class="product-image"><img src="../../../../skins/images/ticket.png" alt="SHORT LINHO COM FAIXA"></a></td>
            <td colspan="2" class="product-name-td">
            <span class="product-name"> EVENTO PADRÃO</span>
            </td>
            <td class="unit-price">
            <span class="cart-price">
            <span class="price">R$60,00</span>
            </span>
            </td>
            <td class="qtd-cart">
            <div class="qty-holder">
            1
            </div>
            </td>
            <td class="td-total last">
            <span class="cart-price" id="span-45073">
            <span class="price">R$293,90</span>
            </span>
            </td>
            </tr>
            </tbody>
            </table>
        </div>
        <div class="container">
            <div class="col-md-4 title col-xs-12" style="background-color:#f3f3f3;">
                <h1 class="title">Valores da compra</h1>                
                <div class="conteudo-carrinho-valores col-md-12 col-xs-12">
                    <div class="subtotal col-md-6 col-xs-6 text-left"><span>Subtotal</span></div>
                    <div class="preco col-md-6 col-xs-6 text-right"><span>R$60,00</span></div>
                    <div class="total col-md-6 col-xs-6 text-left"><span>Total</span></div>
                    <div class="preco col-md-6 col-xs-6 text-right"><span>R$60,00</span></div>                    
                </div>
                <button class="btnFinalizar" type="submit" name="btnFinalizar">Finalizar </button>
            </div>
        </div>    
    </div>

</body>

<footer class="rodape col-md-12">
    <div class="row">
        <div class="rodape-loja">
            <div class="col-md-6 col-xs-12 custom"><h3>Atendimento</h3>
                <div class="row">
                    <div class="col-md-6 col-xs-12 box-atend">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 central"><strong class="show fone"><em class="icon-central"></em>Central de atendimento</strong> <span>(48) 99999-9999</span><br><span><strong>(48) 3433-9999</strong><br><br></span></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-xs-12 box-email"><strong class="show mail"><em class="icon-email"></em>E-mail</strong> <span>contato@blablabla.com.br</span></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12 box-loja"><strong class="show loja" style="padding-left: 0;"><em class="icon-endereco"></em>Endereço loja física</strong>
                    <div><span class="nlj">Nações Shopping</span><span class="nlj">Av Jorge Elias de Lucca, 765, </span><span class="nlj">Ns da Salete / Criciúma - SC</span></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-12 box-hr">
                        <span><strong class="show "><em class="icon-horario"></em>Horário de funcionamento</strong></span>
                        <p class="show">Segunda a sexta-feira<br>8h às 12h e 13h às 17h</p>
                    </div>
                    <div class="col-md-6 col-xs-12 box-redes">
                        <h3>Siga a gente</h3>
                        <a class="facebppl" href="https://www.facebook.com/blablabla" title="Vem curtir a gente no facebook" target="_blank"><em class="icon-facebook1"></em></a> <a class="insta" href="https://www.instagram.com/blablabla" title="Vem ver as nossas fotos no Instagram" target="_blank"><em class="icon-instagram"></em></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 custom"><h3 class="h-marca">A Marca</h3>
                <p><a class="show" href="https://www.blablabla.com.br/conheca-empresa" title="Sobre a Blablabla"> Sobre a Blablabla </a>
                <h3 class="h-ajuda">Ajuda</h3> <a class="show" href="https://www.blablabla.com.br/duvidas-frequentes" title="Dúvidas Frequentes"> Dúvidas Frequentes </a> <a class="show" href="https://www.blablabla.com.br/contato" title="Contato"> Contato </a></p>
            </div>
        </div>
        <div class="rodape-extra">
            <div class="info-desenv col-md-12 col-xs-12">
                <div class="row">
                    <div class="col-xs-12 col-md-2 col-lg-1 logo-n">
                        <a href="https://www.intelligent.com.br" target="_blank" title="Conheça o site do desenvolvedor deste e-commerce" class="logo-nitro">
                        <span>Desenvolvido por</span>
                        <img alt="Intelligent Tecnologia e-commerce Ltda" src="https://www.blablabla.com.br/skin/frontend/nitroecom/one/images/logo-nitroecom.svg">
                        </a>
                    </div>
                    <div class="col-xs-12 col-md-10 col-lg-11 text-c">
                        <address class="txt-copright">
                        <div class="linha"></div>
                        <small>© 2021 Blablabla. Todos os Direitos Reservados. | Blablabla Eventos LTDA | Avenida Jorge Elias de Lucca, 765, Nossa Senhora da Salete / Criciúma - SC – CEP 88813-360 | CNPJ: 04.999-999/0001-32</small>
                        </address>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>