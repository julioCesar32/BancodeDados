<?php
include('connectBanco.php');
$Cons_Data = $_POST['data-cadastro'];
$receitas = $_POST['receita-cadastro'];
$exames = $_POST['exames-cadastro'];
$pacientes_idpacientes = $_POST['idp-cadastro'];
$Especialidades_idEspecialidades = $_POST['ide-cadastro'];
$consulta_hora = $_POST['chora-cadastro'];
$consulta_compreceu = $_POST['compareceu-cadastro'];
$Retorno = $_POST['retorno-cadastro'];

$sql = " INSERT INTO  consultas (
    idConsultas, 
    cons_Data, 
    cons_receitas, 
    cons_exames, 
    pacientes_idpacientes,
    Especialidades_idEspecialidades,
    cons_hora,
    consulta_compreceu,
    cons_Retorno ) 
    
VALUES (
    '',
    '$Cons_Data',
    '$receitas',
    '$exames',
    '$pacientes_idpacientes', 
    '$Especialidades_idEspecialidades',
    '$consulta_hora',
    '$consulta_compreceu',
    '$Retorno' )";


if(mysqli_query($conn, $sql)){
//echo "<br>registro gravado com sucesso";

}
else{
echo "error: ".$sql. "<br>". mysqli_error($conn);

}


mysqli_close($conn);
?>
<meta http-equiv="refresh" content="0; URL='consultas.php'"/>