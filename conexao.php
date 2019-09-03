<?php
    //Cria a conexão com o banco
    function getConnection(){
        $dsn = 'pgsql:host=127.0.0.1;dbname=lema;';
        $user = 'postgres';
        $pass = '#Sootario1';
        try{
            $con = new PDO($dsn, $user, $pass);
            
            return $con;
        } catch(PDOException $ex){
            echo 'Erro: '.$ex->getMessage(); 
        }
    }

    //Cadastra a aula no banco e envia o email ao gerente técnico
    function agendarAula($siape, $prof, $email, $coddisc, $disc, $monitor, $tecnico, $curso, $setor, $horainicio, $horafinal, $numalunos, $dia){
        $con = getConnection();

        if(isset($siape) && isset($prof) && isset($email) && isset($coddisc) && isset($disc) && isset($curso) && isset($setor) && isset($horainicio) && isset($horafinal) && isset($numalunos) && isset($dia)){
            $horafinalaux = (int) join("", explode(":",$horafinal));
            $horainicioaux = (int) join("", explode(":",$horainicio));
            if($horafinalaux <= $horainicioaux){
                echo '<script>';
                echo 'alert("Horários Preenchidos de Forma Incorreta."); history.go(-1);';
                echo '</script>';
            } else{
                $sucesso = true;
                foreach ($dia as $value){
                    $query = 'INSERT INTO aulasministradas (siape, professor, coddisc, nomedisc, nomecurso, monitor, tecnico, horafinal, numalunos, statusaula, email, dataaula, horainicio, nomesetor) VALUES (:siape, :prof, :coddisc, :disc, :curso, :monitor, :tecnico, :horafinal, :numalunos, :statusaula, :email, :dia, :horainicio, :setor)';
                    $stmt = $con->prepare($query);
                    $stmt->bindValue(':siape', $siape);
                    $stmt->bindValue(':prof', $prof);
                    $stmt->bindValue(':coddisc', $coddisc);
                    $stmt->bindValue(':disc', $disc);
                    $stmt->bindValue(':curso', $curso);
                    $stmt->bindValue(':setor', $setor);
                    $stmt->bindValue(':monitor', $monitor);
                    $stmt->bindValue(':tecnico', $tecnico);
                    $stmt->bindValue(':dia', $value);
                    $stmt->bindValue(':horainicio', $horainicio);
                    $stmt->bindValue(':horafinal', $horafinal);
                    $stmt->bindValue(':numalunos', $numalunos);
                    $stmt->bindValue(':statusaula', 'AGUARDANDO CONFIRMAÇÃO');
                    $stmt->bindValue(':email', $email);
                    //Caso haja falha em algum laço, encerra o processo e mostra uma mensagem de erro
                    if(!$stmt->execute()){
                        // echo $siape.'<br>'.$prof.'<br>'.$coddisc.'<br>'.$disc.'<br>'.$curso.'<br>'.$setor.'<br>'.$monitor.'<br>'.$tecnico.'<br>'.$value.'<br>'.$horainicio.'<br>'.$horafinal;
                        // echo '<br>'.$numalunos.'<br>'.$email;
                        $sucesso = false;
                        break;
                    }
                }
                $con = null;

                //Caso não haja falhas nos laços, mostra mensagem de sucesso
                if($sucesso){
                    echo '<script> alert("O pedido foi enviado para análise."); parent.window.document.location.href="index.html"; </script>';
                } else {
                    echo '<script> alert("Erro ao cadastrar uma solicitação. O processo será parado."); history.go(-1); </script>';
                }
            }
        } else {
            echo '<script>';
            echo 'alert("Todos os campos devem estar preenchidos."); history.go(-1);';
            echo '</script>';   
        }
    }


    //Busca as aulas para popular a página de consultar agendamentos
    function getAulas($datainicial, $datafinal){
        $con = getConnection();
        $query = "SELECT nomesetor, dataaula FROM aulasministradas where dataaula between ? and ?";
        $stmt = $con->prepare($query);
        $stmt->bindValue(1, $datainicial);
        $stmt->bindValue(2, $datafinal);
        // $stmt->bindValue(3, $dias);
        // $stmt->bindValue(4, $mes);
        // $stmt->bindValue(5, $ano);
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        echo json_encode($resultado);
        // echo "<table><tr><th>Data</th><th>Professor</th><th>Disciplina</th><th>Curso</th><th>Setor</th><th>Monitor</th><th>Tecnico</th><th>Horário de Início</th><th>Horário Final</th><th>Número de Alunos</th><th>Status</th></tr>";
        // foreach ($resultado as $value){
        //     echo "<tr><td>".$value['dataaula']."</td><td>".$value['professor']."</td><td>".$value['nomedisc']."</td><td>".$value['nomecurso']."</td><td>".$value['nomesetor']."</td><td>".$value['monitor']."</td><td>".$value['tecnico']."</td><td>".$value['horainicio']."</td><td>".$value['horafinal']."</td><td>".$value['numalunos']."</td><td>".$value['statusaula']."</td></tr><br>";
        // }
        // echo "</table>";
    }

    //Recebe a requisição ajax para disciplinas
    function getDisciplina(){
        $codDisc = strtoupper($_POST['coddisc']);
        $nomeDisc = mb_strtoupper($_POST['nomedisc'], 'UTF-8');
        if($_POST['clickSuggest'] == "true"){
            if($_POST['chave']=="codDisc"){
                $con = getConnection();
                $query = 'SELECT codigo, nome FROM disciplina WHERE codigo = ?';
                $stmt = $con->prepare($query);
                $stmt->bindValue(1, "$codDisc");
                $stmt->execute();
                $result = $stmt->fetchAll();
                echo json_encode($result);
            } else{
                $con = getConnection();
                $query = 'SELECT codigo, nome FROM disciplina WHERE nome = ?';
                $stmt = $con->prepare($query);
                $stmt->bindValue(1, "$nomeDisc");
                $stmt->execute();
                $result = $stmt->fetchAll();
                echo json_encode($result);
            }
        } else{
            if($_POST['chave']=="codDisc"){
                $con = getConnection();
                $query = 'SELECT codigo FROM disciplina WHERE codigo LIKE ?';
                $stmt = $con->prepare($query);
                $stmt->bindValue(1, "$codDisc%", PDO::PARAM_STR);
                $stmt->execute();
                $result = $stmt->fetchAll();
                echo json_encode($result);
            } else{
                $con = getConnection();
                $query = 'SELECT nome FROM disciplina WHERE nome LIKE ?';
                $stmt = $con->prepare($query);
                $stmt->bindValue(1, "$nomeDisc%", PDO::PARAM_STR);
                $stmt->execute();
                $result = $stmt->fetchAll();
                echo json_encode($result);
            }
        }
    }

    //Configura os calendários
    //Retorna os dados usados para mostrar no calendário apenas os dias disponíveis para marcar aula referente ao setor e horário selecionados
    function configuraCalendario($setor, $horainicio, $horafinal){
        $con = getConnection();
        $query = 'SELECT dataaula FROM aulasministradas WHERE nomesetor = ? and horainicio >= ? and horafinal <= ?';
        $stmt = $con->prepare($query);
        $stmt->bindValue(1, $setor);
        $stmt->bindValue(2, $horainicio);
        $stmt->bindValue(3, $horafinal);
        $stmt->execute();
        $result = $stmt->fetchAll();
        echo json_encode($result);
    }

    //Busca o email do técnico e técnico substituto para passar para a função que envia o email
    function buscaEmailsTecnicos($setor){
        $con = getConnection();
        $query = 'SELECT email FROM setor WHERE nomesetor = ?';
        $stmt = $con->prepare($query);
        $stmt->bindValue(1, $setor);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    //Altera o estado do agendamento de aula
    function alteraStatusAgendamentoAula($status, $setor, $dataaula, $horainicio, $horafinal){
            $con = getConnection();
            $query = 'UPDATE aulasministradas SET statusaula = ? where setor = ? and dataaula = ? and horainicio = ? and horafinal = ?';
            $stmt = $con->prepare($query);
            $stmt->bindValue(1, $status);
            $stmt->bindValue(2, $setor);
            $stmt->bindValue(3, $dataaula);
            $stmt->bindValue(4, $horainicio);
            $stmt->bindValue(5, $horafinal);
            return $stmt->execute();
    }

