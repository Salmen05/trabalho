<?php

declare(strict_types=1);
function connection()
{
  try {
    $conn = new PDO("mysql:dbname=dblocadora; host=localhost", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    echo ('ERROR - ' . $e->getMessage());
  }
  return $conn;
}
