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

    
    $sql = "SELECT * FROM Produto1 where Prod_id = $chave";   
    $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");
   
    // loop para ler todos os registros
       $registro = mysqli_fetch_array($resultado);
    
       $prodid = $registro['Prod_id'];
       $Vennome = $registro['Prod_Nome'];
       $ProdsobreNome = $registro['Prod_quantidadeProdutos'];
       $Proddata = $registro['Prod_Preco'];
       $Prodrg = $registro['Prod_Categoria'];
    
        echo "<tr>";
        echo "<form action='alteracao-salva.php' method='post'>";
            echo "<input type='hidden'   name='dados[]'   value=".$registro['Prod_id'].">";
            echo "<td><input type='text' name='dados[]'   value=".$registro['Prod_Nome']."></td>";
            echo "<td><input type='text' name='dados[]'   value=".$registro['Prod_quantidadeProdutos']."></td>";
            echo "<td><input type='text' name='dados[]'   value=".$registro['Prod_Preco']."></td>";
            echo "<td><input type='text' name='dados[]'   value=".$registro['Prod_Categoria']."></td>";
            echo "<td></tr><tr></table>;
   
            <center> 
            <input type=submit value='Alterar' ></form>";   

 mysqli_close($conn);
 echo "</table>";
 ?>
</body>
</html>