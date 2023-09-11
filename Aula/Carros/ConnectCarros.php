<?php
$servername = "localhost";
$database = "banco_dadoscarros";
$username = "root";
$password = "";
$CARmarca = $_POST['MARCA'];
$CARanomod = $_POST['ANOMOD'];
$CARplaca = $_POST['PLACA'];
$CARrenavam = $_POST['RENAVAM'];
$CARcor = $_POST['COR'];


$conn = mysqli_connect($servername, $username,
                       $password, $database);

//verifica a conex�o

if(!$conn){
    die("falha na conex�o: ". mysqli_connect_error());
}

echo "connectado com sucesso";

$sql = "INSERT INTO `banco_dadoscarros`.`carros`
                                (`Car_id`,
                                `Car_Marca`,
                                `Car_AnoMod`,
                                `Car_Placa`,
                                `Car_Renavam`,
                                `Car_cor`)
                                VALUES
                                ('',
                                '$CARmarca',
                                '$CARanomod',	
                                '$CARplaca',
                                '$CARrenavam',
                                '$CARcor')";

if(mysqli_query($conn, $sql)){
    echo "<br>Registro Gravado Com Sucesso ?";
}else
{
    echo "?Error: ". $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>