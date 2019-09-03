<?php
    //Checa quantos dias tem o mês atual e os próximos 4 meses no ano corrente
    function diasMeses(){
        $retorno = array();
        $mes = date('n');
        for($m = $mes; $m <= $mes+4; $m++){
            $retorno[$m] = cal_days_in_month(CAL_GREGORIAN, $m, date('Y'));
        }
        return $retorno;
    }

    //Monta o calendário
    function montaCalendario(){
        //Para uso da função
        $daysWeek = array(
            'Sun',
            'Mon',
            'Tue',
            'Wed',
            'Thu',
            'Fri',
            'Sat'
        );

        //Para nomear as colunas do calendário
        $diasSemana = array(
            'Dom',
            'Seg',
            'Ter',
            'Qua',
            'Qui',
            'Sex',
            'Sab'
        );

        //Para nomear os blocos no calendário
        $arrayMes = array(
            1 => 'Janeiro',
            2 => 'Fevereiro',
            3 => 'Março',
            4 => 'Abril',
            5 => 'Maio',
            6 => 'Junho',
            7 => 'Julho',
            8 => 'Agosto',
            9 => 'Setembro',
            10 => 'Outubro',
            11 => 'Novembro',
            12 => 'Dezembro'
        );

        //Vai guardar quantos dias tem cada mês
        $diasMeses = diasMeses();
        //Vai ligar o dia do mês com o dia da semana
        $arrayRetorno = array();

        for($m = date('n'); $m <= date('n')+4; $m++){
            //arrayRetorno na posição do mês atual e os próximos 4 meses vai receber um array
            $arrayRetorno[$m] = array();
            //Checa quantos dias tem cada mês e atribui um dia da semana a cada dia do mês
            for($d = 1; $d <= $diasMeses[$m]; $d++){
                $dayMonth = gregoriantojd($m, $d, date('Y'));
                $weekMonth = jddayofweek($dayMonth, 2); //Checa qual é o dia da semana referente à data armazenada em $dayMonth
                if($weekMonth == 'Mun') $weekMonth = 'Mon'; //jddayofweek retorna Munday ao invés de Monday
                $arrayRetorno[$m][$d] = $weekMonth;
            }
        }

        $arrayMesesTable = array();
        $cont = 0;

        //arrayMesesTable guardará os meses usados no calendario, os quais são o mês atual e os próximos 4 meses
        foreach($arrayMes as $num => $mes){
            if($num == date('n') || $num == date('n')+$cont){
                $arrayMesesTable[$num] = $mes;
                $cont++;
            }
        }

        echo '<a href="#" id="ant">&laquo;</a><a href="#" id="prox">&raquo;</a>';
        echo '<table border="0" width="100%">';
            foreach($arrayMesesTable as $num => $mes){ //Percorre o array de meses em português, pega o número do mês e seu nome
                echo '<tbody id="mes_'.$num.'" class="mes" name="mes" value="'.$num.'">'; //Cada mês terá um tbody
                echo '<tr class="mes_title"><td colspan="7">'.$mes.' '.date('Y').'</td></tr>'; //Cria uma linha que contém o nome do mês
                echo '<tr class="dias_title">';
                foreach($diasSemana as $i => $day){ //Percorre o array de dias da semana em portugês, pega o número do dia e seu nome
                    echo '<td>'.$day.'</td>'; //Cria uma coluna para cada dia dentro da tag tr que foi aberta no echo anterior e fechada o próximo echo
                }
                echo '</tr><tr>';
                $y = 0; //Será usado para identificar o dia da semana
                foreach($arrayRetorno[$num] as $numero => $dia){ //Percorre os dias do mẽs e seu respectivo dia da semana
                    $y++;
                    //Este if checa em qual dia da semana o mês começa
                    if($numero == 1){
                        $qtd = array_search($dia, $daysWeek); //Procura no array $daysWeek um valor igual ao armazenado em $dia e retorna o seu índice
                        //Checa quantos dias devem ser pulados até que chegue no dia 1 do mês em questão
                        for($i = 1; $i <= $qtd; $i++){
                            echo '<td></td>';
                            $y++;
                        }
                    }
                    //A linha 103 cria um td com input cujo id é o dia e o mês e seu valor é o dia, o mês e o ano
                    echo '<td><input type="checkbox" class="dia" id="'.$numero.'-'.$num.'" name="dia[]" value="'.$numero.'-'.$num.'-'.date('Y').'"><label for="'.$numero.'-'.$num.'">'.$numero.'</label></td>';
                    //Se já se passaram 7 dias da semana, reinicia a contagem
                    if($y == 7){
                        $y = 0;
                        echo '</tr><tr>';
                    }
                }
                echo '</tr></tbody>';
            } 
        echo '</table>';
    }

    function montaCalendarioConsulta(){
        //Para uso da função
        $daysWeek = array(
            'Sun',
            'Mon',
            'Tue',
            'Wed',
            'Thu',
            'Fri',
            'Sat'
        );

        //Para nomear as colunas do calendário
        $diasSemana = array(
            'Dom',
            'Seg',
            'Ter',
            'Qua',
            'Qui',
            'Sex',
            'Sab'
        );

        //Para nomear os blocos no calendário
        $arrayMes = array(
            1 => 'Janeiro',
            2 => 'Fevereiro',
            3 => 'Março',
            4 => 'Abril',
            5 => 'Maio',
            6 => 'Junho',
            7 => 'Julho',
            8 => 'Agosto',
            9 => 'Setembro',
            10 => 'Outubro',
            11 => 'Novembro',
            12 => 'Dezembro'
        );

        //Vai guardar quantos dias tem cada mês
        $diasMeses = diasMeses();
        //Vai ligar o dia do mês com o dia da semana
        $arrayRetorno = array();

        for($m = date('n'); $m <= date('n')+4; $m++){
            //arrayRetorno na posição do mês atual e os próximos 4 meses vai receber um array
            $arrayRetorno[$m] = array();
            //Checa quantos dias tem cada mês e atribui um dia da semana a cada dia do mês
            for($d = 1; $d <= $diasMeses[$m]; $d++){
                $dayMonth = gregoriantojd($m, $d, date('Y'));
                $weekMonth = jddayofweek($dayMonth, 2); //Checa qual é o dia da semana referente à data armazenada em $dayMonth
                if($weekMonth == 'Mun') $weekMonth = 'Mon'; //jddayofweek retorna Munday ao invés de Monday
                $arrayRetorno[$m][$d] = $weekMonth;
            }
        }

        $arrayMesesTable = array();
        $cont = 0;

        //arrayMesesTable guardará os meses usados no calendario, os quais são o mês atual e os próximos 4 meses
        foreach($arrayMes as $num => $mes){
            if($num == date('n') || $num == date('n')+$cont){
                $arrayMesesTable[$num] = $mes;
                $cont++;
            }
        }

        echo '<a href="#" id="ant">&laquo;</a><a href="#" id="prox">&raquo;</a>';
        echo '<table border="0" width="100%">';
            foreach($arrayMesesTable as $num => $mes){ //Percorre o array de meses em português, pega o número do mês e seu nome
                echo '<tbody id="mes_'.$num.'" class="mes" name="mes" value="'.$num.'">'; //Cada mês terá um tbody
                echo '<tr class="mes_title"><td colspan="7">'.$mes.' '.date('Y').'</td></tr>'; //Cria uma linha que contém o nome do mês
                echo '<tr class="dias_title">';
                foreach($diasSemana as $i => $day){ //Percorre o array de dias da semana em portugês, pega o número do dia e seu nome
                    echo '<td>'.$day.'</td>'; //Cria uma coluna para cada dia dentro da tag tr que foi aberta no echo anterior e fechada o próximo echo
                }
                echo '</tr><tr>';
                $y = 0; //Será usado para identificar o dia da semana
                foreach($arrayRetorno[$num] as $numero => $dia){ //Percorre os dias do mẽs e seu respectivo dia da semana
                    $y++;
                    //Este if checa em qual dia da semana o mês começa
                    if($numero == 1){
                        $qtd = array_search($dia, $daysWeek); //Procura no array $daysWeek um valor igual ao armazenado em $dia e retorna o seu índice
                        //Checa quantos dias devem ser pulados até que chegue no dia 1 do mês em questão
                        for($i = 1; $i <= $qtd; $i++){
                            echo '<td></td>';
                            $y++;
                        }
                    }
                    //A linha 103 cria um td com input cujo id é o dia e o mês e seu valor é o dia, o mês e o ano
                    echo '<td class="td-relative"><input type="checkbox" class="dia-consulta" id="'.$numero.'-'.$num.'" name="dia[]" value="'.$numero.'-'.$num.'-'.date('Y').'"><label for="'.$numero.'-'.$num.'">'.$numero.'</label></td>';
                    //Se já se passaram 7 dias da semana, reinicia a contagem
                    if($y == 7){
                        $y = 0;
                        echo '</tr><tr>';
                    }
                }
                echo '</tr></tbody>';
            } 
        echo '</table>';
    }



