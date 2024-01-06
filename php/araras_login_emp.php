<?php

require_once('./conexao.php');
date_default_timezone_set('America/Sao_Paulo');
 
session_start();


if(isset($_POST['btn_login_emp'])){

    $email_emp = $_POST['email_res'];
    $senha_emp = $_POST['senha_res'];

    $consulta = "SELECT id_res FROM responsavel_empresarial WHERE email_res = '$email_emp' AND senha_res = '$senha_emp'";
    $resultado = mysqli_query($conexao, $consulta);

    if(mysqli_num_rows($resultado) > 0){
        $dados = mysqli_fetch_array($resultado);
        $_SESSION['id_res'] = $dados[0];
        $buscando = "SELECT id_emp FROM empresa_simples AS empresa
        LEFT JOIN responsavel_empresarial AS responsavel ON empresa.id_responsavel_emp = responsavel.id_res where responsavel.id_res =".$_SESSION['id_res'];
        $resultado = mysqli_query($conexao, $buscando);
        $buscar_id = mysqli_fetch_array($resultado);
        $_SESSION['id_emp'] = $buscar_id['id_emp'];
         header('Location: ./araras_home_emp.php');
    }else{
        ?>
        <div class="area_de_cima">
            <div class="mensagem_erro">
                <h3>
                    <?php  echo "Senha ou e-mail estão incorretos."; ?>
                </h3>
            </div>  
        </div>       
        <?php
    }
}else{
    
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Araras | Login Empresa</title>

    <!-- Logo do projeto -->
    <link rel="icon" href="../img/logo/favicon-araras.svg">

    <!-- Links css -->
    <link rel="stylesheet" href="../css/formularios/login_emp.css">

    <!-- Links internos -->
    <script src="https://kit.fontawesome.com/68819aaeff.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <!-- Imagem -->
        <div class="cover">
            <div class="imagem">
                <img src="../img/geral/pexels-mart-production-7550440.jpg" alt="Imagem onde há duas mulheres conversando em um ambiente de escritório com os braços em cima da mesa. Mesa contém dois cadernos, lapís e notbook.">
                <div class="text">
                    <span class="text-1">
                        Cada nova empresa aqui<br>
                        é uma oportunidade de crescimento para todos
                    </span>
                    <span class="text-2">Vamos crescer juntos</span>
                </div>
            </div>
        </div>
    
        <div class="forms">
            <div class="form-content">
                <div class="login-form">
                    <div class="title">Login</div>                  
                </div>
                <form action="./araras_login_emp.php" method="POST">
                    <div class="input-boxes">
                        <div class="input-box">
                            <!-- Input e-mail -->
                            <i class="fas fa-envelope"></i>
                            <input type="email" name="email_res" placeholder="Digite o e-mail do responsável empresarial" required>
                        </div>
                        <div class="input-box">
                            <!-- Input senha -->
                            <i class="fas fa-lock"></i>
                            <input type="password" name="senha_res" placeholder="Digite a senha" required>
                        </div>
                        <div class="text"><a href="#">Esqueceu a senha?</a></div>
                        <div class="button input-box">
                            <input type="submit" value="Entrar" name="btn_login_emp">
                        </div>
                        <div class="text sing-up-text">
                            <p>Não tem uma conta? <a href="./araras_cadastro_emp.php">Cadastre sua empresa agora</a></p>
                            <p>É um usuário já cadastrado? <a href="./araras_login.php">Acesse aqui!</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>