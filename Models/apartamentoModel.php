<?php
require_once "conexao.php";
class Apartamentos
{
    private $con;

   public function getApt()
    {        
    $con = new Conexao;
    $con->MontarConexao();
    $dados =array();
    $cmd=$con->pdo->query("SELECT nome,status,id_apt FROM apartamento order by id_apt asc");
    $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
    return $dados;
    }
    public function getIdApt($id)
    {
        $con = new Conexao;
        $con->MontarConexao();
        $dados =array();
        $cmd=$con->pdo->prepare("SELECT nome,status,id_apt FROM apartamento where id_apt=:id order by id_apt desc");
        $cmd->bindValue(':id',$id);
        $cmd->execute();
        $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $dados;

    }
    public function getNomeApt($nome)
    {
        $con = new Conexao;
        $con->MontarConexao();
        $dados =array();
        $cmd=$con->pdo->prepare("SELECT nome,status,id_apt FROM apartamento where nome like :nome order by id_apt desc");
        $cmd->bindValue(':nome',"%".$nome."%");
        $cmd->execute();
        $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $dados;

    }
    
    public function insertApt($nome,$status)
    {     $dados =array();   
        $con = new Conexao;
        $con->MontarConexao();        
        $cmd=$con->pdo->prepare("INSERT INTO apartamento(nome,status) values(:nome,:status)");
        $cmd->bindValue(":nome",$nome);
        $cmd->bindValue(":status",$status);
        $dados=$cmd->execute();
        // $dados = $cmd;
        return $dados;
        
    }
    public function updateApt($nome,$status,$id)
    {     $dados =array();   
        $con = new Conexao;
        $con->MontarConexao();  

        if($nome==''){
            $cmd=$con->pdo->prepare("UPDATE apartamento set caixa=:caixa, status=:status where id_apt=:id");
            $cmd->bindValue(":caixa",$status);
            $cmd->bindValue(":status",1);
            $cmd->bindValue(":id",$id);
            
        }else{
            $cmd=$con->pdo->prepare("UPDATE apartamento set nome=:nome,status=:status where id_apt=:id");
            $cmd->bindValue(":nome",$nome);
            $cmd->bindValue(":status",$status);
            $cmd->bindValue(":id",$id);
            
        }
        
    $dados=$cmd->execute();
        return $dados;
        
    }
}


?>