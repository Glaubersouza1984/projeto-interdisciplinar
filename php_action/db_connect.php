<?php
    //conexão com banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "salao_inteligente";

    $connect = mysqli_connect ($servername, $username, $password, $db_name);
    mysqli_set_charset ($connect, "UTF-8");

    if(mysqli_connect_error()):
        echo "Erro na conexão: ".mysqli_connect_error();
    endif;
?>