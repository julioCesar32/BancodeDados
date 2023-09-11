<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Assinaturas</title>
</head>
<body>

    <header class="header">
        <div class="text-box">
            <h1 class="heading-primary">
                <span class="heading-primary-main">Assinaturas</span>
            </h1>
            <a href="#consulta" class="btn btn-white btn-animated">Consulta</a>
            <a href="#cadastro" class="btn btn-white btn-animated">Cadastro</a>
        </div>
    </header>

    <input type="checkbox" id="ham-menu">
    <label for="ham-menu">
    <div class="hide-des">
        <span class="menu-line"></span>
        <span class="menu-line"></span>
        <span class="menu-line"></span>
        <span class="menu-line"></span>
        <span class="menu-line"></span>
        <span class="menu-line"></span>
    </div>

    </label>
    <div class="full-page-green"></div>
    <div class="ham-menu">
    <ul class="centre-text bold-text">
        <li><a href="paciente.php" class="a">Pacientes</a></li>
        <li><a href="consultas.php" class="a">Consultas</a></li>
        <li><a href="especialidades.php" class="a">Especialidades</a></li>
        <li><a href="medico.php" class="a">Médico</a></li>
        <li><a href="contato.php" class="a">Contato</a></li>
        <li><a href="planos.php" class="a">Planos</a></li>
        <li><a href="titulo.php" class="a">Título</a></li>
        <li><a href="assinatura.php" class="a">Assinatura</a></li>
        <li><a href="pagamento.php" class="a">Pagamento</a></li>
        <li><a href="pb.php" class="a">Plano/Benefícios</a></li>

    </ul>
    </div>

    <form method="post" action="assin-Consulta.php" id="consulta">

        <h5>Consulta</h5><br>

        <label for="username">ID</label>
        <input type="text" id="username" name="PESQUISA[]" placeholder="" autocomplete="off"/>
      
        <label for="username">Data</label>
        <input type="date" id="username" name="PESQUISA[]" placeholder="" autocomplete="off"/>

        <?php
            include('connectBanco.php');
            $sql = "SELECT * FROM planos";
            echo "<label>Tipo do plano: </label>";
            echo "<select name='PESQUISA[]'>";
            echo  "<option value=''> Selecione </option>";
            $resultado = mysqli_query($conn,$sql) or die ("Erro ao retornar os pesquisas");
            while($registro = mysqli_fetch_array($resultado))
            {
                $plano_Descricao = $registro['plano_descricao'];
                $IDplano = $registro['idplanos_tipos'];                        
                echo  "<option value='.$IDplano.'>$plano_Descricao</option>
                        <input type='hidden' value='$plano_valor' />";
            
            }
            echo "</select>";
                            
            $sql2 = "SELECT * FROM pagamento";
            echo "<label>Tipo do pagamento: </label>";
            echo "<select name='PESQUISA[]'>";
            echo  "<option value=''> Selecione </option>";
            $resultado = mysqli_query($conn,$sql2) or die ("Erro ao retornar os pesquisas");
            while($registro = mysqli_fetch_array($resultado))
            {
                $IDpagamento = $registro['idPagamento'];
                $PAGTIPO = $registro['tipos_pagamento'];           
                echo  "<option value='$IDpagamento'>$PAGTIPO</option>";
            }
            echo "</select>";    
            
            $sql3 = "SELECT * FROM pacientes";
            echo "<label>Nome do Paciente: </label>";
            echo "<select name='PESQUISA[]'>";
            echo  "<option value=''> Selecione </option>";
            $resultado = mysqli_query($conn,$sql3) or die ("Erro ao retornar os pesquisas");
            while($registro = mysqli_fetch_array($resultado))
            {
                $PACInome = $registro['paci_nome'];
                $IDpaciente = $registro['idpacientes'];                      
                echo  "<option value='$IDpaciente'>$PACInome</option>";
            
            }
            echo "</select>"; 

            mysqli_close($conn);
            ?>

        <input type="submit" name="consulta" value="Consultar" />
      
    </form>
    <form method="post" action="assin-cadastro.php" id="cadastro">

        <h5>Cadastro</h5><br>
      
        <label for="username">Data</label>
        <input type="date" id="username" name="DATE" placeholder="" autocomplete="off"/>

        <?php
            include('connectBanco.php');
            $sql = "SELECT * FROM planos";
            echo "<label>Tipo do plano: </label>";
            echo "<select name='PLANO'>";
            echo  "<option value=''> Selecione </option>";
            $resultado = mysqli_query($conn,$sql) or die ("Erro ao retornar os pesquisas");
            while($registro = mysqli_fetch_array($resultado))
            {
                $plano_Descricao = $registro['plano_descricao'];
                $IDplano = $registro['idplanos_tipos'];                        
                echo  "<option value='.$IDplano.'>$plano_Descricao</option>
                        <input type='hidden' name='PRECO' value='$plano_valor' />";
            
            }
            echo "</select>";
                            
            $sql2 = "SELECT * FROM pagamento";
            echo "<label>Tipo do pagamento: </label>";
            echo "<select name='PAGAMENTO'>";
            echo  "<option value=''> Selecione </option>";
            $resultado = mysqli_query($conn,$sql2) or die ("Erro ao retornar os pesquisas");
            while($registro = mysqli_fetch_array($resultado))
            {
                $IDpagamento = $registro['idPagamento'];
                $PAGTIPO = $registro['tipos_pagamento'];           
                echo  "<option value='$IDpagamento'>$PAGTIPO</option>";
            }
            echo "</select>";
            $resultado = mysqli_query($conn,$sql2) or die ("Erro ao retornar os pesquisas");
            while($registro = mysqli_fetch_array($resultado))
            {
                $PAGTIPO = $registro['tipos_pagamento'];           
                echo  "<input type='hidden' value='.$PAGTIPO.'/>";
            }    
            
            $sql3 = "SELECT * FROM pacientes";
            echo "<label>Nome do Paciente: </label>";
            echo "<select name='NOME'>";
            echo  "<option value=''> Selecione </option>";
            $resultado = mysqli_query($conn,$sql3) or die ("Erro ao retornar os pesquisas");
            while($registro = mysqli_fetch_array($resultado))
            {
                $PACInome = $registro['paci_nome'];
                $IDpaciente = $registro['idpacientes'];                      
                echo  "<option value='$IDpaciente'>$PACInome</option>";
            
            }
            echo "</select>"; 

            mysqli_close($conn);
            ?>


        <input type="submit" name="cadastro" value="Cadastrar" />
      
    </form>
</body>
</html>     