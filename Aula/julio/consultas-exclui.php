<?php

$chave = $_POST["dado"];

include('connectBanco.php');

// Verifica escolha de campos
if(isset($_POST["dado"]))
    {
    $sql = "DELETE from consultas WHERE idConsultas = $chave";   
    $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");
    }
 mysqli_close($conn);

?>
<meta http-equiv="refresh" content="0; URL='consultas-consulta.php'"/>
</body>
</html>