<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

        <body>
            

            <?php



                $servername = "localhost";
                $database = "telemed";
                $password = "";
                $username = "root";

                $IdAssinaturas     = $_POST['IdAssinaturas'];
                $DataEmi           = $_POST['DataEmi'];
                $DataVenc           = $_POST['DataVenc'];
                $Juros             = $_POST['Juros'];
                $Desc              = $_POST['Desc'];
                $Valor             = $_POST['Valor'];
                $DataPg            = $_POST['DataPg'];
                $ValorPg           = $_POST['ValorPg'];
                




                //cria conex�o
                $conn = mysqli_connect($servername, $username, $password, $database);

                //verificar conex�o
                if(!$conn){

                    die("Falha na conexã
                    o: " . mysqli_connect_error());
                }

                

                echo "Conectado com sucesso";

                $sql = "INSERT INTO titulo
                                            (idtitulo,
                                            assinatura_idassinaturas,
                                            ti_dataEmicao,
                                            ti_dataVencimento,
                                            ti_juros,
                                            ti_desconto,
                                            ti_valor,
                                            ti_datapagamento,
                                            ti_valorpago) VALUES
                                            ('',
                                            '$IdAssinaturas',
                                            '$DataEmi',
                                            '$DataVenc',
                                            '$Juros',
                                            '$Desc',
                                            '$Valor',
                                            '$DataPg',
                                            '$ValorPg')";

                    if(mysqli_query($conn, $sql)){
                        echo "<br><h2 class='texto-conectado'>Registro Gravado Com Sucesso </h2>";
                    }else{
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }

                    mysqli_close($conn);

            ?>

        <body>
</html>


