<body> <html> <head>
 <title>Resultado da exclusao</title>
 </head> </body>
  
<?php
$servername = "localhost";
$database = "banco01";
$username = "root";
$password = "";
$dados = "";
$dados        = $_POST["dados"];
$VEN_id       = $dados[0];
$VEN_nome     = $dados[1];
$VEN_sobrenome = $dados[2];
$VEN_bairro   = $dados[3];
$VEN_cidade   = $dados[4];
$VEN_estado   = $dados[5];
$VEN_cep      = $dados[6]; 


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
        "UPDATE Vendedores
        set 
        Ven_Nome = '$VEN_nome',
        Ven_SobreNome = '$VEN_endereco',
        Ven_DatadeNascimento   = '$VEN_bairro', 
        Ven_Rg = '$VEN_cidade', 
        Ven_Cpf = '$VEN_estado', 
        Ven_Telefone  = '$VEN_cep',
        Ven_Email = '$VEN_email',
        where VEN_id = $VEN_id";    
   
    $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");
    }
 mysqli_close($conn);

 ?>
<meta http-equiv="refresh" content="2; URL='consulta-teste.html'"/>
</body>
</html>