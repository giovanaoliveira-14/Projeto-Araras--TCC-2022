<?php

require_once('./conexao.php');
date_default_timezone_set('America/Sao_Paulo');

session_start();
if(!isset($_SESSION['id_usu'])){
    header('Location: ./araras_login.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Araras | Home</title>

    <!-- Logo do projeto -->
    <link rel="icon" href="../img/logo/favicon-araras.svg">

    <!-- Links css -->
    <link rel="stylesheet" href="../css/fixos/menu.css">
    <link rel="stylesheet" href="../css/home.css">

    <!-- Links internos -->
    <script src="https://kit.fontawesome.com/68819aaeff.js" crossorigin="anonymous"></script>
    
</head>
<body>
     <header>
        <!-- Nav bar do site -->
        <nav id="nav">
            <!-- Logo -->
            <div class="logo">
              <a href="./araras_home.php"><img src="../img/logo/favicon-araras128px.svg" alt="Logo de uma arara azul em forma de desenho, com os olhos fechados e sorrindo, cor roxo azulado e com somente a parte da cabeça amostra."></a>
            </div>

            <!-- Opção de aparecer o menu em tela menos de 999px -->
            <div id="btn-mobile" class="mobile-menu">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>

            <!-- Links do menu -->
            <div class="menu">
                <ul class="testeteste">
                    <li><a href="./araras_home.php">Home</a></li>
                    <li><a href="./araras_trabalhos_usu.php">Vagas de trabalho</a></li>
                    <li><a href="./araras_pro_seletivo.php">Processos Seletivos</a></li>
                    <li><a href="./araras_perfil.php" class="menu_oculto">Perfil</a></li>
                    <li><a href="#" class="menu_oculto">Trocar idioma</a></li>
                    <li><a href="./logout_usu.php" class="menu_oculto">Sair</a></li>
                </ul>
            </div>

            <!-- Botões de entrar e troca de idioma -->
            <div class="botoes">
                <ul>
                    <li>
                        <a href="./araras_perfil.php">
                            <!-- <img src="./img/icones/icone_conta.png"  class="img_conta"> -->
                            <i class="fa-solid fa-user"></i>
                            <p>Perfil</p>
                        </a>
                    </li>

                    <li>
                        <a href="#" >
                            <!-- <img src="./img/icones/icone_tradutor_globo.png" class="img_idioma"> -->
                            <i class="fa-solid fa-globe"></i>
                            <p>Idioma</p>
                        </a>
                    </li>
                    <li>
                        <a href="./logout_usu.php" >
                            <!-- <img src="../img/icones/icone_sair.png" class="img_sair"> -->
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <p>Sair</p>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Main - Conteúdo do página -->
    <main>
        <div class="container">
            <!-- Parte principal -->
            <div class="parte_principal">
                <div class="lado_esquerdo">
                    <!-- Tetxo principal -->
                   <div class="texto_principal">
                        <!-- Parte para cumprimentar o usuário -->
                        <h1>
                            Olá,
                            <b>
                            <?php
                                $sql = "SELECT * FROM usuario_simples WHERE id_usu = ".$_SESSION['id_usu'];
                                $consulta = mysqli_query($conexao, $sql);

                                foreach($consulta as $Consulta){
                                    if($Consulta['nome_social_usu'] == ''){
                                        echo $Consulta['nome_usu']." !";
                                    }else{
                                        echo $Consulta['nome_social_usu']." !";
                                    }
                                }
                            ?>
                            </b>
                        </h1>
                        <h2>
                            Veja as diversas vagas que estão disponíveis para você
                        </h2>
                   </div>
                   <!-- Botão para ir para as vagas -->
                   <div class="botao_principal">
                        <button>
                            <a href="./araras_trabalhos_usu.php">Vagas de Trabalho</a>
                        </button>
                   </div>
                </div>
                <div class="lado_direito">
                    <!-- Imagem principal -->
                    <div class="imagem_principal">
                        <img src="../img/geral/surface-8HPLpr3hebU-unsplash.jpg" alt="Mulher negra senta com o seu notbook aberto em um ambiente de sala de estar. Mulher negra, com cabelo médio cacheado, veste uma camiseta de manga longa preta por baixo de seu casaco marrom com detalhes de linhas retas verticais e horizontais, usa uma calça preta, utiliza brincos em forma de argolas, olha diretamente para o notbook sorrindo. Notbook cor beje com uma logo do Windows. Ambiente: A mulher está sentada em um sofá azul forte, as paredes do ambiente são de madeira, atrás dela há uma televisão e uma estante pretas.">
                        <!-- https://unsplash.com/photos/8HPLpr3hebU?utm_source=unsplash&utm_medium=referral&utm_content=creditShareLink -->
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Script referente a navbar -->
    <script type="text/javascript" src="../js/fixos/mobile-navbar.js"></script>
</body>
</html>