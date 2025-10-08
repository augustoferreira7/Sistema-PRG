<?php
$pag = "clientes";
    require_once("../conexao.php");
?>

<div class="mt-3 mb-3">
    <a href="index.php?pag=<?php echo $pag ?>&funcao=novo">
         <button type="button" class="btn btn-success">Novo cliente</button>
    </a>
   
</div>

<table class="table table-striped" id="myTable">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">CPF</th>
      <th scope="col">Telefone</th>
      <th scope="col">Email</th>
      <th scope="col">Endereços</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php
        //Seleciona os dados no banco
        $query = $pdo->query("SELECT * FROM clientes order by id desc");
        //Executa a consulta
        $res = $query->fetchAll(PDO::FETCH_ASSOC);

        for($i=0; $i < count($res); $i++){
            $id = $res[$i]['id'];
            $nome = $res[$i]['nome'];
            $cpf = $res[$i]['cpf'];
            $telefone = $res[$i]['telefone'];
            $email = $res[$i]['email'];
            $endereco = $res[$i]['endereco'];
        
    ?>
    <tr>
        <td><?php echo $id; ?></td>
        <td><?php echo $nome; ?></td>
        <td><?php echo $cpf; ?></td>
        <td><?php echo $telefone; ?></td>
        <td><?php echo $email; ?></td>
        <td><?php echo $endereco; ?></td>
        <td>
            <a href="index.php?pag=<?php echo $pag ?>&funcao=editar&id=<?php echo $id ?>" title="Editar Dados"><i class="fa-solid fa-pen-to-square"></i></a>
            <a href="index.php?pag=<?php echo $pag ?>&funcao=excluir&id=<?php echo $id ?>"><i class="fa-solid fa-trash" title="Excluir Dados" style="color: #FF0000"></i></a>
        </td>
    </tr>
    <?php } ?>
  </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="modalDados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <?php
            if(@$_GET['funcao'] == 'editar'){
                $titulo = "Editar Registro";
                $id2 = $_GET['id'];
                
                $query = $pdo->query("SELECT * FROM clientes WHERE id = '$id2'");
                $res = $query->fetchAll(PDO::FETCH_ASSOC);

                $nome2 = $res[0]['nome'];
                $cpf2 = $res[0]['cpf'];
                $telefone2 = $res[0]['telefone'];
                $email2 = $res[0]['email'];
                $endereco2 = $res[0]['endereco'];
            }else{
                $titulo = "Inserir Registro";
            }
        ?>
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $titulo; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form" method="post">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input value="<?php echo @$nome2; ?>" type="text" class="form-control" id="nome" name="nome" placeholder="Nome Completo">
            </div>
            <div class="form-group">
                <label for="cpf">CPF</label>
                <input value="<?php echo @$cpf2; ?>" type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF">
            </div>
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input value="<?php echo @$telefone2; ?>" type="tel" class="form-control" id="telefone" name="telefone" placeholder="Telefone">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input value="<?php echo @$email2; ?>" type="email" class="form-control" id="email" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="endereco">Endereço</label>
                <input value="<?php echo @$endereco2; ?>" type="endereco" class="form-control" id="endereco" name="endereco" placeholder="Endereço">
            </div>
            <small>
                <div id="mensagem">
                    
                </div>
            </small>
      </div>
      <div class="modal-footer">
        <input value="<?php echo @$_GET['id']; ?>" type="hidden" name="txtid2" id="txtid2">
        <button type="button" id="btn-fechar" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" id="btn-salvar" class="btn btn-primary">Salvar</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- modal para excluir -->
<div class="modal fade" tabindex="-1" id="modalExcluir">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Excluir Registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Deseja excluir este registro?</p>
        <div aling="center" id="mensagem-excluir"></div>
      </div>
      <div class="modal-footer">
        <button type="button" id="btn-cancelar-excluir" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

        <form method="post">
          <input type="hidden" id="id" name="id" value="<?php echo @$_GET['id']?>">
          <button type="button" id="btn-excluir" class="btn btn-danger">Excluir</button>
        </form>
        
      </div>
    </div>
  </div>
</div>

<?php
    if(@$_GET["funcao"] != null && @$_GET["funcao"] == "novo"){
        echo "<script>$('#modalDados').modal('show');</script>";
    }

    if(@$_GET["funcao"] != null && @$_GET["funcao"] == "editar"){
        echo "<script>$('#modalDados').modal('show');</script>";
    }

    if(@$_GET["funcao"] != null && @$_GET["funcao"] == "excluir"){
        echo "<script>$('#modalExcluir').modal('show');</script>";
    }

?>

<script>
    $(document).ready(function(){
        var pag = "<?=$pag?>";
        $('#btn-salvar').click(function(event){
            event.preventDefault();
            $.ajax({
                url: pag + "/inserir.php",
                method: "post",
                data: $('form').serialize(),
                dataType: "text",
                success: function(mensagem){
                    $('#mensagem').removeClass()
                    if(mensagem == 'Salvo com Sucesso!'){
                        $('#mensagem').addClass('mensagem-sucesso');
                        $('#btn-fechar').click();
                        window.location = "index.php?pag=" + pag;
                    }else{
                        $('#mensagem').addClass('mensagem-erro');
                    }
                    $('#mensagem').text(mensagem);
                }
            })
        })
    })
</script>

<script>
    $(document).ready(function(){
        var pag = "<?=$pag?>";
        $('#btn-excluir').click(function(event){
            event.preventDefault();
            $.ajax({
                url: pag + "/excluir.php",
                method: "post",
                data: $('form').serialize(),
                dataType: "text",
                success: function(mensagem){
                    $('#mensagem_excluir').removeClass()
                    if(mensagem == 'Excluído com Sucesso!'){
                        $('#mensagem_excluir').addClass('mensagem-sucesso');
                        $('#btn-cancelar-excluir').click();
                        window.location = "index.php?pag=" + pag;
                    }else{
                        $('#mensagem_excluir').addClass('mensagem-erro');
                    }
                    $('#mensagem_excluir').text(mensagem);
                }
            })
        })
    })
</script>

