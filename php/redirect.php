<?php

declare(strict_types=1);
session_start();
require_once("./config/connection.php");
$conn = connection();
if (isset($_POST['email'])) {
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $cpf = $_POST['cpf'];
  $nascimento = $_POST['nascimento'];
  $options = [
    'cost' => 12
  ];
  $hashPass = password_hash($senha, PASSWORD_BCRYPT, $options);
  $register = "INSERT INTO tbusuario (nome, email, senha, cpf, nascimento) VALUES (:nome, :email, :senha, :cpf, :nascimento)";
  $insert = $conn->prepare($register);
  $insert->bindParam(':nome', $nome);
  $insert->bindParam(':email', $email);
  $insert->bindParam(':senha', $hashPass);
  $insert->bindParam(':cpf', $cpf);
  $insert->bindParam(':nascimento', $nascimento);
  $conn->beginTransaction();
  $insert->execute();
  $conn->commit();
  header("Location: ./login.php");
}
if (isset($_POST['emailaa'])) {
  $nome = $_POST['nome'];
  $email = $_POST['emailaa'];
  $senha = $_POST['senha'];
  $cpf = $_POST['cpf'];
  $nascimento = $_POST['nascimento'];
  $options = [
    'cost' => 12
  ];
  $hashPass = password_hash($senha, PASSWORD_BCRYPT, $options);
  $register = "INSERT INTO tbusuario (nome, email, senha, cpf, nascimento) VALUES (:nome, :email, :senha, :cpf, :nascimento)";
  $insert = $conn->prepare($register);
  $insert->bindParam(':nome', $nome);
  $insert->bindParam(':email', $email);
  $insert->bindParam(':senha', $hashPass);
  $insert->bindParam(':cpf', $cpf);
  $insert->bindParam(':nascimento', $nascimento);
  $conn->beginTransaction();
  $insert->execute();
  $conn->commit();
  header("Location: ./adm.php?page=usuario");
}
if (isset($_POST['nomeGenero'])) {
  $nomeGenero = $_POST['nomeGenero'];
  $register = $conn->prepare("INSERT INTO tbgenero (genero) VALUES (:genero)");
  $register->bindValue(':genero', $nomeGenero);
  $conn->beginTransaction();
  $register->execute();
  $conn->commit();
  header("Location: ./adm.php?page=genero");
}
