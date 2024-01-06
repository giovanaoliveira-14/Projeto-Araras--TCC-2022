<?php

require_once('./conexao.php');
date_default_timezone_set('America/Sao_Paulo');

session_start();
if(!isset($_SESSION['id_usu'])){
    header('Location: ./araras_login.php');
    exit;
}

$_SESSION['id_usu'];

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Araras | Processos Seletivos</title>

    <!-- Logo do projeto -->
    <link rel="icon" href="../img/logo/favicon-araras.svg">

    <!-- Links css -->
    <link rel="stylesheet" href="../css/fixos/menu.css">
    <link rel="stylesheet" href="../css/pro_seletivo.css">

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
            <h1>Lista de Processos Seletivos</h1>
            <div class="tabela_vagas">
                <table>
                    <div class="titulo_coluna">
                       <thead>
                            <tr>
                                <th>Número da vaga</th>
                                <th>Nome da empresa</th>
                                <th>Nome da vaga</th>
                                <th>Tipo de contratação</th>
                            </tr>
                       </thead>
                    </div>
                    <div class="informacoes">
                        <?php
                            $sql = "SELECT * FROM cadastro_usuario_vaga WHERE id_usuario_vagas = ".$_SESSION['id_usu'];

                            $consulta = mysqli_query($conexao, $sql);

                            //Se caso a pessoa não tiver nenhuma registro de cadastro em agluma vaga
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
                                foreach($consulta as $mostrar){?>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <?php
                                                    // Id da vaga
                                                    echo $mostrar['id_vaga'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    $sql = "SELECT * FROM empresa_simples AS empresa
                                                    LEFT JOIN vagas AS vaga ON empresa.id_emp = vaga.id_empresa_vagas WHERE vaga.id_vagas = ".$mostrar['id_vaga'];

                                                    $consulta = mysqli_query($conexao, $sql);

                                                    foreach($consulta as $nome){
                                                        // Nome da empresa
                                                        echo $nome['nome_fantasia_emp'];
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    $sql = "SELECT *  FROM vagas AS vaga
                                                    LEFT JOIN cadastro_usuario_vaga AS usu_vaga ON vaga.id_vagas = usu_vaga.id_vaga WHERE usu_vaga.id_vaga = ".$mostrar['id_vaga'];
                                                    $consulta = mysqli_query($conexao, $sql);
                                                    $dados = mysqli_fetch_array($consulta);
                                                    // Nome da vaga
                                                    echo $dados['nome_vagas'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php

                                                    $sql = "SELECT * FROM tipo_contratacao_emp AS contrato
                                                    LEFT JOIN vagas AS vaga ON contrato.id_contrat = vaga.id_tipo_contratacao_vagas WHERE vaga.id_vagas = ".$mostrar['id_vaga'];

                                                    $consulta = mysqli_query($conexao, $sql);

                                                    foreach($consulta as $contrato){
                                                        // Descricao da vaga
                                                        echo $contrato['descricao_contrat'];
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php
                                }
                            }
                            ?>
                    </div>
                </table>
            </div>
        </div>
    </main>

    <!-- Script referente a navbar -->
    <script type="text/javascript" src="../js/fixos/mobile-navbar.js"></script>
</body>
</html>