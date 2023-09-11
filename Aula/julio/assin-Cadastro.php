<?php
include('connectBanco.php');
$ASSdata = $_POST['DATE'];
$ASSpreco = $_POST['PRECO'];
$ASSPaciente = $_POST['NOME'];
$ASSPlano = $_POST['PLANO'];
$ASSpagamento = $_POST['PAGAMENTO'];

$sql = "INSERT INTO `mydb`.`assinatura`
                    (`idassinaturas`,
                    `assi_data`,
                    `pacientes_idpacientes`,
                    `planos_idplanos_tipos`,
                    `assi_valorPlano`,
                    `pagamento_idPagamento`)
                    VALUES
                    ('   ',
                    '$ASSdata',
                    '$ASSPaciente',
                    '$ASSPlano',
                    '$ASSpreco',
                    '$ASSpagamento')";


if(mysqli_query($conn, $sql)){
//echo "<br>registro gravado com sucesso";

}
else{
echo "error: ".$sql. "<br>". mysqli_error($conn);

}


mysqli_close($conn);
?>
<meta http-equiv="refresh" content="0; URL='assinatura.php'"/>