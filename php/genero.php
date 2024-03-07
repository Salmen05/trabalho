<?php
include_once("../php/config/connection.php");
?>
<div style="display: flex; justify-content: end;">
  <a class="btn btn-secondary mt-3" data-bs-toggle="modal" data-bs-target="#registrar">Registrar</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Gênero</th>
      <th scope="col">Status</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php try {
      $conn = connection();
      $select = $conn->prepare("SELECT idgenero, genero, status FROM tbgenero");
      $conn->beginTransaction();
      $select->execute();
      $conn->commit();
      foreach ($select as $table) {
        $idgenero = $table['idgenero'];
        $genero = $table['genero'];
        $status = $table['status'];
    ?>
        <tr>
          <th scope="row"><?php echo ($idgenero) ?></th>
          <td><?php echo ($genero) ?></td>
          <td><?php echo ($status) ?></td>
          <td><a class="btn btn-primary me-3" data-bs-toggle="modal" data-bs-target="#alterar<?php echo ($idgenero) ?>">Alterar</a><a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletar<?php echo ($idgenero) ?>">Apagar</a></td>
        </tr>
        <form action="./query/update.php?idgenero=<?php echo ($idgenero) ?>" method="POST"> <!--Alter Modal-->
          <div class="modal fade" id="alterar<?php echo ($idgenero) ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label for="nomeGenero" class="form-label">Novo nome do gênero:</label>
                    <input type="text" class="form-control" id="nomeGenero" name="nomeGenero" placeholder="Novo nome:" value="<?php echo ($genero) ?>">
                  </div>
                  <select class="form-select" name="status" id="status">
                    <option selected value="<?php if ($status == 'A') {
                                              echo ('A');
                                            } else {
                                              echo ('I');
                                            } ?>"><?php
                                                  if ($status == 'A') {
                                                    $status = 'Ativo';
                                                  } else {
                                                    $status = 'Inativo';
                                                  }
                                                  echo $status; ?></option>
                    <?php if ($status == 'Ativo') { ?><option value="I">Inativo</option><?php } ?>
                    <?php if ($status == 'Inativo') { ?><option value="A">Ativo</option><?php } ?>
                  </select>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Alterar</button>
                </div>
              </div>
            </div>
          </div>
        </form>
        <div class="modal fade" id="deletar<?php echo ($idgenero) ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Deseja realmente deletar?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="./query/delete.php?idgenero=<?php echo ($idgenero) ?>" class="btn btn-danger">Deletar</a>
              </div>
            </div>
          </div>
        </div>

    <?php
      }
    } catch (PDOException $e) {
      echo ('ERROR - ' . $e->getMessage());
      $conn->rollBack();
    }
    ?>
  </tbody>
</table>
<form method="POST" action="redirect.php"> <!--Register Modal-->
  <div class="modal fade" id="registrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <form>
              <div class="col-md-12 mb-3">
                <label for="nome">Nome do gênero:</label>
                <input type="text" class="form-control" id="nomeGenero" name="nomeGenero" placeholder="Nome do gênero" aria-label="Nome do gênero" required="required">
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Registrar</button>
        </div>
      </div>
    </div>
  </div>
</form>