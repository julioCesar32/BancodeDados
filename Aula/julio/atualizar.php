<html> 
<head>
    <title>Consultas | Alterar</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="table.css">
</head>
<body>
<section>
  <h1>Consultas</h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
      <tr>
            <th>ID ASSINATURA</th>
            <th>DATA ASSINATURA</th>  
            <th>ID DO PACIENTE</th> 
            <th>ID PLANO</th>
            <th>VALOR PLANO</th> 
            <th>ID PAGAMENTO</th>
            <th>Excluir ou Alterar</th>
        </tr>
</thead>
</table>
</div>
<div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>

<?php
$servername = "localhost";
$database = "mydb";
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
 

// Verifica escolha de campos

     $sql = "SELECT * FROM assinatura where idassinaturas = $chave";   
     $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");

 // loop para ler todos os registros
$registro = mysqli_fetch_array($resultado);
 
   echo "<tr>";
   echo "<form action='alteracaoFeita.php' method='post'>";
         echo "<td><input type='hidden'   name='dados[]'   value=".$registro['idassinaturas']."></td>";
         echo "<td><input type='text' name='dados[]'   value=".$registro['assi_data']."></td>";
         echo "<td><input type='hidden' name='dados[]'   value=".$registro['pacientes_idpacientes']."></td>";
         echo "<td><input type='hidden' name='dados[]'   value=".$registro['planos_idplanos_tipos']."></td>";
         echo "<td><input type='text' name='dados[]'   value=".$registro['assi_valorPlano']."></td>";
         echo "<td><input type='hidden' name='dados[]'   value=".$registro['pagamento_idPagamento']."></td>";
         echo "<td><input type=submit value='Alterar' ></td></table>

         <center> 
         </form>";

 mysqli_close($conn);
 echo "</table>";
 ?>
</body>
</html>