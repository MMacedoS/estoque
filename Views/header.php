<?php $path="http://$_SERVER[HTTP_HOST]";?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=$path;?>/estoque/Views/css/menu.css">
    <!-- <script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script> -->
        <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>
   
    <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-primary mb-3">
    <div class="flex-row d-flex">
        <button type="button" class="navbar-toggler mr-2 " data-toggle="offcanvas" title="Toggle responsive left sidebar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#" title="Free Bootstrap 4 Admin Template">Menu Principal</a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="collapsingNavbar">
        <!-- <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">Home</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
        </ul> -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#myAlert" data-toggle="collapse">Nome do Usuário</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="" data-target="#myModal" data-toggle="modal">Sair</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container-fluid" id="main">
    <div class="row row-offcanvas row-offcanvas-left">
        <div class="col-md-3 col-lg-2 sidebar-offcanvas bg-light pl-0" id="sidebar" role="navigation">
            <ul class="nav flex-column sticky-top pl-0 pt-5 mt-3">
                <li class="nav-item"><a class="nav-link" href="/estoque">Inicio</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="#submenu1" data-toggle="collapse" data-target="#submenu1">Cadastros</a>
                    <ul class="list-unstyled flex-column pl-3 collapse" id="submenu1" aria-expanded="false">
                        <li class="nav-item"><a class="nav-link" href="/Estoque/cadastro/Apartamento">Apartamentos</a></li>
                        <li class="nav-item"><a class="nav-link" href="/Estoque/cadastro/Categoria">Categorias</a></li>
                       <li class="nav-item"><a class="nav-link" href="/Estoque/cadastro/Cliente">Clientes</a></li>
                       <li class="nav-item"><a class="nav-link" href="/Estoque/cadastro/Produto">Produtos</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="/Estoque/situacao/index/estoque">Situação Estoque</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="#submenu2" data-toggle="collapse" data-target="#submenu2">Relatório</a>
                    <ul class="list-unstyled flex-column pl-3 collapse" id="submenu2" aria-expanded="false">
                        <li class="nav-item"><a class="nav-link" href="/Estoque/situacao/relEntrada/entrada">Entrada</a></li>
                        <li class="nav-item"><a class="nav-link" href="/Estoque/situacao/relEntrada/saida">Saida</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="#">Saida</a></li>
               
            </ul>
        </div>
        <!--/col-->

