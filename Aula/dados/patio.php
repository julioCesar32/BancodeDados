<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patio</title>
    <link rel="stylesheet" href="patioStyle.css"/>
    <script src="main.js"></script>
    
</head>
<body>

    <?php
            $servername = "localhost";
            $database = "senai_automoveis";
            $username = "root";
            $passoword = "";
            for($i = 1; $i <= 11; $i++){

                $sql = "SELECT SUM(Aloc_qtde) FROM alocacao where Aloc_area = $i";
                $conn = mysqli_connect($servername,$username,$passoword,$database);
                mysqli_set_charset($conn,'utf8');
                $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar os dados");
                while($registro = mysqli_fetch_array($resultado)){
                    $soma = $registro['SUM(Aloc_qtde)'];
        
                    
                    if($soma != 0){
                        echo "<form enctype='multipart/form-data' action='automoveis.php' method='POST'>
                                <div class='area$i' style='background-color: blue' id='$i'>
                                    <div class='center'><input type='submit' name='area' value='$i'/></div>
                                </div>
                            </form>";
                    } else {
                        echo "<div class='area$i' onclick='exibirAlert()'>
                                <div class='center'>$i</div>
                            </div>";
                    }
                }
            }
        ?>
    <div class="background">
        <div class="fundo"></div>
    </div>
</body>
</html>