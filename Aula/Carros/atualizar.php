<body> <html> <head>
 <title>Resultado da pesquisa</title>
 </head> </body>
 
 <table border="1" style='width:50%'>
 <tr>   <th>Nome</th> <th>Endereço</th> <th>Bairro</th> <th>Cidade</th>
 <th>Estado</th> <th>Cep</th> </tr>

<?php
$servername = "localhost";
$database = "banco_dadoscarros";
$username = "root";
$password = "";

$chave = $_POST["dado"];
echo $chave. "novo";

// Cria Conexão
$conn = mysqli_connect($servername, $username, 
                       $password, $database);
// Verificar Conexão
if (!$conn) {
      die("falha na conexão: " . mysqli_connect_error());
}
 
echo "<br>Conectado com sucesso<br>";
 
// Verifica escolha de campos

     $sql = "SELECT * FROM carros where Car_id = $chave";   
     $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");

 // loop para ler todos os registros
$registro = mysqli_fetch_array($resultado);
 
  echo  $registro['Car_id'];
  echo  $registro['Car_marca'];
  echo  $registro['Car_AnoMod'];
  echo  $registro['Car_Placa'];
  echo  $registro['Car_Renavam'];
  echo  $registro['Car_cor'];
 
   echo "<tr>";
   echo "<form action='alteracao-salva.php' method='post'>";
         echo "<input type='hidden'   name='dados[]'   value=".$registro['Car_id'].">";
         echo "<td><input type='text' name='dados[]'   value=".$registro['Car_marca']."></td>";
         echo "<td><input type='text' name='dados[]'   value=".$registro['Car_AnoMod']."></td>";
         echo "<td><input type='text' name='dados[]'   value=".$registro['Car_Placa']."></td>";
         echo "<td><input type='text' name='dados[]'   value=".$registro['Car_Renavam']."></td>";
         echo "<td><input type='text' name='dados[]'   value=".$registro['Car_cor']."></td>";
         echo "<td></tr><tr></table>;

         <center> 
         <input type=submit value='Alterar' ></form>";

 mysqli_close($conn);
 echo "</table>";
 ?>
</body>
</html>