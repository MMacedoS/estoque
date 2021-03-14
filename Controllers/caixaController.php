<?php
require_once "./Models/apartamentoModel.php";
require_once "./Models/caixaModel.php";
require_once "./Models/produtos.php";

class CaixaController extends Controller
{

    public function index($id_apt)
    {
        $caixa=CaixaModel::CreateCaixa($id_apt);        
        $this->dados=Apartamentos::updateApt('',$caixa,$id_apt);
        $consumo=CaixaModel::getConsumo($caixa);
        $this->mostrarView('caixa',$consumo,$caixa,$id_apt);
    }

    public function lista($caixa)
    {       
        
        $this->mostrarlista('produto','',$caixa);
    }
    public function buscaProdutos()
    {
        $this->produtos=Produtos::getProdutos();
        echo json_encode($this->produtos);
    }
    
    public function inserir()
    {
        $consumo=CaixaModel::insertConsumo($_POST['produto'],$_POST['quantidade'],$_POST['valor'],$_POST['caixa']);
        echo json_encode($consumo);
    }
    public function fechar_estoque($id)
    {
        $consumo=CaixaModel::fechamento($id);
        echo json_encode($consumo);
    }
    public function remover_produto($id)
    {
        $consumo=CaixaModel::deleteConsumo($id);
        echo json_encode($consumo);
    }
    

    
}



?>