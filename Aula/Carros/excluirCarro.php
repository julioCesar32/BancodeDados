<body> <html> <head>
 <title>Resultado da exclusao</title>
 </head> </body>
 
 
<?php
$servername = "localhost";
$database = "banco_dadoscarros";
$username = "root";
$password = "";
$chave = $_POST["dado"];

// Cria Conexão
$conn = mysqli_connect($servername, $username, 
                       $password, $database);
// Verificar Conexão
if (!$conn) {
      die("falha na conexão: " . mysqli_connect_error());
}
echo "<br>Conectado com sucesso<br>";
// Verifica escolha de campos
if(isset($_POST["dado"]))
    {
    $sql = "DELETE from carro WHERE Car_id = $chave";   
    $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");
    }
 mysqli_close($conn);

 ?>
<meta http-equiv="refresh" content="0; URL='Consulta_carros.php'"/>
</body>
</html>