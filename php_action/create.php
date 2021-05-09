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

        $sql = "SELECT cpf FROM usuario WHERE cpf = '$cpf'";
        $sql = mysqli_query($connect, $sql); 
        if($sql > 0){
            $_SESSION['mensagem'] = "CPF JÁ CADASTRADO CONTATE ADMINISTRADOR PARA RECUPERAR SUA SENHA";
            header('Location: ../index.php?'); 
        }
        
        if (strlen($cpf) != 11) {
            $_SESSION['mensagem'] = "Erro ao Cadastrar - CPF Precisa ter 11 dígitos!";
            header('Location: ../index.php?');
        }
        
        else if
           ($cpf == '00000000000' || 
            $cpf == '11111111111' || 
            $cpf == '22222222222' || 
            $cpf == '33333333333' || 
            $cpf == '44444444444' || 
            $cpf == '55555555555' || 
            $cpf == '66666666666' || 
            $cpf == '77777777777' || 
            $cpf == '88888888888' || 
            $cpf == '99999999999') {
            $_SESSION['mensagem'] = "Erro ao Cadastrar! - CPF Inválido";
            header('Location: ../index.php?');
    
         } else {   
             
            for ($t=9; $t<11; $t++) {
             
                for ($d=0, $c=0; $c<$t; $c++) {
                    $d += $cpf[$c] * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf[$c] !=$d) {
                    $_SESSION['mensagem'] = "Erro ao Cadastrar! - CPF Inválido";
                    header('Location: ../index.php?');
                }
            }
            
            $sql = "INSERT INTO usuario (nome_usuario, senha, login, data_cadastro, email, cpf, telefone) values ('$nome_usuario', MD5('$senha'), '$login', now(), '$email', '$cpf', '$telefone')";

        } 
            
        if(mysqli_query($connect, $sql)):
            $_SESSION['mensagem'] = "Cadastrado com sucesso!";
            header('Location: ../index.php?');  
        endif;
    
    endif;         
?>