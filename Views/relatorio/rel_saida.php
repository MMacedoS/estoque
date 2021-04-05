<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        
    });
</script> -->



<?php 
// require_once 'Controllers/caixaController.php';
echo $inicio=$_GET['inicio'];
$fim=$_GET['fim'];
exit;
 include('pdf/mpdf.php');

//  $con = new SituacaoController();
$totalgeral=0;
 $pagina="";

$pagina.='<html>';

    $pagina.='<head>

    <style>

        

        #customers {

            // margin-top:3%;

            margin-top:5%;

            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;

            border-collapse: collapse;

            width: 100%;

            border: 1px solid #ddd;

        }

        

        #customers tr:nth-child(even) {

            background-color: #ffff99;

        }

        

        #customers tr:hover {

            background-color: #ddd;

        }

        

        #customers th {

            padding-top: 10px;

            padding-bottom: 10px;

            text-align: left;

            background-color: #4CAF50;

            color: white;

        }

        

        table,

        th,

        td {

            border: 1px solid black;

            white-space: nowrap;
            text-align:center;

        }

        .titulo{

            text-align:center;

        }

        .rodape{

            // margin-top:100px;

        }

        

    </style>

    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

    <title>Boletim Alunos</title>

</head>

';





$pagina.='<body>';
$pagina.=$inicio;
$dados=$this->buscaRelCaixa($_GET['inicio'],$_GET['fim']);
$data=explode("-",$dados[0]['abertura']);
$data=$data[2].'/'.$data[1].'/'.$data[0];
$pagina.='<table id="customers" width="100%">
<tr>
<th width="33%" colspan="3"  style="font-size: 24;" align="center"><strong>Saidas</strong></th> 
</tr>
<tr>
    <td width="50%">'.$dados[0]['caixa'].'</td>

    <td width="25%" align="center">'.$data.'</td>

    <td width="25%" style="text-align: right;"> Caldas do Jorro,Tucano-Ba</td>

</tr>
</table>

<h4>Consumo</h4>

';
   $pagina.='<table id="customers">';

            $pagina.='<tr>';
            $pagina.='<th>Descricao</th>';
            $pagina.='<th>Data</th>';
            $pagina.='<th>Produto</th>';
            $pagina.='<th>Quantidade</th>';
            $pagina.='<th>Valor</th>';
            $pagina.='<th>Total</th>';
            $pagina.='</tr>';
        foreach($dados as $key=>$value){
            $pagina.='<tr>';
            $pagina.='<td>'.$value['descricao'].'</td>';
            $pagina.='<td>'.$value['quantidade'].'</td>';
            $pagina.='<td>R$: '.$value['valor'].'</td>';
            $pagina.='<td> R$: '.number_format($value['valor']*$value['quantidade'],2).'</td>';
            $totalgeral+=number_format($value['valor']*$value['quantidade'],2);
            $pagina.='</tr>';
        }
            $pagina.="<tr>";
            $pagina.="<th>Valor Total do consumo: </th>";
            $pagina.='<th colspan="3" style="font-size:20px;text-align:center;background-color:#005f12;">R$: '.$totalgeral.'</th>';
            $pagina.="</tr>";
    $pagina.='</table>';
        



   

   

    $pagina.='</body>';



$pagina.='</html>';



$html=$pagina;



// echo $pagina;



// var_dump($clientes[1]);

// die




$mpdf = new \mPDF("utf-8", 'A4-P');
$mpdf->allow_charset_conversion = true;                                
$mpdf->pdf->charset_in = 'iso-8859-1';
$mpdf->DeflMargin = 3;

$mpdf->DefrMargin = 3;

$mpdf->SetTopMargin(3);

$mpdf->AddPage();



    $mpdf->WriteHTML($html);

    $mpdf->Ln(2);



$mpdf->Output('Boletim.pdf', 'I');




 

?>