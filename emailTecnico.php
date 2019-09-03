<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require './phpmailer/vendor/autoload.php';
    function emailTecnico(){
        try{
            $mail->isHTML(TRUE);
            $mail->Body = '
            <html lang="en">
            <head>
                <meta charset="UTF-8">
            </head>
            <body>
                <div class="wrapper">
                    <div class="title">
                        <h1>Pedido de Agendamento</h1>
                    </div>
                    <div class="dados-agendamento">
                        <div class="box">
                            <div class="titulo-dado">
                                SIAPE
                            </div>
                            <input type="text" class="dado" name="siape" id="siape" value="'.$_POST['siape'].' disabled">
                        </div>
        
                        <div class="box">
                            <div class="titulo-dado">
                                Professor
                            </div>
                            <input type="text" class="dado" name="prof" id="prof" value="'.$_POST['prof'].' disabled">
                        </div>
        
                        <div class="box">
                            <div class="titulo-dado">
                                E-mail
                            </div>
                            <input type="text" class="dado" name="email" id="email" value="'.$_POST['emailProf'].'" disabled>
                        </div>
        
                        <div class="box">
                            <div class="titulo-dado">
                                Código da Disciplina
                            </div>
                            <input type="text" class="dado" name="codDisc" id="codDisc" value="'.$_POST['codDisc'].'" disabled>
                        </div>
        
                        <div class="box">
                            <div class="titulo-dado">
                                Nome da Disciplina
                            </div>
                            <input type="text" class="dado" name="nomeDisc" id="codDisc" value="'.$_POST['nomeDisc'].'" disabled>
                        </div>
        
                        <div class="box>
                            <div class="montec">
                                <b>Monitor:</b> <p>'.$_POST['monitor'].'</p>
                                <b>Técnico:</b> <p>'.$_POST['tecnico'].'</p>
                            </div>
                        </div>
        
                        <div class="box">
                            <div class="titulo-dado">
                                Curso
                            </div>
                            <input type="text" class="dado" name="curso" id="curso" value="'.$_POST['curso'].'" disabled>
                        </div>
        
                        <div class="box">
                            <div class="titulo-dado>
                                Setor
                            </div>
                            <input type="text" class="dado" name="setor" id="setor" value="'.$_POST['setor'].'" disabled>
                        </div>
        
                        <div class="box">
                            <div class="titulo-dado>
                                Horário de Início
                            <div>
                            <input type="text" class="dado" name="horainicio" id="horainicio" value="'.$_POST['horainicio'].'" disabled>
                        </div>
        
                        <div class="box">
                            <div class="titulo-dado">
                                Data
                            </div>
                            <input type="text" class="dado" name="data" id="data" value="'.$_POST['dia'].'" disabled>
                        </div>
        
                        <div class="box">
                            <div class="titulo-dado">
                                Horário Final    
                            </div>
                            <input type="text" class="dado" name="horafinal" id="horafinal" value="'.$_POST['horafinal'].'" disabled>
                        </div>
        
                        <div class="box">
                            <div class="titulo-dado">
                                Número de Alunos
                            </div>
                            <input type="text" class="dado" name="numAlunos" id="numAlunos" value="'.$_POST['numAlunos'].'" disabled>
                        </div>
        
                        <div class="botoes">
                            <div id="confirmar">
                                <button>Confirmar</button>
                            </div>
        
                            <div id="recusar">
                                <button>Recusar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </body>
            </html>';
        
            $mail->setFrom($_POST['emailProd'], $_POST['professor']);
            $mail->addAddress('convictedcf@hotmail.com', 'lucas');
            $mail->Subject = 'Agendamento de Aula';
            $mail->send();
            echo "<script>console.log('email enviado');</script>";
        } catch(Exception $e){
            echo "<script>console.log('Erro ao enviar o email: '".$e->errorMessage().");</script>";
        } catch(\Exception $e){
            echo "<script>console.log('Erro ao enviar o email: '".$e->getMessage().");</script>";
        }
    }
    


// <!DOCTYPE html>
// <html lang='en'>
// <head>
//     <meta charset='UTF-8'>
// </head>
// <body>
//     <div class='wrapper'>
//         <div class='title'>
//             <h1>Pedido de Agendamento</h1>
//         </div>
//         <div class='dados-agendamento'>
//             <div class='box'>
//                 <div class='titulo-dado'>
//                     SIAPE
//                 </div>
//                 <input type='text' class='dado' name='siape' id='siape' value=$_POST[\'siape\']>
//             </div>
//         </div>
//     </div>
// </body>
// </html>

