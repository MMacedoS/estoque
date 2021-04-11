<?php

require_once "./Models/caixaModel.php";

class Controller
{
    public $dados;
    public $categorias;
    public $produtos;
    public $entra_estoque;
    public $sai_estoque;
    public $apts;
    public $baixa_estoque;

    public function mostrarIndex($nome,$apt,$produto,$estoques)
    {
        $this->dados=$nome;
        $this->apts=$apt;
        $this->produtos=$produto;
        require_once('Views/index.php');
    }
    public function mostrarView($nome,$dado,$caixa,$apt)
    {
        $this->dados=$dado;
        require_once('Views/cadastros/'.$nome.'.php');
    }
    public function mostrarlista($nome,$dado,$caixa)
    {   $caixa=$caixa;
        $this->dados=$dado;
        require_once('Views/listas/'.$nome.'.php');
    }
    public function mostrarViewEstoque($nome,$estoque,$produto,$entra,$baixa)
    {
        $this->dados=$estoque;
        $this->produtos=$produto;
        $this->entra_estoque=$entra;
        $this->baixa_estoque=$baixa;
        require_once('Views/estoque/'.$nome.'.php');
    }

    public function mostrarRelatorio($nome,$consumos)
    {
        $this->dados=$consumos;
        require_once('Views/relatorio/'.$nome.".php");
    }
    public function mostrarRelsaida($nome)
    {
        require_once('Views/relatorio/'.$nome);
    }
    public function buscaRelCaixa($inicio,$fim)
    {
        $caixas=CaixaModel::getCaixa(1,$inicio,$fim);
        
        return $caixas;
    }
}
?>