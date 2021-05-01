<?php
//conexão
require_once 'php_action/db_connect.php';
include_once 'includes/header.php';

//sessão
session_start();

//botão enviar
if(isset($_POST['btn-entrar'])):
    $erros = array();
    $login = mysqli_escape_string($connect, $_POST['login']);
    $senha = mysqli_escape_string($connect, $_POST['senha']);
    // verificar se o campo usuário ou senha está vazio.
    if(empty($login) or empty($senha)):
        $erros[] = "<li> O campo login/senha precisa ser preenchido </li>";//array para armazenar erros
    else:
        $sql = "SELECT login FROM usuario WHERE login = '$login'";
        $resultado = mysqli_query($connect, $sql);

        //verificar se o que veio da variável resultado é maior do que zero se sim o usuário existe no banco de dados

        if(mysqli_num_rows($resultado) > 0):
            $senha = md5($senha);
            $sql = "SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha'";
            $resultado = mysqli_query($connect, $sql);

            if(mysqli_num_rows($resultado) == 1):
                $dados = mysqli_fetch_array($resultado);
                mysqli_close($connect);
                $_SESSION['logado'] = true;
                $_SESSION['id_usuario'] = $dados['idUsuario'];
                header('Location:home.php');
            else:
                $erros[] = "<li>Login ou senha inválido !! Tente Novamente.</li>";
            endif;
        else:
            $erros[] = "<li>Login não possui cadastro, clique abaixo para cadastrar !! </li>";
        endif;   

    endif;
endif;
?>


<html>

<head>
    <title>Login</title>
    <meta charset="utf-8">
</head>

<body>

    <div class="parallax-container">
        <div class="parallax"><img src="imagens/logo.jpg"></div>
    </div>
    <div class="section card-panel teal brown darken-4">
        <div class="row container">
            <h2 class="header">Login de Usuário Vip</h2>
            <!-- Se o array erros não estiver vazio é porque contém erro vai exibir.-->
            <?php
                if(!empty($erros)):
                    foreach($erros as $erro):
                        echo $erro;
                    endforeach;
                endif;
            ?>
            <div class="row">

                <div class="col s12 m8 push-m2">

                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="input-field col s12">
                            Login: <input type="text" name="login"></br>
                        </div>

                        <div class="input-field col s12">
                            Senha: <input type="password" name="senha"></br>
                        </div>
                        <button type="submit" name="btn-entrar" class="btn black">Entrar</button>
                        
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="parallax-container">
        <div class="parallax"><img src="imagens/ambiente.jpg"></div>
    </div>

</body>

</html>

<?php
    include_once 'includes/footer.php'
?>