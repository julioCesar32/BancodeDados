<html> 
<head>
    <title>Assinaturas | Consulta</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="table.css">
</head>
<body>
<section>
  <h1>Assinatura</h1>
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
    include('connectBanco.php');
    $tipo=["idassinaturas", "assi_data", "assi_valorPlano", "planos_idplanos_tipos", "pagamento_idPagamento", "pacientes_idpacientes"];
    $comando="";
    $sequencia="";
    $i=0;

    if(isset($_POST["PESQUISA"]))
    {
        foreach($_POST["PESQUISA"] as $pesquisa)
        {
            if($pesquisa <> "")
            {
                if($sequencia == "")
                    $sequencia = 1;
                
                else{
                    $comando = $comando . " and ";
                }                   
                $comando = $comando . $tipo[$i] . " = ". "  '".$pesquisa."' ";
            }
            $i++;
        }    
    }
    if ($comando <> ""){
        $sql = "SELECT * FROM assinatura where $comando"; 
    }      

    else{
        $sql = "SELECT * FROM assinatura";     
    }    

    $resultado = mysqli_query($conn,$sql) or die ("Erro ao retornar os pesquisas");

    while($registro = mysqli_fetch_array($resultado))
    {
        $ASSid = $registro['idassinaturas'];
        $ASSdata = $registro['assi_data'];
        $PacienteID = $registro['pacientes_idpacientes'];
        $PlanosID = $registro['planos_idplanos_tipos'];
        $ASSpreco = $registro['assi_valorPlano'];
        $PagamentoID = $registro['pagamento_idPagamento'];

        echo "<tr>";
        echo "<td>".$ASSid."</td>";
        echo "<td>".$ASSdata."</td>";
        echo "<td>".$PacienteID."</td>";
        echo "<td>".$PlanosID."</td>";
        echo "<td>".$ASSpreco."</td>";
        echo "<td>".$PagamentoID."</td>";
        echo "<td>
         <form action='atualizar.php' method='post'>
         <center> 
         <input type='hidden' name='dado' value=".$ASSid.">
         <input type=submit value='Alterar' ></form>";
   
        echo "<form action='excluir.php' method='post'>
                <input type='hidden' name='dado' value=".$ASSid.">
        <center> <input type=submit value='Excluir' ></form></td>";
                echo "</tr>";
    }
    echo "</table>";
    mysqli_close($conn);
?>
</tbody>
</table>
</div>
</section>
<form action='assinaturas.php' method='post'>
        <center><input type=submit value='Voltar' class='bn1'></center>
</form>
</body>
</html>