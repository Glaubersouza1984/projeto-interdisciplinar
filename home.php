<?php
//conexão
require_once 'php_action/db_connect.php';
include_once 'includes/header.php';

//sessão
session_start();

//verificação
if(!isset($_SESSION['logado'])):
    header('Location: login.php');
endif;

//Dados
$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuario WHERE idUsuario = '$id'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);
mysqli_close($connect);
?>

<html>

<head>
    <title>Página Restrita</title>
    <meta charset="utf-8">
</head>

<body>
    <h1>Olá <?php echo $dados['nome_usuario']; ?></h1>
    <a href="logout.php">Encerrar Sessão</a>
</body>

</html>