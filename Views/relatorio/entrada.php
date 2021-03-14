<?php 
include_once  ROOT_PATH."/Views/header.php";

?>
<div class="col main pt-5 mt-3">
<!-- div acima para organizar junto com o menu -->
<nav class="navbar navbar-light bg-light justify-content-between col-lg-12 col-md-8">
        <a class="navbar-brand">Entradas</a>
        <form class="form-inline">
            <label for="data_inicio"></label>
            <input type="date" id="data_inicio" class="form-control ml-4 mr-4" value="<?=Date('Y-m-d')?>">
            <label for="data_fim">até</label>
            <input type="date" id="data_fim" class="form-control ml-4 mr-4" value="<?=Date('Y-m-d')?>">
            <button class="btn btn-outline-danger my-2 my-sm-0 mr-5" onclick="buscar(event);">Buscar</button>
            <!-- <button class="btn btn-outline-primary my-2 my-sm-0 mr-5" onclick="addModal(event);">Adicionar</button> -->
            <!-- <input class="form-control mr-sm-2" type="search" placeholder="pesquisa" id="busca" onkeyup="buscar();" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" onclick="buscar();" type="button">Pesquisar</button> -->
        </form>
    </nav>

</div>
            <!--/row-->

 <?php 
include_once ROOT_PATH."/Views/footer.php";
?>

<script>
function dataAtualFormatada(){
    var data = new Date(),
        dia  = data.getDate().toString(),
        diaF = (dia.length == 1) ? '0'+dia : dia,
        mes  = (data.getMonth()+1).toString(), //+1 pois no getMonth Janeiro começa com zero.
        mesF = (mes.length == 1) ? '0'+mes : mes,
        anoF = data.getFullYear();
    return diaF+"/"+mesF+"/"+anoF;
}

function buscar(event){
    event.preventDefault();
    var inicio=$('#data_inicio').val();
    var fim=$('#data_fim').val();

   window.open("<?=$path?>/estoque/Views/relatorio/relatorio.php?inicio="+inicio+"&fim="+fim,"_blank");
}
</script>

