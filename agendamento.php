<?php
include_once 'php_action/db_connect.php';
include_once 'includes/header.php';

//sessão
session_start();

//verificação
if(!isset($_SESSION['logado'])):
    header('Location: login.php');
endif;

if(isset($_GET['idUsuario'])):
    $idUsuario = mysqli_escape_string($connect, $_GET['idUsuario']);
    $sql = "SELECT * FROM usuario WHERE idUsuario = $idUsuario";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
endif;
?>

<html>

<body>
    <div class="parallax-container">
        <div class="parallax"><img src="imagens/ambiente.jpg"></div>
    </div>

    <div class="section card-panel teal brown darken-4">

        <div class="row container">
            <h2 class="header">
                <h1 class="white-text">Ótimo,
                    <?php echo $dados['nome_usuario']; ?>.
                </h1>
            </h2>

            <div class="row">
                <div class="col s12 m8 push-m2">


                    <div style="text-align:center;">

                        <h1 class="white-text">Bora Agendar !!</h1>
                        <form id="agendar" action="php_action/agendar.php" method="POST">
                            <input type="hidden" name="idUsuario" value="<?php echo $dados['idUsuario'];?>">

                            <div class="input-field col s12">
                                <h5 class="white-text">Quando?</h5>
                                <input type="text" id="data" name="data" class="datepicker" value="Escolher a data"
                                    style="text-align:center;">

                                <input type="text" name="horas" id="horas" class="timepicker" value="Escolher o horario"
                                    style="text-align:center;">

                            </div>

                            <div class="row">
                                <h5 class="white-text">O que vamos fazer?</h5>

                                <div class="input-field col s12">
                                    <select name="servico">
                                        <option value="" disabled selected>Selecionar serviços :</option>
                                        <option id="1" name="1" value="1">Corte</option>
                                        <option id="4" name="4" value="4">Barba</option>
                                        <option id="5" name="5" value="5">Corte e Barba</option>
                                        </optgroup>
                                    </select>
                                </div>


                                <button type="submit" name="btn-agendar" id="btn-agendar"
                                    class="btn waves-effect waves-large black accent-3"><a
                                        class="white-text">Agendar</a>
                                    <i class="large material-icons right">alarm_on</i></button>
                                <br />

                                <br />

                                <button type="submit" name="btn-sair" class="btn black"><a class="white-text"
                                        href="home.php">Voltar</a></button>
                                <br />

                                <br />

                                <button type="submit" name="btn-sair" class="btn black"><a class="white-text"
                                        href="logout.php">Clique para sair!</a></button>
                                <br />

                            </div>
                        </form>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.datepicker');
    var instances = M.Datepicker.init(elems, options);

});

// Or with jQuery

$(document).ready(function() {
    $('.datepicker').datepicker();

});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.timepicker');
    var instances = M.Timepicker.init(elems, options);

});

// Or with jQuery

$(document).ready(function() {
    $('.timepicker').timepicker();
});
</script>