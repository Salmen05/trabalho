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
  <script src="../js/script.js"></script>
 
<body style="display: flex; align-items: center; justify-content: center; height: 100vh; margin: 0;">
  <div class="card" style="width: 30rem;">
    <form action="./redirect.php" method="POST">
      <h5 class="card-header" style="text-align: center;">Registre-se gratuitamente</h5>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12 mb-3">
            <label for="email">Insira seu email:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" aria-label="Email" required="required">
          </div>
          <div class="col-md-12 mb-3">
            <label for="senha">Insira sua senha:</label>
            <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" aria-label="Senha" required="required">
          </div>
        </div>
        <div style="display: flex; justify-content: end">
          <button type="button" class="btn btn-primary mt-3" onclick="fazerLogin()">Logar</button>
        </div>
      </div>
    </form>
    <div class="alert alert-light" role="alert" style="display: none" id="log" name="log">A simple light alert—check it out!</div>
    <div id="cu"></div>
  </div>
</body>

</html>