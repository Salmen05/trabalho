<?php
include_once("../../php/config/connection.php");
  $conn = connection();
if (isset($_GET['idusuario'])) {
  $idusuario = $_GET['idusuario'];
  $delete = $conn->prepare("DELETE FROM tbusuario WHERE idusuario = :idusuario");
  $delete->bindValue("idusuario", $idusuario, PDO::PARAM_INT);
  $conn->beginTransaction();
  $delete->execute();
  $conn->commit();
  header("Location: ../adm.php?page=usuario");
}
if (isset($_GET['idgenero'])) {
  $idgenero = $_GET['idgenero'];
  $delete = $conn->prepare("DELETE FROM tbgenero WHERE idgenero = :idgenero");
  $delete->bindValue("idgenero", $idgenero, PDO::PARAM_INT);
  $conn->beginTransaction();
  $delete->execute();
  $conn->commit();
  header("Location: ../adm.php?page=genero");
}
  