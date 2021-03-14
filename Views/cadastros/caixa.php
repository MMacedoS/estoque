<?php 
include_once  ROOT_PATH."/Views/header.php";

?>
<div class="col main pt-5 mt-3">
    <nav class="navbar navbar-light bg-light justify-content-between col-lg-12 col-md-8">
        <a class="navbar-brand">Caixa </a>
        <form class="form-inline">
            <a class="btn btn-outline-primary my-2 my-sm-0 mr-5" type="submit" href="/estoque/caixa/lista/<?=$caixa?>" id="add">ADD</a>
            <input class="form-control mr-sm-2" type="search" placeholder="pesquisa" id="busca" onkeyup="buscar();" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" onclick="buscar();" type="button">Pesquisar</button>
        </form>
    </nav>

    <div class="col-lg-12 col-md-8">
        <div class="table-responsive" id="lista">
        <table class="table table-striped">
                <thead class="thead-inverse">
                
                    <tr>
                        <th>Descicao</th>
                        <th>quatidade</th>
                        <th>Valor</th>
                        <th>Ações</th>
                    </tr>
               
                </thead>
                <tbody>
               <?php 
               $total=0.0;
               foreach($this->dados as $value){
                   $total+=$value['valor'];
                   ?>
               
                    <tr>

                        <td id="codigo"><?=$value['descricao']?></td>
                        <td><?=$value['quantidade']?></td>
                        <td>R$: <?=$value['valor']?></td>
                        <td><button class="btn btn-danger" onclick="remover('<?=$value['id_consumo']?>');">&#9746;</button></td>
                    </tr>
                    <?php }?>
                    
                </tbody>
                </table>                
        </div>
        <div class="row">
                <h3>Valor Total do consumo: R$: <?=number_format($total,2,',','')?></h3>
                <div class="col">
                    <button class="btn btn-warning float-right" onclick="fechar(event)">Finalizar Caixa</button>
                </div>
        </div>
    </div>









    <!-- <form>
  <div class="row">
    <div class="col">
      <input type="text" class="form-control" placeholder="First name">
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Last name">
    </div>
  </div>
</form> -->


</div>

<!-- Modal -->
<div class="modal fade" id="myCadastrar" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Categoria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_categorias" enctype="multipart/form-data">
                    <div class="row">
                    <input type="hidden" name="id" id="id">
                        <div class="col">
                        <label for="">Categoria</label>
                            <input type="text" class="form-control" id="categoria" name="categoria" placeholder="nome da categoria">
                        </div>
                        <div class="col-sm-2">
                        <label for="">Ativo</label>
                            <input type="checkbox" id="status" class="form-control" checked value="true" onclick="ativo();" name="status">
                        </div>                        
                    </div>
                    <div class="row">
                    <div class="col mt-2">
                        <label for="">Imagem</label>
                        <input type="file" name="imagem" class="imagem" id="imagem">
                        <img class="preview-img" id="preview" src="" style="width:40%">
                    </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" onclick="cadastrar();" data-dismiss="modal">CADASTRAR</button>
            </div>
        </div>
    </div>
</div>

<script>

function fechar(event)
{
    event.preventDefault();
    $.ajax({
        method:'POST',
        url:'<?=$path?>/estoque/caixa/fechar_estoque/<?=$caixa?>',
    }).done(function(response){
        window.location.href="<?=$path?>/estoque";
    });
}

function remover(id)
{
    // event.preventDefault();
    $.ajax({
        method:'POST',
        url:'<?=$path?>/estoque/caixa/remover_produto/'+id,
    }).done(function(response){
        window.location.reload();
    });
}

</script>
<?php 
include_once ROOT_PATH."/Views/footer.php";
?>


