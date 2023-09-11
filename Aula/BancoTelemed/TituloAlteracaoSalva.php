<body> <html> <head>
 <title>Resultado da consulta</title>
    </head>
    </body>
    
        <?php
            $servername = "localhost";
            $database = "telemed";
            $password = "";
            $username = "root";

            $dados = "";
            $dados                      = $_POST["dados"];
            $idtitulo                   = $dados[0];
            $assinatura_idassinaturas   = $dados[1];
            $ti_dataEmicao              = $dados[2];
            $ti_dataVencimento          = $dados[3];
            $ti_juros                   = $dados[4];
            $ti_desconto                = $dados[5];
            $ti_valor                   = $dados[6]; 
            $ti_datapagamento           = $dados[7]; 
            $ti_valorpago               = $dados[8]; 

            

            // Cria Conexão
            $conn = mysqli_connect($servername, $username, 
                                $password, $database);
            // Verificar Conexão
            if (!$conn) {
                die("falha na conexão: " . mysqli_connect_error());
            }
            echo "<br>Conectado com sucesso<br>";
            // Verifica escolha de campos
            if(isset($_POST["dados"]))
                {

                    $sql = 
                    "UPDATE titulo 
                    set 
                    assinatura_idassinaturas     = '$assinatura_idassinaturas',
                    ti_dataEmicao                = '$ti_dataEmicao',
                    ti_dataVencimento            = '$ti_dataVencimento', 
                    ti_juros                     = '$ti_juros', 
                    ti_desconto                  = '$ti_desconto', 
                    ti_valor                     = '$ti_valor',
                    ti_datapagamento             = '$ti_datapagamento',
                    ti_valorpago                 = '$ti_valorpago'
                    WHERE idtitulo = $idtitulo";    
            
                $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");
                echo "estou aqui".$idtitulo;
                }
            mysqli_close($conn);

        ?>
        <meta http-equiv="refresh" content="2; URL='TituloConsulta.php'"/>
    </body>
</html>