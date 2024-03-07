<?php

declare(strict_types=1);
session_start();
require_once("../php/config/connection.php");
$conn = connection();
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MovieHell</title>
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="../css/style.css">
  <script src="../js/bootstrap.js" defer></script>
</head>

<body>
  <nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
      <div style="width: 75px; display: flex">
        <img src="../img/logo.png" class="img-fluid" style="display: inline;" alt="">
      </div>
      <div style="display: flex;">
        <h5 style="display: inline;" class="me-3 mt-1">User</h5>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation" class="display: inline;">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu Lateral</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria_current="page" href="../php/login.php">Fazer login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria_current="page" href="../php/register.php">Cadastrar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria_current="page" href="../php/adm.php">ADM Page</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Tabelas
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="adm.php?page=usuario">Usuários</a></li>
                <li><a class="dropdown-item" href="adm.php?page=genero">Gêneros</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Categorias
              </a>
              <ul class="dropdown-menu">
                <?php
                try {
                  $select = "SELECT g.genero FROM tbgenero g";
                  $select = $conn->prepare($select);
                  $conn->beginTransaction();
                  $select->execute();
                  $conn->commit();

                  foreach ($select as $table) {
                    $genero = $table['genero'];
                ?>
                    <li><a class="dropdown-item" href="index.php?page=<?php echo ($genero); ?>"><?php echo ($genero); ?></a></li>
                <?php
                  }
                } catch (PDOException $e) {
                  echo ('ERROR - ' . $e->getMessage());
                  $conn->rollBack();
                }
                ?>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <div class="container">
    <?php
    if (isset($_GET['page'])) {
      if ($_GET['page'] == 'usuario') {
        include_once("usuario.php");
      } else if ($_GET['page'] == 'genero') {
        include_once("genero.php");
      }
    }
    ?>
  </div>
</body>

</html>