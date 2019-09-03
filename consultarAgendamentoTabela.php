<?php
    include 'conexao.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/consultar-agendamento.css">
    <script src="https://kit.fontawesome.com/5cd09c3eca.js"></script>
    <!-- <link rel="stylesheet" href="./fontawesome-free-5.9.0-web/css/all.css"> -->
    <!-- <link rel="stylesheet" href="./fontawesome-free-5.9.0-desktop/svgs/solid/paperclip.svg"> -->
    <title>Agendar Aulas</title>
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
        
        <div class="main">

            <button class="voltar"><a href="./index.html"><i class="fas fa-arrow-left"></i></a></button>

            <h3>CONSULTAR AGENDAMENTOS</h3>

            <div class="tabela">
                <table>
                    <thead>
                        <tr>
                            <td>Setor</td>
                            <td>Data</td>
                            <td>Horário de Início</td>
                            <td>Horário Final</td>
                            <td>Professor</td>
                        </tr>
                    </thead>
                    <tbody class="aulas">
                        <tr>
                            <td>Sedimentometria e Hidromentria</td>
                            <td>10/08/2019</td>
                            <td>17:30</td>
                            <td>19:30</td>
                            <td>Ciclano</td>
                        </tr>
                        <tr>
                            <td>Apoio Logístico Para Saída de Campo</td>
                            <td>12/08/2019</td>
                            <td>10:30</td>
                            <td>12:30</td>
                            <td>Fulano de Tal</td>
                        </tr>
                        <tr>
                            <td>Análises Físico-Químicas</td>
                            <td>16/08/2019</td>
                            <td>09:30</td>
                            <td>10:30</td>
                            <td>Beltrano</td>
                        </tr>
                        <tr>
                            <td>Mecânica dos Fluidos e Hidráulica</td>
                            <td>16/08/2019</td>
                            <td>13:30</td>
                            <td>15:30</td>
                            <td>Souza</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <button class="finalizar"><a href="index.html">Finalizar Consulta</a></button>
        </div>
    </div>