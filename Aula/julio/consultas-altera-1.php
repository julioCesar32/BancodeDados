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
        <th>DATA</th>  
        <th>RECEITA</th> 
        <th>EXAMES</th>
        <th>ID PACIENTE</th> 
        <th>ID ESPECIALIDADE</th>
        <th>CONSULTA HORA</th> 
        <th>COMPARECEU</th>
        <th>RETORNO</th>
        <th>Alterar</th>
    </tr>
</thead>
</table>
</div>
<div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>

<?php
include('connectBanco.php');

$dado = $_POST["dado"];
 
// Verifica escolha de campos
$sql = "SELECT * FROM consultas where idConsultas = $dado";   
$resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");

// loop para ler todos os registros
$registro = mysqli_fetch_array($resultado);

echo "<tr>";
echo "<form action='consultas-altera-2.php' method='post'>";
    echo "<input type='hidden'   name='dados[]'   value=".$registro['idConsultas'].">";
    echo '<td><input type="text" name="dados[]"   value="'.$registro['cons_Data'].'"></td>';
    echo '<td><input type="text" name="dados[]"   value="'.$registro['cons_receitas'].'"></td>';
    echo '<td><input type="text" name="dados[]"   value="'.$registro['cons_exames'].'"></td>';
    echo '<td><input type="text" name="dados[]"   value="'.$registro['pacientes_idpacientes'].'"></td>';
    echo '<td><input type="text" name="dados[]"   value="'.$registro['Especialidades_idEspecialidades'].'"></td>';
    echo '<td><input type="text" name="dados[]"   value="'.$registro['cons_hora'].'"></td>';
    echo '<td><input type="text" name="dados[]"   value="'.$registro['consulta_compreceu'].'"></td>';
    echo '<td><input type="text" name="dados[]"   value="'.$registro['cons_Retorno'].'"></td>';
    echo "<td><input type=submit value='Alterar' class='bn1'></td>
         </tr></form>";

mysqli_close($conn);
 ?>
</tbody>
</table>
</div>
</section>
<form action='consultas-consulta.php' method='post'>
        <input type=submit value='Voltar' class='bn1'>
</form>
</body>
</html>