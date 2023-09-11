<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Consultas</title>
</head>
<body>

    <header class="header">
        <div class="text-box">
            <h1 class="heading-primary">
                <span class="heading-primary-main">Consultas</span>
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

    <form method="post" action="consultas-consulta.php" id="consulta">

        <h5>Consulta</h5><br>

        <label for="username">ID</label>
        <input type="text" id="username" name="dado[]" placeholder="" autocomplete="off"/>
      
        <label for="username">DATA</label>
        <input type="date" id="username" name="dado[]" placeholder="" autocomplete="off"/>

        <label for="username">RECEITA</label>
        <input type="text" id="username" name="dado[]" placeholder="" autocomplete="off"/>

        <label for="username">EXAMES</label>
        <input type="text" id="username" name="dado[]" placeholder="" autocomplete="off"/>

        <label for="username">ID PACIENTE</label>
        <input type="text" id="username" name="dado[]" placeholder="" autocomplete="off"/>

        <label for="username">ID ESPECIALIDADE</label>
        <input type="text" id="username" name="dado[]" placeholder="" autocomplete="off"/>

        <label for="username">CONSULTA HORA</label>
        <input type="time" id="username" name="dado[]" placeholder="" autocomplete="off"/>

        <label for="username">COMPARECEU</label>
        <input type="text" id="username" name="dado[]" placeholder="" autocomplete="off"/>

        <label for="username">RETORNO</label>
        <input type="text" id="username" name="dado[]" placeholder="" autocomplete="off"/>
      
        <input type="submit" name="consulta" value="Consultar" />
      
    </form>
    <form method="post" action="consultas-cadastro.php" id="cadastro">
        <h5>Cadastro</h5><br>
      
        <label for="username">DATA</label>
        <input type="date" id="username" name="data-cadastro" placeholder="" autocomplete="off"/>

        <label for="username">RECEITA</label>
        <input type="text" id="username" name="receita-cadastro" placeholder="" autocomplete="off"/>

        <label for="username">EXAMES</label>
        <input type="text" id="username" name="exames-cadastro" placeholder="" autocomplete="off"/>

        <label for="username">ID PACIENTE</label>
        <input type="text" id="username" name="idp-cadastro" placeholder="" autocomplete="off"/>

        <label for="username">ID ESPECIALIDADE</label>
        <input type="text" id="username" name="ide-cadastro" placeholder="" autocomplete="off"/>

        <label for="username">CONSULTA HORA</label>
        <input type="time" id="username" name="chora-cadastro" placeholder="" autocomplete="off"/>

        <label for="username">COMPARECEU</label>
        <input type="text" id="username" name="compareceu-cadastro" placeholder="" autocomplete="off"/>

        <label for="username">RETORNO</label>
        <input type="text" id="username" name="retorno-cadastro" placeholder="" autocomplete="off"/>

        <input type="submit" name="cadastro" value="Cadastrar" />
      
    </form>
</body>
</html>     