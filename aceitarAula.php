<?php
    //ob_start();
    echo basename( __FILE__ );
?>

<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./css/aceitarAgendamento.css">
        <title>Aceitar Aula</title>
    </head>
    <body>
        <div class="wrapper">
            <div class="banner">

                <div class="left"></div>

                <div class="right"></div>

                <div class="center">
                    <div class="img-header"></div>
                    <div class="titulo">
                        <h3> LEMA - LABORATÓRIO DE ENGENHARIA DE MEIO AMBIENTE </h3>
                    </div>
                </div>

            </div>
            <form action="index.php" method="post">
                <div class="outer-container">
                    <div class="container">
                        <div class="content">
                            <span>Professor</span>
                            <input type="text" name="prof" id="prof" value="<?php //echo $_SESSION['prof']?>" disabled>
                        </div>

                        <div class="content">
                            <span>Email do Professor</span>
                            <input type="email" name="emailProf" id="emailProf" value="<?php //echo $_SESSION['email']?>" disabled>
                        </div>

                        <div class="content">
                            <span>Disciplina</span>
                            <input type="text" name="nomeDisc" id="nomeDisc" value="<?php //echo $_SESSION['nomeDisc']?>" disabled>
                        </div>

                        <div class="content">
                            <span>Curso</span>
                            <input type="text" name="curso" id="curso" value="<?php //echo $_SESSION['curso']?>" disabled>
                        </div>
                    </div>

                    <div class="container">
                        <div class="content">
                            <span>Setor</span>
                            <input type="text" name="setor" id="setor" value="<?php //echo $_SESSION['setor']?>" disabled>
                        </div>

                        <div class="content">
                            <span>Data</span>
                            <input type="text" name="data" id="data" value="<?php //echo $_SESSION['data']?>" disabled>
                        </div>

                        <div class="content">
                            <span>Hora Início</span>
                            <input type="text" name="horainicio" id="horainicio" value="<?php //echo $_SESSION['horainicio']?>" disabled>
                        </div>

                        <div class="content">
                            <span>Hora Final</span>
                            <input type="text" name="horafinal" id="horafinal" value="<?php //echo $_SESSION['horafinal']?>" disabled>
                        </div>
                    </div>
                </div>
                <div class="botoes">
                    <input type="submit" value="Aceitar" id="aceitar-aula">
                    <input type="submit" value="Recusar" id="recusar-aula">
                </div>
            </div>
        </form>
    </body>
</html>

<?php
    //$html = ob_get_contents();
    //ob_end_clean();
    //file_put_contents($_SESSION['setor'].'-'.$_SESSION['dia'].'-'.$_SESSION['horainicio'].'-'.$_SESSION['horafinal'].".php", $html);

?>