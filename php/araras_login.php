<?php
require_once('./conexao.php');
date_default_timezone_set('America/Sao_Paulo');

session_start();


if(isset($_POST['btn_login'])){
    $email_usu = $_POST['email'];
    $senha_usu = $_POST['senha'];
    $consulta = "SELECT id_usu FROM usuario_simples WHERE email_usu = '$email_usu' AND senha_usu = '$senha_usu'";
    $resultado = mysqli_query($conexao, $consulta);
    if(mysqli_num_rows($resultado) > 0){
        $dados = mysqli_fetch_array($resultado);
        $_SESSION['id_usu'] = $dados[0];
        header('Location: ./araras_home.php');
    }else{ ?>
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
    <title>Araras | Login Usuário</title>

    <!-- Logo do projeto -->
    <link rel="icon" href="../img/logo/favicon-araras.svg">

    <!-- Links css -->
    <link rel="stylesheet" href="../css/formularios/login.css">

    <!-- Links internos -->
    <script src="https://kit.fontawesome.com/68819aaeff.js" crossorigin="anonymous"></script>

</head>
<body>
<div class="container">
    <!-- Imagem -->
        <div class="cover">
            <div class="imagem">
                <img src="../img/geral/pexels-karolina-grabowska-8546025.jpg" alt="Imagem onde há duas mulheres conversanco em um ambiente de escritório.">
                <div class="text">
                    <span class="text-1">
                        Novos caminhos se abrem<br>
                        e novas redes se formam
                    </span>
                    <span class="text-2">Vamos nos conectar</span>
                </div>
            </div>
        </div>
        <div class="forms">
            <div class="form-content">
                <div class="login-form">
                    <div class="title">Login</div>                  
                </div>
                <form action="./araras_login.php" method="POST">
                    <div class="input-boxes">
                        <div class="input-box">
                            <i class="fas fa-envelope"></i>
                            <!-- Input e-mail -->
                            <input type="email" name = "email" placeholder="Digite o seu e-mail" required>
                        </div>
                        <div class="input-box">
                            <i class="fas fa-lock"></i>
                            <!-- Input senha -->
                            <input type="password" name="senha" placeholder="Digite a sua senha" required>
                        </div>
                        <div class="text"><a href="#">Esqueceu a senha?</a></div>
                        <div class="button input-box">
                            <input type="submit" value="Entrar" name="btn_login">
                        </div>
                        <div class="text sing-up-text">
                            <p>Não tem uma conta? <a href="./araras_cadastro.php">Cadastre-se agora</a></p>
                            <p>É uma empresa? <a href="./araras_login_emp.php">Entre como Empresa</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html> 