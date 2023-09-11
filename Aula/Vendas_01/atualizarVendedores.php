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
echo $tabela;

    
    $sql = "SELECT * FROM vendedores where Ven_id = $chave";   
    $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");
   
    // loop para ler todos os registros
       $registro = mysqli_fetch_array($resultado);
    
       $Venid = $registro['Ven_id'];
       $Vennome = $registro['Ven_Nome'];
       $VensobreNome = $registro['Ven_SobreNome'];
       $Vendata = $registro['Ven_DatadeNascimento'];
       $Venrg = $registro['Ven_Rg'];
       $Vencpf = $registro['Ven_Cpf'];
       $Ventelefone = $registro['Ven_Telefone'];
       $Venemail = $registro['Ven_Email'];
    
        echo "<tr>";
        echo "<form action='alteracao-salva.php' method='post'>";
            echo "<input type='hidden'   name='dados[]'   value=".$registro['Ven_id'].">";
            echo "<td><input type='text' name='dados[]'   value=".$registro['Ven_Nome']."></td>";
            echo "<td><input type='text' name='dados[]'   value=".$registro['Ven_SobreNome']."></td>";
            echo "<td><input type='text' name='dados[]'   value=".$registro['Ven_DatadeNascimento']."></td>";
            echo "<td><input type='text' name='dados[]'   value=".$registro['Ven_Rg']."></td>";
            echo "<td><input type='text' name='dados[]'   value=".$registro['Ven_Cpf']."></td>";
            echo "<td><input type='text' name='dados[]'   value=".$registro['Ven_Telefone']."></td>";
            echo "<td><input type='text' name='dados[]'   value=".$registro['Ven_Email']."></td>";
            echo "<td></tr><tr></table>;
   
            <center> 
            <input type=submit value='Alterar' ></form>";   

 mysqli_close($conn);
 echo "</table>";
 ?>
</body>
</html>