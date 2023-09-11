<body> <html> <head>
 <title>Resultado da pesquisa</title>
 <link rel="stylesheet" href="cadastro.css"/>
 </head> </body>
 
 <table border="1" style='width:70%'>
<thead>
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>SOBRENOME</th>
        <th>DATA DE NASCIMENTO</th>
        <th>RG</th>
        <th>TELEFONE</th>
        <th>EMAIL</th>
        <th>ENDEREÇO</th>
        <th>Excluir ou Alterar</th>
    </tr>
</thead>

<?php
$servername = "localhost";
$database = "vendas_01";
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

        $sql = "SELECT * FROM cliente where Cli_id = $chave";   
        $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");
   
    // loop para ler todos os registros
       $registro = mysqli_fetch_array($resultado);
    
       $CLIid = $registro['Cli_id'];
       $CLInome = $registro['Cli_Nome'];
       $CLIsobreNome = $registro['Cli_SobreNome'];
       $CLIdata = $registro['Cli_DatadeNascimento'];
       $CLIrg = $registro['Cli_Rg'];
       $CLItelefone = $registro['Cli_Telefone'];
       $CLIemail = $registro['Cli_Email'];
       $CLIendereco = $registro['Cli_Endereco'];
    
        echo "<tr>";
        echo "<form action='alteracao-salvaClientes.php' method='post'>";
            echo "<td><input type='hidden'   name='dados[]'   value=".$registro['Cli_id']."></td>";
            echo "<td><input type='text' name='dados[]'   value=".$registro['Cli_Nome']."></td>";
            echo "<td><input type='text' name='dados[]'   value=".$registro['Cli_SobreNome']."></td>";
            echo "<td><input type='text' name='dados[]'   value=".$registro['Cli_DatadeNascimento']."></td>";
            echo "<td><input type='text' name='dados[]'   value=".$registro['Cli_Rg']."></td>";
            echo "<td><input type='text' name='dados[]'   value=".$registro['Cli_Telefone']."></td>";
            echo "<td><input type='text' name='dados[]'   value=".$registro['Cli_Email']."></td>";
            echo "<td><input type='text' name='dados[]'   value=".$registro['Cli_Endereco']."></td>";
            echo "<td><input type=submit value='Alterar' ></form></tr></table>";  

 mysqli_close($conn);
 echo "</table>";
 ?>
</body>
</html>