<?php
 
require_once('./conexao.php');
date_default_timezone_set('America/Sao_Paulo');

session_start();

if(!isset($_SESSION['id_res'])){
    header('Location: ./araras_login_emp.php');
    exit;
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Araras para Empresas | Vagas Cadastradas</title>

    <!-- Logo do projeto -->
    <link rel="icon" href="../img/logo/favicon-araras.svg">

    <!-- Links css -->
    <link rel="stylesheet" href="../css/fixos/menu_emp.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/vagas_cadastradas.css">

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
    <main>
        <div class="container">
            <h1>Lista das vagas cadastradas</h1>
            <div class="tabela_vagas">
                <div class="titulo_coluna">
                    <table>
                        <tr>
                            <th>ID vaga</th>
                            <th>Nome da vaga</th>
                            <th>Tipo da vaga</th>
                            <th>Tipo de contratação</th>
                            <th>Data inicial</th>
                            <th>Data final</th>
                        </tr>

                        <div class="informacoes">
                            <?php

                            $sql = "SELECT * FROM vagas  WHERE id_empresa_vagas = " . $_SESSION['id_emp'];

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
                            foreach ($consulta as $mostrar) {
                            ?>
                                <tr>
                                    <td>
                                        <?php
                                        echo $mostrar['id_vagas'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $mostrar['nome_vagas'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $mostrar['tipo_vagas'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $sql = "SELECT descricao_contrat FROM tipo_contratacao_emp AS contrato
                                    LEFT JOIN  vagas AS vaga ON contrato.id_contrat = vaga.id_tipo_contratacao_vagas WHERE vaga.id_vagas =" .$mostrar['id_vagas'];

                                        $consulta = mysqli_query($conexao, $sql);

                                        foreach($consulta as $contrato){
                                            echo $contrato['descricao_contrat'];
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $mostrar['data_inicio_vagas'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $mostrar['data_final_vagas'];
                                        ?>
                                    </td>
                                </tr>
                            <?php
                            }
                        }
                            ?>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </main>
    <script type="text/javascript" src="../js/fixos/mobile-navbar.js"></script>
</body>

</html>