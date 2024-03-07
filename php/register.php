<?
session_start()
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastrar</title>
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="../css/style.css">
  <script src="../js/bootstrap.js"></script>
  <script scr="../js/script.js"></script>

<body style="display: flex; align-items: center; justify-content: center; height: 100vh; margin: 0;">
  <div class="card" style="width: 30rem;">
    <form action="./redirect.php" method="POST">
      <h5 class="card-header" style="text-align: center;">Registre-se gratuitamente</h5>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12 mb-3">
            <label for="nome">Seu nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" aria-label="Nome" required="required">
          </div>
          <div class="col-md-12 mb-3">
            <label for="email">Insira seu endereço de email:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" aria-label="Email" required="required">
          </div>
          <div class="col-md-12 mb-3">
            <label for="password">Insira sua senha:</label>
            <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" aria-label="Senha" required="required">
          </div>
          <div class="col-md-7 mb-3">
            <label for="nascimento">Marque sua data de nascimento:</label>
            <input type="date" class="form-control" id="nascimento" name="nascimento" placeholder="Data de nascimento" aria-label="Data de nascimento" required="required">
          </div>
          <div class="col-md-5 mb-3">
            <label for="password">Insira seu CPF:</label>
            <input type="number" class="form-control" id="cpf" name="cpf" placeholder="CPF" aria-label="CPF" required="required">
          </div>
          <div class="col-md-12 mb-3">
            <input type="checkbox" class="form-check-input" id="accept" name="accept" required="required">
            <label for="accept">Aceito os termos de serviço</label>
          </div>
        </div>
        <div style="display: flex; justify-content: end">
          <button type="submit" class="btn btn-primary mt-3">Registrar</button>
        </div>
      </div>
    </form>
</body>

</html>