<?php

session_start();

require_once 'db_connect.php';

if(isset($_POST['btn-agendar'])){

   $idUsuario = mysqli_escape_string($connect, $_POST['idUsuario']);        
   $data = mysqli_escape_string($connect, $_POST['data']);
   // $horas = mysqli_escape_string($connect, $_POST['horas']);
   // $servicos = mysqli_escape_string($connect, $_POST['1 , 2, 3']);
   $dataformat = date("Y-m-d", strtotime($data));
   // $horaformatada = date("H:i",strtotime($horas));
   
    //$sql = "INSERT INTO agendar_servicos( data_solicitacao, data_servico, horas , usuario, servicos) VALUES (now(),'$dataformat','$horaformatada','$id_usuario','$servicos')";
   
    echo $id_usuario;
    echo $dataformat;

    /*if(mysqli_query($connect, $sql)){
        $_SESSION['message'] = "Cadastrado com sucesso";
        header('Location: ../agendamento.php');
        }  else{
        $_SESSION['message'] = "Erro ao cadastrar";
        header('Location: ../agendamento.php');
    }*/
}
?>