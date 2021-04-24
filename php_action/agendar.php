<?php

session_start();

require_once 'db_connect.php';

if(isset($_POST['btn-agendar'])){

    //if(empty($_POST('data')) || $_POST('hora')){
    //    header('Location : ../index.php');
    }else {

    $data = mysqli_escape_string($connect, $_POST['data']);
    $horas = mysqli_escape_string($connect, $_POST['horas']);
    $servicos = mysqli_escape_string($connect, $_POST['1 , 2, 3']);
    $id_usuario = mysqli_escape_string($connect, $_POST['id_usuario']);

    $sql = "INSERT INTO agendar_servicos (data_solicitacao, data_servico, horas, usuario, servicos, servicos, servicos) VALUES ( now(), '$data', '$horas', '$id_usuario', '$servicos')";

    if(mysqli_query($connect, $sql)){
        $_SESSION['message'] = "Cadastrado com sucesso";
        header('Location: ../agendamento.php');
        }  else{
        $_SESSION['message'] = "Erro ao cadastrar";
        header('Location: ../agendamento.php');
    }
}
?>