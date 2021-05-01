<html>
<link rel="stylesheet" type="text/css" href="includes/meuestilo.css">

</html>

<?php

//Connection
include_once 'php_action/db_connect.php';

//Header
include_once 'includes/header.php';

?>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="ligth"> Hitorico do Cliente </h3>
        <table class="striped">
            <thead>
                <tr>
                    <th id="table_title">ID da Solicitação</th>
                    <th id="table_title">Data Solicitação</th>
                    <th id="table_title">Data do Serviço</th>
                    <th id="table_title">Serviço</th>
                    <th id="table_title">Status</th>

                </tr>
            </thead>

            <tbody>
                <?php

                    $idUsuario = mysqli_escape_string($connect, $_POST['idUsuario']);

                    $sql = "SELECT * FROM historico_servicos LEFT JOIN agendar_servicos ON agendar_servicos.idagendar_servicos=historico_servicos.idagendar_servicos 
                    LEFT JOIN usuario ON usuario.idUsuario=agendar_servicos.usuario WHERE usuario.idUsuario=<? Php echo $ dados ['idUsuario']; ?>";

                $resultado = mysqli_query($connect, $sql);
                if(mysqli_num_rows($resultado) > 0):

                while($dados = mysqli_fetch_array($resultado)):
                ?>
                <tr>
                    <td id="table_dados"> <?php echo $dados['idagendar_servicos']; ?> </td>
                    <td id="table_dados"> <?php echo date("d/m/Y", strtotime($dados['data_solicitacao'])); ?> </td>
                    <td id="table_dados"> <?php echo date("d/m/Y", strtotime($dados['data_servico'])); ?> </td>
                    <td id="table_dados"> <?php echo $dados['servicos']; ?> </td>
                    <td id="table_dados"> <?php echo $dados['status']; ?> </td>



    </div>

    </tr>

    <?php 
                endwhile; 
                 else: ?>

    <tr>
        <td id="table_dados">-</td>
        <td id="table_dados">-</td>
        <td id="table_dados">-</td>
        <td id="table_dados">-</td>
        <td id="table_dados">-</td>
        <td id="table_dados">-</td>
    </tr>



    <?php
                endif;
                ?>

    </tbody>
    </table>
    <br>

    Legenda
    <br>
    Serviços: 1-Corte 2-Barba 3-Sobrancelha
    <br>
    Status: 0-Pendente 1-Finalizado

</div>
</div>


<?php
//Footer
include_once 'includes/footer.php';
?>