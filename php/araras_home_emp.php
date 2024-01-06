<?php

require_once('./conexao.php');
date_default_timezone_set('America/Sao_Paulo');

session_start();
if(!isset($_SESSION['id_res'])){
    header('Location: ./araras_login_emp.php');
    exit;
}

$_SESSION['id_emp'];

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Araras para Empresas | Home</title>

    <!-- Logo do projeto -->
    <link rel="icon" href="../img/logo/favicon-araras.svg">

    <!-- Links css -->
    <link rel="stylesheet" href="../css/fixos/menu_emp.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/home_emp.css">
    
    <!-- Links internos -->
    <script src="https://kit.fontawesome.com/68819aaeff.js" crossorigin="anonymous"></script>

</head>
<body>
    <header>
        <!-- Nav bar do site -->
        <nav id="nav">
            <!-- Logo -->
            <div class="logo">
              <a href="./araras_home_emp.php"><img src="../img/logo/favicon-araras128px.svg" alt="Logo de uma arara azul em forma de desenho, com os olhos fechados e sorrindo, cor roxo azulado e com somente a parte da cabeça amostra."></a>
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
                    <li><a href="./araras_home_emp.php">Home</a></li>
                    <li><a href="./araras_vagas_emp.php">Cadastrar Vagas</a></li>
                    <li><a href="./araras_historico_emp.php">Historico Empresa</a></li>
                    <li><a href="./araras_vagas_cadastradas_emp.php">Vagas Cadastradas</a></li>
                    <li><a href="./araras_candidatos_emp.php">Visualizar Candidatos</a></li>
                    <li><a href="./araras_perfil_emp.php" class="menu_oculto">Perfil</a></li>
                    <li><a href="#" class="menu_oculto">Trocar idioma</a></li>
                    <li><a href="./logout_emp.php" class="menu_oculto">Sair</a></li>
                </ul>
            </div>

            <!-- Botões de entrar e troca de idioma -->
            <div class="botoes">
                <ul>
                    <li>
                        <a href="./araras_perfil_emp.php">
                            <!-- <img src="./img/icones/icone_conta.png"  class="img_conta"> -->
                            <i class="fa-solid fa-user"></i>
                            <p>Perfil</p>
                        </a>
                    </li>
                    <li>
                        <a href="./logout_emp.php" >
                            <!-- <img src="../img/icones/icone_sair.png" class="img_sair"> -->
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <p>Sair</p>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Main - conteúdo da página -->
    <main>
        <div class="container">
            <!-- Parte principal -->
            <div class="parte_principal">
                <div class="lado_esquerdo">
                    <!-- Tetxo principal -->
                   <div class="texto_principal">
                        <!-- Parte para cumprimentar a empresa -->
                        <h1>
                            Olá,
                            <b>
                                 <?php
                                $sql = "SELECT * FROM empresa_simples WHERE id_emp = ".$_SESSION['id_emp'];
                                $consulta = mysqli_query($conexao, $sql);
                                foreach($consulta as $Consulta){
                                    echo $Consulta['nome_fantasia_emp']." !";
                                }
                                ?>
                            </b>
                        </h1>
                        <h2>
                            Esteja junto de seus candidatos, analise-os e encontre o melhor perfil para sua cultura e empresa.
                        </h2>
                   </div>
                   <!-- Botão para ir para as vagas -->
                   <div class="botao_principal">
                        <button>
                            <a href="./araras_candidatos_emp.php">Visualizar Candidatos</a>
                        </button>
                   </div>
                </div>
                <div class="lado_direito">
                    <!-- Imagem principal -->
                    <div class="imagem_principal">
                        <img src="../img/geral/jason-goodman-Oalh2MojUuk-unsplash.jpg" alt="Cinco pessoas em um ambiente corporativo. O ambiente é comporto por uma grande mesa branca que contém 4 notbooks juntamente com livros, canecas e utensilios de escritório, o ambiente contém uma janela branca no lado esquerdo e em frete, há uma parece branca com post it cor de rosa, amarela e laranja.">
                         <!-- https://unsplash.com/photos/Oalh2MojUuk?utm_source=unsplash&utm_medium=referral&utm_content=creditShareLink -->
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Script referente a navbar -->
    <script type="text/javascript" src="../js/fixos/mobile-navbar.js"></script>
</body>
</html>