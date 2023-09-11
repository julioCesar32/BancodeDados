<?php

$servername = "localhost";
$database = "senai_automoveis";
$username = "root";
$passoword = "";

$idauto = $_POST['id'];
$conn = mysqli_connect($servername,$username,$passoword,$database);
echo $idauto; 

$sql = "UPDATE senai_automoveis.alocacao 
        SET alocacao.Aloc_qtde = alocacao.Aloc_qtde - 1 
        where Auto_id_Automoveis = $idauto";
$resultado = $conn->query($sql);

?>

<meta http-equiv="refresh" content="0; URL='patio.php'">