<?php
require_once "conexao.php";

class CaixaModel{

    public function CreateCaixa($apt){
        $con=new Conexao;
        $con->MontarConexao();
        $ap=$con->pdo->query("SELECT nome,status,caixa from apartamento where id_apt='$apt'");
        $ap=$ap->fetchAll(PDO::FETCH_ASSOC);
        $caixa=$ap[0]['nome'];
        $data=Date('Y-m-d');
        if($ap[0]['status']==0){
        $dados=$con->pdo->prepare('INSERT INTO caixa (caixa,abertura,status) values(:caixa,:abertura,:status)');
        $dados->bindValue(':caixa',$caixa);
        $dados->bindValue(':abertura',$data);
        $dados->bindValue(':status',0);
        $dados->execute();
        $dados = $con->pdo->lastInsertId();
        }else{
            $dados=$ap[0]['caixa'];
        }
        return $dados;
    }

    public function getConsumo($caixa){
        $con=new Conexao;
        $con->MontarConexao();
        $dados=$con->pdo->query("SELECT con.*,cai.caixa,p.descricao from consumo con inner join caixa cai on cai.id_caixa=con.id_caixa 
        inner join produto p on p.id_prod=con.produto where cai.id_caixa='$caixa'");
        $dados=$dados->fetchAll(PDO::FETCH_ASSOC);        
        return $dados;
    }
    function insertConsumo($produto,$quantidade,$valor,$caixa)
    {
        $con=new Conexao;
        $con->MontarConexao();
        $dados=$con->pdo->prepare('INSERT INTO consumo (produto,data,quantidade,valor,id_caixa) values(:produto,:data,:quantidade,:valor,:caixa)');
        $dados->bindValue(':produto',$produto);
        $dados->bindValue(':data',Date('Y-m-d'));
        $dados->bindValue(':quantidade',$quantidade);
        $dados->bindValue(':valor',$valor);
        $dados->bindValue(':caixa',$caixa);
        $dados=$dados->execute();    
        return $dados;
    }

    function fechamento($id)
    {
        $con=new Conexao;
        $con->MontarConexao();
        $dados=$con->pdo->prepare('UPDATE caixa set status=:status,fechamento=:fechamento where id_caixa=:caixa');
        $dados->bindValue(':caixa',$id);
        $dados->bindValue(':fechamento',Date('Y-m-d'));
        $dados->bindValue(':status','1');
        $dados=$dados->execute();    
        return $dados;
    }

    function deleteConsumo($id)
    {
        $con=new Conexao;
        $con->MontarConexao();
        $dados=$con->pdo->prepare('DELETE FROM consumo where id_consumo=:id');
        $dados->bindValue(':id',$id);
        $dados=$dados->execute();    
        return $dados;
    }
    function getConsById($id)
    {
        $con=new Conexao;
        $con->MontarConexao();
        $dados=$con->pdo->query("SELECT con.valor,con.quantidade,con.data,pro.descricao,cai.caixa,cai.abertura FROM consumo con INNER JOIN caixa cai on cai.id_caixa=con.id_caixa INNER JOIN produto pro on pro.id_prod=con.produto where con.id_caixa='$id'");
        $dados=$dados->fetchAll(PDO::FETCH_ASSOC);

        return $dados;
    }

    function getCaixa($status,$inicio,$fim)
    {
        $con=new Conexao;
        $con->MontarConexao();
        $dados=$con->pdo->query("SELECT * FROM caixa where status='1' and fechamento between '2021-03-29' and '2021-03-30'");
        $dados=$dados->fetchAll(PDO::FETCH_ASSOC);
        return $dados;
    }
}

?>