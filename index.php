<?php
    /* Este arquivo trata todas as requisições feitas pelo site */

    include 'conexao.php';
    include 'enviaEmail.php';

    if(isset($_POST['enviarAula'])){
        $monitor = 'Não Necessário';
        $tecnico = 'Não Necessário';
        
        if(isset($_POST['monitor'])){
            $monitor = $_POST['monitor'];
        }

        if(isset($_POST['tecnico'])){
            $tecnico = $_POST['tecnico'];
        }
        $emailsDestino = buscaEmailsTecnicos($_POST['setor']);
        // enviaEmailTecnico($_POST['emailProf'], $_POST['prof'], $emailsDestino, "Agendamento de Aula", );
        //mensagem de envio ou erro
        /*if(){
            echo '<script> alert("Erro ao enviar o email para o técnico"); </script>';
        } else {
            echo '<script> alert("O email foi enviado para o técnico"); </script>';
        }*/
        agendarAula($_POST['siape'], mb_strtoupper($_POST['prof'], 'UTF-8'), $_POST['emailProf'], strtoupper($_POST['codDisc']), mb_strtoupper($_POST['nomeDisc'], 'UTF-8'), $monitor, $tecnico, $_POST['curso'], $_POST['setor'], $_POST['horainicio'], $_POST['horafinal'], $_POST['numAlunos'], $_POST['dia']);        
    } else if(isset($_POST['enviarVeiculo'])){
        agendarVeiculo();
    } else if(isset($_POST['coddisc']) || isset($_POST['nomedisc'])){
        getDisciplina();
    } else if(isset($_POST['Setor'])){
        configuraCalendario($_POST['Setor'], $_POST['horainicio'], $_POST['horafinal']);
    } else if(isset($_POST['dias']) && isset($_POST['mes']) && isset($_POST['ano'])){
        $datainicial = $_POST['ano']."-".$_POST['mes']."-01";
        $datafinal = $_POST['ano']."-".$_POST['mes']."-".$_POST['dias'];
        getAulas($datainicial, $datafinal);
    } else if(isset($_POST['aceitar-aula'])){
        if(alteraStatusAgendamentoAula("Aprovada", $_POST['setor'], $_POST['data'], $_POST['horainicio'], $_POST['horafinal'])){
            echo '<script> alert("A aula foi aprovada com sucesso.); </script>';
        } else {
            echo '<script> alert("Erro ao aprovar a aula.); </script>';
        }
    } else if(isset($_POST['recusar-aula'])){
        if(alteraStatusAgendamentoAula("Não Aprovada", $_POST['setor'], $_POST['data'], $_POST['horainicio'], $_POST['horafinal'])){
            echo '<script> alert("A aula foi recusada com sucesso.); </script>';
        } else {
            echo '<script> alert("Erro ao recusar a aula.); </script>';
        }    
    }