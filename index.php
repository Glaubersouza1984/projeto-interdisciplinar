<?php
    include_once 'php_action/db_connect.php';
    include_once 'includes/header.php';
?>

<?php
    $sql = "SELECT * FROM usuario WHERE idUsuario = 3";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
    
    echo $dados['nome_usuario'];
   
?>

<a href="editar.php?idUsuario=<?php echo $dados['idUsuario']; ?>" class="btn-floating orange"><i class="material-icons">edit</i></a>

<br/>
<?php
    echo"Teste Tela de Login";
    
?>

<?php
include_once 'includes/footer.php';
?>