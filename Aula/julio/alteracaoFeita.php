<body> <html> <head>
 <title>Resultado da alteracao</title>
 </head> </body>
  
<?php
$servername = "localhost";
$database = "mydb";
$username = "root";
$password = "";
$dados = "";
$dados        = $_POST["dados"];
$ASSid = $dados[0];
$ASSdata = $dados[1];
$PacienteID =  $dados[2];
$PlanosID =  $dados[3];
$ASSpreco =  $dados[4];
$PagamentoID= $dados[5];

// Cria Conexão
$conn = mysqli_connect($servername, $username, 
                       $password, $database);
// Verificar Conexão
if (!$conn) {
      die("falha na conexão: " . mysqli_connect_error());
}
echo "<br>Conectado com sucesso<br>";
// Verifica escolha de campos
if(isset($_POST["dados"]))
    {

        $sql = 
        "UPDATE Assinatura 
        set 
        assi_data     = '$ASSdata',
        pacientes_idpacientes = '$PacienteID',
        planos_idplanos_tipos   = '$PlanosID', 
        assi_valorPlano   = '$ASSpreco',
        pagamento_idPagamento   = '$PagamentoID'  
        WHERE idassinaturas = $ASSid";    
   
    $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");
    }
 mysqli_close($conn);

 ?>
<meta http-equiv="refresh" content="0; URL='assin-Consulta.php'"/>
</body>
</html>