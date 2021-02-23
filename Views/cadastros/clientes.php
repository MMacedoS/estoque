<?php 
include_once  ROOT_PATH."/Views/header.php";

?>
<div class="col main pt-5 mt-3">
    <nav class="navbar navbar-light bg-light justify-content-between col-lg-12 col-md-8">
        <a class="navbar-brand">Lista de Categorias</a>
        <form class="form-inline">
            <button class="btn btn-outline-primary my-2 my-sm-0 mr-5" onclick="addModal(event);">Adicionar</button>
            <input class="form-control mr-sm-2" type="search" placeholder="pesquisa" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
        </form>
    </nav>

    <div class="col-lg-12 col-md-8">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-inverse">
                
                    <tr>
                        <th>Cód</th>
                        <th>Nome</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
               
                </thead>
                <tbody>
                <?php for($i=0;$i<=10;$i++){?>
                    <tr>
                        <td id="codigo">1,001<?=$i?></td>
                        <td>responsive<?=$i?></td>
                        <td>bootstrap</td>
                        <td><button onclick="editar(this,1);">&#9998;</button></td>
                       
                    </tr>
                    <?php }?>
                </tbody>
            </table>
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
                <form>
                    <div class="row">
                        <div class="col">
                        <label for="">Categoria</label>
                            <input type="text" class="form-control" placeholder="nome da categoria">
                        </div>
                        
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" data-dismiss="modal">CADASTRAR</button>
            </div>
        </div>
    </div>
</div>

<?php 
include_once ROOT_PATH."/Views/footer.php";
?>

<script>
function addModal(event) {
    event.preventDefault();
    $('#myCadastrar').modal('show');
}

function editar(obj,param){
  var column = $(obj).parents("tr").find("td:nth-child(" + param + ")");
  var dados = column.html();
  console.log(column.html());
     
}


</script>