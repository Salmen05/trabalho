<?php
include_once("./connection.php");
$POST = filter_input_array(INPUT_POST);
$email = $POST['email'];
$senha = $POST['senha'];
$conn = connection();
$options = ['cost' => 12];
try {
  $select = $conn->prepare("SELECT idusuario, nome, email, senha, nivel FROM tbusuario WHERE email = :email");
  $select->bindValue(':email', $email);
  $conn->beginTransaction();
  $select->execute();
  $conn->commit();
  if ($select->rowCount() > 0) {
    $select = $select->fetch(PDO::FETCH_ASSOC);
    if (password_verify($senha, $select['senha'])) {
      $result = $select;
    } else {
      $result = 'senha';
    }
  } else {
    $result = 'usuario';
  }
} catch (PDOException $e) {
  echo ('ERROR - ' . $e->getMessage());
  $conn->rollBack();
}
if (isset($result)) {
  ob_start();
  switch ($result) {
    case 'usuario':
      $response = ['success' => false, 'message' => 'Usúario Inválido!'];
      break;
    case 'senha':
      $response = ['success' => false, 'message' => 'Senha incorreta!'];
      break;
    default:
      session_start();
      $_SESSION['idusuario'] = $select['idusuario'];
      $_SESSION['nome'] = $select['nome'];
      $_SESSION['email'] = $select['email'];
      $_SESSION['nivel'] = $select['nivel'];
      $response = ['success' => true, 'message' => 'Logado com sucesso!'];
      break;
  }
  header('Content-Type: application/json');
  echo json_encode($response);
  ob_end_flush();
}
