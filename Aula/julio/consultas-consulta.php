<html> 
<head>
    <title>Consultas | Consulta</title>
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
    include('connectBanco.php');
    $Campo = ["idConsultas", "cons_Data","cons_receitas","cons_exames", "pacientes_idpacientes","Especialidades_idEspecialidades","cons_hora","consulta_compreceu","cons_Retorno" ];
    $comando="";
    $sequencia="";
    $i=0;

    if(isset($_POST["dado"]))
    {    
        // Faz loop para os dados
        foreach($_POST["dado"] as $dado)
        {
            if ( $dado <> "")
            {
                if ($sequencia == "")
                    $sequencia=1;
                else
                    $comando = $comando . " and ";
                        
                $comando = $comando . $campo[$i] ."="."'"
                .$dado."' ";
                echo "$comando <br>"; 
            }
            $i++;
        }
        
        
    }
    else
    {
        // echo "nenhum campo selecionado";
    
    }


if ($comando <> "")
     $sql = "SELECT * FROM consultas where $comando";   
else
    $sql = "SELECT * FROM consultas";     

$resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");
 
    // loop para ler todos os registros
    while ($registro = mysqli_fetch_array($resultado))
    {
        $idConsultas       = $registro['idConsultas'];
        $Cons_Data    = $registro['cons_Data'];
        $receitas    = $registro['cons_receitas'];
        $exames = $registro['cons_exames'];
        $pacientes_idpacientes  = $registro['pacientes_idpacientes'];
        $Especialidades_idEspecialidades   = $registro['Especialidades_idEspecialidades'];
        $consulta_hora   = $registro['cons_hora'];
        $consulta_compreceu   = $registro['consulta_compreceu'];
        $Retorno   = $registro['cons_Retorno'];
    
        echo "<tr>";
        echo "<td>".$idConsultas."</td>";
        echo "<td>".$Cons_Data."</td>";
        echo "<td>".$receitas."</td>";
        echo "<td>".$exames."</td>";
        echo "<td>".$pacientes_idpacientes."</td>";
        echo "<td>".$Especialidades_idEspecialidades."</td>";
        echo "<td>".$consulta_hora."</td>";
        echo "<td>".$consulta_compreceu."</td>";
        echo "<td>".$Retorno."</td>";
        echo "<td>
            <form action='consultas-exclui.php' method='post'>
            <center> 
            <input type='hidden' name='dado' value=".$idConsultas.">
            <input type=submit value='Deletar' class='bn1'></form>";

        echo "
                <form action='consultas-altera-1.php' method='post'>
                <center> 
                <input type='hidden' name='dado' value=".$idConsultas.">
                <input type=submit value='Alterar' class='bn1'></form></td>";
        echo"</tr>";
    }



    mysqli_close($conn);
?>
</tbody>
</table>
</div>
</section>
<form action='consultas.php' method='post'>
        <input type=submit value='Voltar' class='bn1'>
</form>
</body>
</html>