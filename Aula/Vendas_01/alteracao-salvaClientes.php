<body> <html> <head>
 <title>Resultado da alteração</title>
 </head> </body>
  
<?php
$servername = "localhost";
$database = "vendas_01";
$username = "root";
$password = "";
$dados = "";
$dados = $_POST["dados"];
$CLIid = $dados[0];
$CLInome = $dados[1];
$CLIsobreNome = $dados[2];
$CLIdata = $dados[3];
$CLIrg = $dados[4];
$CLItelefone = $dados[5];
$CLIemail = $dados[6];
$CLIendereco = $dados[7];


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
        "UPDATE Cliente
        set 
        Cli_nome     = '$CLInome',
        Cli_SobreNome = '$CLIsobreNome',
        Cli_DatadeNascimento   = '$CLIdata', 
        Cli_Rg   = '$CLIrg', 
        Cli_Telefone   = '$CLItelefone', 
        Cli_Email      = '$CLIemail',
        Cli_Endereco = '$CLIendereco',
        WHERE Cli_id = '$CLIid";    
   
    $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");
}
    
 mysqli_close($conn);

 ?>
<meta http-equiv="refresh" content="2; URL='consulta.php'"/>
</body>
</html>