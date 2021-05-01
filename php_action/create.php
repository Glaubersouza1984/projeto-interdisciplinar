<?php
    session_start();

    require_once 'db_connect.php';

    if(isset($_POST['btn-cadastrar'])):
        $nome_usuario = mysqli_escape_string($connect, $_POST['nome_usuario']);
        $senha = mysqli_escape_string ($connect, $_POST ['senha']);
        $login = mysqli_escape_string($connect, $_POST['login']);
        $email = mysqli_escape_string($connect, $_POST['email']);
        $cpf = mysqli_escape_string($connect, $_POST['cpf']);
        $telefone = mysqli_escape_string($connect, $_POST['telefone']);
                        
    $sql = "INSERT INTO usuario (nome_usuario, senha, login, data_cadastro, email, cpf, telefone) values ('$nome_usuario', MD5('$senha'), '$login', now(), '$email', '$cpf', '$telefone')";      
    
    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Cadastrado com sucesso!";
        header('Location: ../usuario.php?');
    else: 
        $_SESSION['mensagem'] = "Erro ao Cadastrar!";
        header('Location: ../usuario.php?');
    endif;

endif;
?>