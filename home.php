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

    <div class="parallax-container">
        <div class="parallax"><img src="imagens/ambiente.jpg"></div>
    </div>

    <div class="section card-panel teal brown darken-4">

        <div class="row container">
            <h2 class="header">
                <h1 class="white-text">Olá
                    <?php echo $dados['nome_usuario']; ?>
                    <div class=""></div>
                </h1>
            </h2>

            <h3 class="center">Bem Vindo ao Salão Inteligente !!</h3>
            <div class="row">
                <div class="col s12 m8 push-m2">


                    <div style="text-align:center;">

                        <h4 class="white-text">Selecione abaixo a melhor opção</h4>
                        <br /><br />
                        <button type="submit" name="btn-agendar" class="btn black"><a class="white-text"
                                href="agendamento.php">Clique
                                para
                                agendar</a></button>
                        <br /><br />
                        <button type="submit" name="btn-historico" class="btn black"><a class="white-text"
                                href="historico.php">Consultar Histórico</a></button>
                        <br /><br />
                        <button type="submit" name="btn-editar" class="btn black"><a class="white-text"
                                href="editar.php?idUsuario=<?php echo $dados['idUsuario']; ?>">Editar
                                seu
                                cadastro</a></button>
                        <br /><br />

                        <button type="submit" name="btn-sair" class="btn grey"><a class="white-text"
                                href="logout.php">Logout</a></button>
                        <br /><br />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="parallax-container">
        <div class="parallax"><img src="imagens/barber.jpg"></div>
    </div>

</body>

</html>

<?php
    include_once 'includes/footer.php'
?>