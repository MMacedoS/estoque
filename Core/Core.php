<?php
class Core {
    public function __construct(){
        $this->run();
    }

    public function run()
    {
        $parametros=[];
        if(isset($_GET['pag']))
        {
            $url=$_GET['pag'];
        }if(isset($_POST['cadastro'])){
            $url=$_POST['cadastro'];
            exit;
        }

        if(!empty($url))
        {
            $url=explode("/",$url);
            $controller=$url[0]."Controller";
            
            array_shift($url);

            if(!empty($url) && isset($url[0]))
            {
                $metodo= $url[0];
                array_shift($url);
            }else{
                $metodo="index";
            }
            if(count($url)>0)
            {
                $parametros=$url;
            }
        }else
        {
            $controller="HomeController";
            $metodo="index";
        }
        $caminho="Estoque/Controllers/".$controller.".php";

        if(!file_exists($caminho)&& !method_exists($controller,$metodo))
        {
            $controller="HomeController";
            $metodo="index";
        }

        $control= new $controller;
        
        call_user_func_array(array($control,$metodo),$parametros);
       

    }
}
?>