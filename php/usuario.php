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
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">CPF</th>
      <th scope="col">Nascimento</th>
      <th scope="col">Nível</th>
      <th scope="col">Status</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $select = $conn->prepare("SELECT idusuario, nome, email, cpf, nascimento, nivel, status FROM tbusuario");
    $conn->beginTransaction();
    $select->execute();
    $conn->commit();
    foreach ($select as $table) {
      $idusuario = $table['idusuario'];
      $nome = $table['nome'];
      $email = $table['email'];
      $cpf = $table['cpf'];
      $nascimento = $table['nascimento'];
      $nivel = $table['nivel'];
      $status = $table['status'];
    ?>
      <tr>
        <th scope="row"><?php echo ($idusuario) ?></th>
        <td><?php echo ($nome) ?></td>
        <td><?php echo ($email) ?></td>
        <td><?php echo ($cpf) ?></td>
        <td><?php echo ($nascimento) ?></td>
        <td><?php echo ($nivel) ?></td>
        <td><?php echo ($status) ?></td>
        <td><a class="btn btn-primary me-3" data-bs-toggle="modal" data-bs-target="#alterar<?php echo ($idusuario) ?>">Alterar</a><a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletar<?php echo ($idusuario) ?>">Apagar</a></td>
      </tr>
      <form action="./query/update.php?idusuario=<?php echo ($idusuario) ?>" method="POST">
        <div class="modal fade" id="alterar<?php echo ($idusuario) ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Alterar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="col-md-12 mb-3">
                  <label for="nome">Novo nome:</label>
                  <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" aria-label="Nome" value="<?php echo ($nome) ?>">
                </div>
                <div class="col-md-12 mb-3">
                  <label for="email">Novo email:</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" aria-label="Email" value="<?php echo ($email) ?>">
                </div>
                <label for="heck">Novo nível de usuário:</label>
                <select class="form-select mb-3" aria-label="Níveis" id="nivel" name="nivel">
                  <option value="<?php switch ($nivel) {
                                    case 'Cliente':
                                      echo ('Cliente');
                                      break;
                                    case 'Adm':
                                      echo ('Adm');
                                      break;
                                    case 'Usuario':
                                      echo ('Usuario');
                                      break;
                                  } ?>" selected><?php switch ($nivel) {
                                                    case 'Cliente':
                                                      echo ('Cliente');
                                                      break;
                                                    case 'Adm':
                                                      echo ('Adm');
                                                      break;
                                                    case 'Usuario':
                                                      echo ('Usuario');
                                                      break;
                                                  }
                                                  switch ($nivel) {
                                                    case 'Cliente': ?>
                  <option value="Usuario">Usuario</option>
                  <option value="Adm">Adm</option>
                <?php
                                                      break;
                                                    case 'Adm':
                ?>
                  <option value="Usuario">Usuario</option>
                  <option value="Cliente">Cliente</option>
                <?php
                                                      break;
                                                    case 'Usuario':
                ?>
                  <option value="Adm">Adm</option>
                  <option value="Cliente">Cliente</option>
              <?php
                                                      break;
                                                  }

              ?></option>
                </select>
                <label for="status">Atividade no sistema:</label>
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
                <button type="submit" class="btn btn-primary">Alterar</a>
              </div>
            </div>
          </div>
        </div>
      </form>
      <div class="modal fade" id="deletar<?php echo ($idusuario) ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <a href="./query/delete.php?idusuario=<?php echo ($idusuario) ?>" class="btn btn-danger">Deletar</a>
            </div>
          </div>
        </div>
      </div>
    <?php
    }
    ?>
  </tbody>
</table>

<!-- Modal Register -->
<form method="POST" action="redirect.php">
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
                <label for="nome">Seu nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" aria-label="Nome" required="required">
              </div>
              <div class="col-md-12 mb-3">
                <label for="email">Insira seu endereço de email:</label>
                <input type="email" class="form-control" id="emailaa" name="emailaa" placeholder="Email" aria-label="Email" required="required">
              </div>
              <div class="col-md-12 mb-3">
                <label for="password">Insira sua senha:</label>
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" aria-label="Senha" required="required">
              </div>
              <div class="col-md-6 mb-3">
                <label for="nascimento">Sua data de nascimento:</label>
                <input type="date" class="form-control" id="nascimento" name="nascimento" placeholder="Data de nascimento" aria-label="Data de nascimento" required="required">
              </div>
              <div class="col-md-6 mb-3">
                <label for="password">Insira seu CPF:</label>
                <input type="number" class="form-control" id="cpf" name="cpf" placeholder="CPF" aria-label="CPF" required="required">
              </div>
              <div class="col-md-12 mb-3">
                <input type="checkbox" class="form-check-input" id="accept" name="accept" required="required">
                <label for="accept">Aceito os termos de serviço</label>
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