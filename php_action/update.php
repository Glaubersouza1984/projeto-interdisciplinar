<?php
    session_start();

    require_once 'db_connect.php';

    if(isset($_POST['btn-editar'])):
        $nome_usuario = mysqli_escape_string($connect, $_POST['nome_usuario']);
        $senha = mysqli_escape_string($connect, $_POST['senha']);
        $login = mysqli_escape_string($connect, $_POST['login']);
        $email = mysqli_escape_string($connect, $_POST['email']);
        $cpf = mysqli_escape_string($connect, $_POST['cpf']);
        $telefone = mysqli_escape_string($connect, $_POST['telefone']);

        $idUsuario = mysqli_escape_string($connect, $_POST['idUsuario']);
 
        $sql = "UPDATE usuario SET nome_usuario = '$nome_usuario', senha = MD5('$senha'), login = '$login', email = '$email', cpf = '$cpf', telefone = '$telefone'
        WHERE idUsuario = '$idUsuario'";
   
    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Alterado com sucesso!";
        header('Location: ../home.php?');
    else: 
        $_SESSION['mensagem'] = "Erro ao alterar!";
        header('Location: ../home.php?');
    endif;

endif;
?>