<?php

declare(strict_types=1);
session_start();
require_once("./php/config/connection.php");
$conn = connection();
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MovieHell</title>
  <link rel="stylesheet" href="./css/bootstrap.css">
  <link rel="stylesheet" href="./css/style.css">
  <script src="./js/bootstrap.js" defer></script>
</head>

<body>
  <nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
      <div style="width: 75px; display: flex">
        <img src="./img/logo.png" class="img-fluid" style="display: inline;" alt="">
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
              <a class="nav-link active"  aria_current="page" href="./php/login.php">Fazer login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active"  aria_current="page" href="./php/register.php">Cadastrar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active"  aria_current="page" href="./php/adm.php">ADM Page</a>
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
  <div id="carouselExampleIndicators" class="carousel slide mb-3" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="./img/banner/movieHell.jpg" class="d-block w-100" data-bs-interval="10w00" alt="...">
      </div>
      <?php
      try {
        $select = "SELECT (b.foto) FROM tbbanner b";
        $select = $conn->prepare($select);
        $conn->beginTransaction();
        $select->execute();
        $conn->commit();
        foreach ($select as $table) {
          $foto = $table[ 'foto'];
      ?>
          <div class="carousel-item">
            <img src="./img/banner/<?php echo ($foto); ?>" class="d-block w-100" data-bs-interval="1000" alt="...">
          </div>
      <?php 
        }
      } catch (PDOException $e) {
        echo ('ERROR - ' . $e->getMessage());
        $conn->rollBack();
      }
      ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <div class="container">
    <?php
    try {
      $select = "SELECT g.genero FROM tbgenero g";
      $select = $conn->prepare($select);
      $conn->beginTransaction();
      $select->execute();
      $conn->commit();
      foreach ($select as $table) {
        $generoNome = $table['genero'];
    ?>
        <div class="card text-center mb-3">
          <div class="card-header">
            <h3><?php echo ($generoNome) ?></h3>
          </div>
          <div class="card-body">
            <div class="row">
              <?php
              try {
                $select = "SELECT f.foto, g.genero FROM tbfilme f INNER JOIN tbgenero g ON f.idgenero = g.idgenero";
                $select = $conn->prepare($select);
                $conn->beginTransaction();
                $select->execute();
                $conn->commit();
                foreach ($select as $table) {
                  $genero = $table['genero'];
                  if ($genero == $generoNome) {
                    $foto = $table['foto'];
              ?>
                    <div class="col-md-3 col-sm-6">
                      <div class="card">
                        <img src="./img/cover/<?php echo ($foto) ?>" class="card-img-top" alt="...">
                      </div>
                    </div>
              <?php
                  }
                }
              } catch (PDOException $e) {
                echo ('ERROR - ' . $e->getMessage());
                $conn->rollBack();
              }
              ?>
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
  </div>
</body>

</html>