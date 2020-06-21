<?php 
    include 'conexao.php';    

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $apto = $_POST['apto'];
    $hotel = $_POST['hotel'];
    $reserva = $_POST['reserva'];
    $recep = $_POST['recep'];
    $rest = $_POST['rest'];
    $refei = $_POST['refei'];
    $monit = $_POST['monit'];
    $infra = $_POST['infra'];
    $limpeza = $_POST['limpeza'];
    $gostou = $_POST['gostou'];
    $melhoria = $_POST['melhoria'];
    $ip = $_SERVER['REMOTE_ADDR'];

    $salvar = $link -> query("INSERT INTO `pessoas` (
        `nome`,
        `email`,
        `apto`,
        `data`,
        `ip`) 
        VALUES (
        '{$nome}',
        '{$email}',
        '{$apto}',
        CURRENT_DATE,
        '{$ip}'        
        )
    ");
    $id_pessoa = $link->insert_id;

    $salvar2 = $link -> query(" INSERT INTO `respostas`(`id_pessoas`,`reserva`,`atendimento_recepcao`,`atendimento_restaurante`,`qualidade_refeicao`,`monitores`,`infra`, `limpeza`, `gosto_hotel`, `melhorias_hotel`, `conheceu_hotel`) 
    VALUES ('${id_pessoa}', '${reserva}', '${recep}', '${rest}', '${refei}', '${monit}', '${infra}', '${limpeza}', '${gostou}', '${melhoria}', '${hotel}')");

    if($salvar2):
        header('location:../concluido.php');
    endif;

?>  