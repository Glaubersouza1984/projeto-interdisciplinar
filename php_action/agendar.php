<?php
//Sessao
session_start();
// Connection

require_once 'db_connect.php';

if(isset($_POST['btn-agendar'])) {
    $idUsuario = mysqli_escape_string($connect, $_POST['idUsuario']);
    $data = mysqli_escape_string($connect, $_POST['data']);
    $horas = mysqli_escape_string($connect, $_POST['horas']);
    $servicos = mysqli_escape_string($connect, $_POST['servico']);
    $dataformat = date("Y-m-d", strtotime($data));
    $horaformatada = date("H:i",strtotime($horas));

echo $idUsuario;

/*  insert na tabela agendar servicos    */
$sql = "INSERT INTO agendar_servicos( data_solicitacao, data_servico, horas , usuario, servicos) VALUES (now(),'$dataformat','$horaformatada','$idUsuario','$servicos')";
$sql = mysqli_query($connect, $sql); 

/*  insert na tabela historico de  servicos    */
$sql = "INSERT INTO historico_servicos(data_solicitacao, data_servico, servicos, status) VALUES (now(), '$dataformat','$servicos','1')";
   $sql = mysqli_query($connect, $sql);   
    }

    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Agendado com sucesso!";
        header('Location: ../home.php?');
    else: 
        $_SESSION['mensagem'] = "Erro ao Agendar!";
        header('Location: ../home.php?');
    endif;

?>