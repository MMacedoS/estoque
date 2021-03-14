<?php
    require_once "./Models/categorias.php";
    require_once "./Models/produtos.php";
    require_once "./Models/apartamentoModel.php";

    

class CadastroController extends Controller
{
// PRODUTOS
    public function Produto()
    {
        $this->mostrarView('produtos','','','');
    }
    public function Buscar_Produtos()
    {   
        
        if(@$_POST['dados']){           
            $this->produtos=Produtos::getIdProdutos($_POST['dados']);
        }elseif(@$_POST['busca'])
        {
            $this->produtos=Produtos::getNomeProdutos($_POST['busca']);
        }
        else{
            
            $this->produtos=Produtos::getProdutos();
        
        }       
        echo json_encode($this->produtos);
    }

    public function inserir_Produtos()
    {   
          /* formatos de imagem permitidos */
                $permitidos = array(".jpg",".jpeg",".gif",".png", ".bmp");
                if(isset($_POST)){
                    $nome_imagem    = $_FILES['imagem']['name'];
                    $tamanho_imagem = $_FILES['imagem']['size'];
                    /* pega a extensão do arquivo */
                    $ext = strtolower(strrchr($nome_imagem,"."));
                    /*  verifica se a extensão está entre as extensões permitidas */
                    if(in_array($ext,$permitidos)){
                        /* converte o tamanho para KB */
                        $tamanho = round($tamanho_imagem / 1024);
                        if($tamanho < 1024){ //se imagem for até 1MB envia
                            $nome_atual = md5(uniqid(time())).$ext;
                            //nome que dará a imagem
                            $tmp = $_FILES['imagem']['tmp_name'];
                            //caminho temporário da imagem
                            /* se enviar a foto, insere o nome da foto no banco de dados */
                            if(move_uploaded_file($tmp,ASSETS.$nome_atual))
                                {
                                
                                $this->produtos=Produtos::insertProdutos($_POST['descricao'],$_POST['status'],$nome_atual,$_POST['fornecedor'],$_POST['precoVenda'],$_POST['precoCompra'],$_POST['categoria'],$_POST['quantidade']);
                                echo json_encode($this->produtos);
                            }else{
                                echo "Falha ao enviar";
                                
                                }
                        }else{
                            echo "A imagem deve ser de no máximo 1MB";
                            }
                    }else{
                        echo "Somente são aceitos arquivos do tipo Imagem";
                        }
                }else{
                    echo "Selecione uma imagem";
                    exit;
                    }
    }

    public function update_Produtos()
    {   
        /* formatos de imagem permitidos */
        $permitidos = array(".jpg",".jpeg",".gif",".png", ".bmp");
        if(isset($_POST)){
            if($_FILES['imagem']['name']!=''){
            $nome_imagem    = $_FILES['imagem']['name'];
            $tamanho_imagem = $_FILES['imagem']['size'];
            /* pega a extensão do arquivo */
            $ext = strtolower(strrchr($nome_imagem,"."));
            /*  verifica se a extensão está entre as extensões permitidas */
            if(in_array($ext,$permitidos)){
                /* converte o tamanho para KB */
                $tamanho = round($tamanho_imagem / 1024);
                if($tamanho < 1024){ //se imagem for até 1MB envia
                    $nome_atual = md5(uniqid(time())).$ext;
                    //nome que dará a imagem
                    $tmp = $_FILES['imagem']['tmp_name'];
                    //caminho temporário da imagem
                    /* se enviar a foto, insere o nome da foto no banco de dados */
                    if(move_uploaded_file($tmp,ASSETS.$nome_atual))
                        {
                    $this->produtos=Produtos::updateProdutos($_POST['descricao'],$_POST['status'],$nome_atual,$_POST['fornecedor'],$_POST['precoVenda'],$_POST['precoCompra'],$_POST['categoria'],$_POST['quantidade'],$_POST['id']);     
                    echo json_encode($this->produtos);
                }else{
                    echo "Falha ao enviar";
                    
                    }
            }else{
                echo "A imagem deve ser de no máximo 1MB";
                }
        }else{
            echo "Somente são aceitos arquivos do tipo Imagem";
            }
        }else{
            $this->produtos=Produtos::updateProdutos($_POST['descricao'],$_POST['status'],'',$_POST['fornecedor'],$_POST['precoVenda'],$_POST['precoCompra'],$_POST['categoria'],$_POST['quantidade'],$_POST['id']);     
            echo json_encode($this->produtos);
           }
    }else{
        echo "Selecione uma imagem";
        exit;
        }
    }


// CATEGORIAS
    public function Categoria()
    {
        $this->mostrarView('categorias','','','');
    }
    public function Buscar_Categoria()
    {   
        
        if(@$_POST['dados']){           
            $this->categorias=Categorias::getIdCategorias($_POST['dados']);
        }elseif(@$_POST['busca'])
        {
            $this->categorias=Categorias::getNomeCategorias($_POST['busca']);
        }
        else{
            
            $this->categorias=Categorias::getCategorias();
        
        }       
        echo json_encode($this->categorias);
    }

    public function inserir_Categoria()
    {   
          /* formatos de imagem permitidos */
                $permitidos = array(".jpg",".jpeg",".gif",".png", ".bmp");
                if(isset($_POST)){
                    $nome_imagem    = $_FILES['imagem']['name'];
                    $tamanho_imagem = $_FILES['imagem']['size'];
                    /* pega a extensão do arquivo */
                    $ext = strtolower(strrchr($nome_imagem,"."));
                    /*  verifica se a extensão está entre as extensões permitidas */
                    if(in_array($ext,$permitidos)){
                        /* converte o tamanho para KB */
                        $tamanho = round($tamanho_imagem / 1024);
                        if($tamanho < 1024){ //se imagem for até 1MB envia
                            $nome_atual = md5(uniqid(time())).$ext;
                            //nome que dará a imagem
                            $tmp = $_FILES['imagem']['tmp_name'];
                            //caminho temporário da imagem
                            /* se enviar a foto, insere o nome da foto no banco de dados */
                            if(move_uploaded_file($tmp,ASSETS.$nome_atual))
                                {

                                $this->categorias=Categorias::insertCategorias($_POST['categoria'],$_POST['status'],$nome_atual);     
                                echo json_encode($this->categorias);
                            }else{
                                echo "Falha ao enviar";
                                
                                }
                        }else{
                            echo "A imagem deve ser de no máximo 1MB";
                            }
                    }else{
                        echo "Somente são aceitos arquivos do tipo Imagem";
                        }
                }else{
                    echo "Selecione uma imagem";
                    exit;
                    }
    }

    public function update_Categoria()
    {   
        /* formatos de imagem permitidos */
        $permitidos = array(".jpg",".jpeg",".gif",".png", ".bmp");
        if(isset($_POST)){
            if($_FILES['imagem']['name']!=''){
            $nome_imagem    = $_FILES['imagem']['name'];
            $tamanho_imagem = $_FILES['imagem']['size'];
            /* pega a extensão do arquivo */
            $ext = strtolower(strrchr($nome_imagem,"."));
            /*  verifica se a extensão está entre as extensões permitidas */
            if(in_array($ext,$permitidos)){
                /* converte o tamanho para KB */
                $tamanho = round($tamanho_imagem / 1024);
                if($tamanho < 1024){ //se imagem for até 1MB envia
                    $nome_atual = md5(uniqid(time())).$ext;
                    //nome que dará a imagem
                    $tmp = $_FILES['imagem']['tmp_name'];
                    //caminho temporário da imagem
                    /* se enviar a foto, insere o nome da foto no banco de dados */
                    if(move_uploaded_file($tmp,ASSETS.$nome_atual))
                        {
                    $this->categorias=Categorias::updateCategorias($_POST['categoria'],$_POST['status'],$_POST['id'],$nome_atual);     
                    echo json_encode($this->categorias);
                }else{
                    echo "Falha ao enviar";
                    
                    }
            }else{
                echo "A imagem deve ser de no máximo 1MB";
                }
        }else{
            echo "Somente são aceitos arquivos do tipo Imagem";
            }
        }else{
            $this->categorias=Categorias::updateCategorias($_POST['categoria'],$_POST['status'],$_POST['id'],'');     
            echo json_encode($this->categorias);
           }
    }else{
        echo "Selecione uma imagem";
        exit;
        }
    }


    public function Cliente()
    {
        $this->mostrarView('clientes','','','');
    }

    public function Apartamento()
    {
        $this->mostrarView('apartamentos','','','');
    } 
    
    public function Buscar_Apt()
    {   
        
        if(@$_POST['dados']){           
            $this->apts=Apartamentos::getIdApt($_POST['dados']);
        }elseif(@$_POST['busca'])
        {
            $this->apts=Apartamentos::getNomeApt($_POST['busca']);
        }
        else{
            
            $this->apts=Apartamentos::getApt();
        
        }       
        echo json_encode($this->apts);
    }
    public function inserir_Apt()
    {   
        $this->apts=Apartamentos::insertApt($_POST['nome'],$_POST['status']);     
        echo json_encode($this->apts);
    }

    public function update_Apt()
    {   
        $this->apts=Apartamentos::updateApt($_POST['nome'],$_POST['status'],$_POST['id']);     
        echo json_encode($this->apts);
    }



}