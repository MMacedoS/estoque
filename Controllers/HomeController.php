<?php
require_once "./Models/apartamentoModel.php";
require_once "./Models/produtos.php";
require_once "./Models/estoques.php";
class HomeController extends Controller{

    public function index()
    {
        $this->apts=Apartamentos::getApt();
        $this->produtos=Produtos::getProdutos();
        $estoque=Estoques::BuscaItens();
        $this->mostrarIndex('index',$this->apts,$this->produtos,$estoque);
    }
}
?>