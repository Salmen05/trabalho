<?php
include_once("../../php/config/connection.php");
$conn = connection();
if (isset($_GET['idusuario'])) {
  $idusuario = $_GET['idusuario'];
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $nivel = $_POST['nivel'];
  $status = $_POST['status'];
  $update = $conn->prepare("UPDATE tbusuario SET nome = :nome, email = :email, nivel = :nivel, status = :status WHERE idusuario = :idusuario");
  $update->bindParam(':idusuario', $idusuario, PDO::PARAM_STR);
  $update->bindParam(':nome', $nome, PDO::PARAM_STR);
  $update->bindParam(':email', $email, PDO::PARAM_STR);
  $update->bindParam(':nivel', $nivel, PDO::PARAM_STR);
  $update->bindParam(':status', $status, PDO::PARAM_STR);
  $conn->beginTransaction();
  $update->execute();
  $conn->commit();
  header("Location: ../adm.php?page=usuario");
}
if (isset($_GET['idgenero'])) {
  $idgenero = $_GET['idgenero'];
  $genero = $_POST['nomeGenero'];
  $status = $_POST['status'];
  $update = $conn->prepare("UPDATE tbgenero SET genero = :genero, status = :status WHERE idgenero = :idgenero");
  $update->bindValue(':idgenero', $idgenero);
  $update->bindValue(':genero', $genero);
  $update->bindValue(':status', $status);
  $conn->beginTransaction();
  $update->execute();
  $conn->commit();
  header("Location: ../adm.php?page=genero");
}
