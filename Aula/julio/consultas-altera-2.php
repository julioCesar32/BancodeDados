<?php
$dados = "";
$dados        = $_POST["dados"];
$idConsultas       = $dados[0];
$Cons_Data     = $dados[1];
$receitas = $dados[2];
$exames = $dados[3];
$pacientes_idpacientes   = $dados[4];
$Especialidades_idEspecialidades   = $dados[5];
$consulta_hora   = $dados[6];
$consulta_compreceu      = $dados[7]; 
$Retorno   = $dados[8];

include('connectBanco.php');

    if(isset($_POST["dados"]))
    {

        $sql = 
        "UPDATE consultas 
        set 
        cons_Data     = '$Cons_Data',
        cons_receitas = '$receitas',
        cons_exames   = '$exames', 
        pacientes_idpacientes   = '$pacientes_idpacientes', 
        Especialidades_idEspecialidades   = '$Especialidades_idEspecialidades', 
        cons_hora      = '$consulta_hora',
        consulta_compreceu      = '$consulta_compreceu',
        cons_Retorno      = '$Retorno'
        WHERE idConsultas = $idConsultas";    
   
    $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");
    }
 mysqli_close($conn);

?>
<meta http-equiv="refresh" content="0; URL='consultas-consulta.php'"/>