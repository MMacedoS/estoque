<?php

require_once "./Models/estoques.php";
require_once "./Models/produtos.php";

class SituacaoController extends Controller
{
    private $estoque;

// PRODUTOS
    public function index($nome)
    {
        $this->estoque=Estoques::situacao();
        $this->entra_estoque=Estoques::entrada();
        $this->baixa_estoque=Estoques::BuscaBaixa();
        $this->produtos=Produtos::getProdutos();
        $this->mostrarViewEstoque($nome,$this->estoque,$this->produtos,$this->entra_estoque,$this->baixa_estoque);
        
    }

    public function filtrar_entradas()
        {        
        $this->entra_estoque=Estoques::entradaByDate($_POST['inicio'],$_POST['fim']);
        echo json_encode($this->entra_estoque);
        
    }
    public function filtrar_id($id)
        {        
        $this->entra_estoque=Estoques::entradaById($id);
        echo json_encode($this->entra_estoque);
        
    }
    public function insert_entradas()
        {        
        $this->entra_estoque=Estoques::insertEntrada($_POST['produto'],$_POST['quantidade'],$_POST['data']);
        echo json_encode($this->entra_estoque);
        
    }
    public function update_entradas()
        {        
        $this->entra_estoque=Estoques::updateEntrada($_POST['produto'],$_POST['quantidade'],$_POST['data'],$_POST['id']);
        echo json_encode($this->entra_estoque);
        
    }
    public function baixa_estoque()
    {
        $this->baixa_estoque=Estoques::BuscaBaixa();
        echo json_encode($this->baixa_estoque);
    }
    
    public function relEntrada($nome)
    {
        $this->mostrarRelatorio($nome,'');
    }

    public function buscaRelEntrada($param)
    {
        $dados=explode(',',$param);
        $this->entra_estoque=Estoques::entradaByDate($dados[0],$dados[1]);
        echo json_encode($this->entra_estoque);
        // $this->mostrarRelatorio('relatorio',$this->entra_estoque);
    }
}



?>