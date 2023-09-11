<?php
$servername = "localhost";
$database = "mydb";
$username = "root";
$password = "";

// Cria Conexão
$conn = mysqli_connect($servername, $username, 
                       $password, $database);
// Verificar Conexão
if (!$conn) {
      die("falha na conexão: " . mysqli_connect_error());
}

?>