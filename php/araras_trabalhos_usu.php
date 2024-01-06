<?php
require_once('./conexao.php');
date_default_timezone_set('America/Sao_Paulo');

session_start();

$_SESSION['id_usu'];

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Araras | Trabalhos disponíveis</title>

    <!-- Logo do projeto -->
    <link rel="icon" href="../img/logo/favicon-araras.svg">

    <!-- Links css -->
    <link rel="stylesheet" href="../css/fixos/menu.css">
    <link rel="stylesheet" href="../css/trabalhos_usu.css">

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
    <main>
    <div class="container">
            <div class="area_busca">
                <div class="campo_form">
                    <form action="#" method="GET">
                        <div class="campo_input">
                            <label for="filtro_vagas">Buscar trabalhos disponíveis</label>
                            <input type="search" name="filtro_vagas" id="filtro_vagas" placeholder="Buscar trabalhos disponíveis">
                        </div>
                        <div class="campo_input">
                            <input type="submit" value="Buscar">
                        </div>
                    </form>
                </div>
            </div>
        
            <div class="conteudo">
                <!-- Parte dos cards -->
                <div class="sessao_cards">
                    <?php
                    $sql = "SELECT * FROM vagas";
                    $consulta = mysqli_query($conexao, $sql);
                    // Se caso não houver vagas de emprego registradas 
                    if(mysqli_num_rows($consulta) == 0){ ?>
                        <div class="msg_sem_registros">
                            <article>
                                <!-- Mostrar mensagem de não registrado -->
                                <h2>Não há registros aqui</h2>
                            </article>
                       </div>
                    <?php
                    //  Se caso existir registro
                    }else{
                    foreach ($consulta as $mostrar) {
                    ?>
                        <!-- Estrutura do card -->
                        <div class="card_trabalho">
                            <!-- Favoritar -->
                            <div class="favorito">
                                <i class="fa-solid fa-heart"></i>
                            </div>
                            <!-- Imagem do card - imagem referente a imagem da vaga -->
                            <div class="imagem_card">
                                <?php
                                $sql = "SELECT * FROM imagens_vagas";
                                $buscar = mysqli_query($conexao, $sql);

                                foreach ($buscar as $imagem) {
                                    if ($imagem['id_vaga_img'] == $mostrar['id_vagas']) { ?>
                                        <img src="../imagens_vagas/<?php echo $imagem['imagem_vag'] ?>">
                                <?php
                                    }
                                }
                                ?>
                            </div>
                            <!-- Conteúdo de informações e botões da vaga -->
                            <div class="conteudo_vaga">
                                <!-- Nome da vaga  -->
                                <div class="nome_vaga">
                                    <h2>
                                        <?php
                                        echo $mostrar['nome_vagas'];
                                        ?>
                                    </h2>
                                    <!-- Nome da empresa que a vaga pertence -->
                                        <?php
                                        $sql = "SELECT * FROM empresa_simples AS empresa
                                        LEFT JOIN vagas AS vaga ON empresa.id_emp = vaga.id_empresa_vagas WHERE vaga.id_vagas = " . $mostrar['id_vagas'];
                                        $nomes = mysqli_query($conexao, $sql);
                                        foreach ($nomes as $nome) {
                                            $_SESSION['id_emp'] = $nome['id_emp'];
                                            if ($nome['id_emp'] == $mostrar['id_empresa_vagas']) { ?>
                                                <p>
                                                    <?php
                                                    echo $nome['nome_fantasia_emp'];
                                                    ?>
                                                </p>
                                        <?php
                                            }
                                        }
                                        ?>
                                </div>
                                <div class="datas_vaga">
                                    <!-- Data na qual a vaga foi cadastrada -->
                                    <div class="data">
                                        <p>Data inicio: </p>
                                        <p>
                                            <?php
                                            echo $mostrar['data_inicio_vagas'];
                                            ?>
                                        </p>
                                    </div>
                                    <!-- Data na qual a vaga irá deixar de aparecer -->
                                    <div class="data">
                                        <p>Data final: </p>
                                        <p>
                                            <?php
                                                echo $mostrar['data_final_vagas'];
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- Botões referente ao sobre a empresa, mais informações da vaga e se cadastrar na vaga -->
                            <div class="area_botao">
                                <a href="./araras_info_emp.php?id=<?php echo $mostrar['id_empresa_vagas']; ?>">Sobre a empresa</a>
                                <a href="./araras_info_vaga.php?vaga=<?php echo $mostrar['id_vagas'];?>">Sobre a vaga</a>
                                <a href="./cadastrar_usuario_vaga.php?id=<?php echo $mostrar['id_vagas']; ?>"> Cadastre-se na vaga</a>
                            </div>
                        </div>
                    <?php
                    }
                }
                    ?>
                </div>
            </div>
        </div>
    </main>

        <!-- Script referente a função responsiva da nav-bar -->
    <script type="text/javascript" src="../js/fixos/mobile-navbar.js"></script>
</body>

</html>