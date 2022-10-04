<?php

$Hostname='localhost';
$Username='root';
$Password="";
$DataBase='dropbox';
// Cria a conexao
$conn = new mysqli("$Hostname", "$Username", "$Password", "$DataBase");

// Testa a Conexao
if ($conn->connect_error) {
  die("Conexao Falhou: " . $conn->connect_error);
}
echo "Conectado com sucesso!!!!!!";
?>