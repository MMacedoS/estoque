<?php

class CadastroController extends Controller
{
    public function Produto()
    {
        $this->mostrarView('produtos');
    }
    public function Categoria()
    {
        $this->mostrarView('categorias');
    }
    public function Buscar_Categoria()
    {   if(@$_POST['dados']){
        $dados=array("nome"=>"Mauricio","idade"=>"26","cerveja"=>"gosto","trabalho"=>"professor");
    }else{
        $dados=array( array("codigo"=>"000001","nome"=>"Joao","idade"=>"26","cerveja"=>"gosto","trabalho"=>"professor"),
        array("codigo"=>"000002","nome"=>"Rose","idade"=>"24","cerveja"=>"gosto","trabalho"=>"professor"),
        array("codigo"=>"000003","nome"=>"Marcos","idade"=>"27","cerveja"=>"gosto","trabalho"=>"professor"),
        array("codigo"=>"000004","nome"=>"Bruno","idade"=>"26","cerveja"=>"gosto","trabalho"=>"professor"),
        array("codigo"=>"000005","nome"=>"Agenor","idade"=>"26","cerveja"=>"gosto","trabalho"=>"professor"));
        
    }

        
        echo json_encode($dados);
    
    }

    public function Cliente()
    {
        $this->mostrarView('clientes');
    }
}