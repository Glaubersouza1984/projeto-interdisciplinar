<?php
    include_once 'includes/header.php'
?>

<div class="parallax-container">
      <div class="parallax"><img src="imagens/logo.jpg"></div>
    </div>
    <div class="section card-panel teal brown darken-4">
      <div class="row container">
        <h2 class="header">Cadastro de Usuário Vip</h2>
        <div class="row">
        <div class="col s12 m6 push-m3">
            
            <form action="php_action/create.php" method="POST">
               
                <div class="input-field col s12">
                    <input type="text" name="nome_usuario" id="nome_usuario">
                    <label for="nome_usuario">Nome Completo</label>
                </div>

                <div class="input-field col s12">
                    <input type="password" name="senha" id="senha">
                    <label for="senha">Definir Senha</label>
                </div>

                <div class="input-field col s12">
                    <input type="text" name="login" id="login">
                    <label for="login">Defina seu Login de Usuário</label>
                </div>    
                  
                <div class="input-field col s12">
                    <input type="email" name="email" id="email">
                    <label for="email">Digite seu E-mail</label>
                </div>

                <div class="input-field col s12">
                    <input type="number" name="cpf" id="cpf">
                    <label for="cpf">Digite Seu CPF</label>
                </div>

                <div class="input-field col s12">
                    <input type="tel" name="telefone" id="telefone" placeholder="03535518262">
                    <label for="telefone">Digite Seu Telefone para Contato com DDD</label>
                </div>

                <button type="submit" name="btn-cadastrar" class="btn grey"> Cadastrar </button>
                <a href="index.php" type="submit" class="btn black"> Login </a>
            </form>    
        </div>
    </div>         
      </div>
    </div>
    <div class="parallax-container">
      <div class="parallax"><img src="imagens/ambiente.jpg"></div>
    </div>


<?php
    include_once 'includes/footer.php'
?>