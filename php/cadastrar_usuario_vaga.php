<?php

date_default_timezone_set('America/Sao_Paulo');

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Araras | Cadastro em Vagas</title>

    <!-- Logo do projeto -->
    <link rel="icon" href="../img/logo/favicon-araras.svg">

    <!-- Links css -->
    <link rel="stylesheet" href="../css/fixos/menu.css">
    <link rel="stylesheet" href="../css/cadastrar_usu_vaga.css">

    <!-- Links internos -->
    <script src="https://kit.fontawesome.com/68819aaeff.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <!-- Nav bar do site -->
        <nav id="nav">
            <!-- Logo -->
            <div class="logo">
              <a href="#"><img src="../img/logo/favicon-araras128px.svg" alt="Logo de uma arara azul em forma de desenho, com os olhos fechados e sorrindo, cor roxo azulado e com somente a parte da cabeça amostra."></a>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            <?php

            require_once('./conexao.php');

            session_start();

            $_SESSION['id_usu'];
            $id_vagas = $_GET['id'];
            $sql = "SELECT * FROM cadastro_usuario_vaga WHERE id_vaga = ".$id_vagas." AND id_usuario_vagas = ".$_SESSION['id_usu'];
            $consulta = mysqli_query($conexao, $sql);

            // Se caso o id da pessoa já estiver cadastrado na tabela e ela está vinculada ao id da vaga, a pessoa já estará cadastrada na vaga
            if(mysqli_num_rows($consulta) > 0 ) { ?>
                <div class="mensagem_cadastrado">
                    <h1>
                        <?php
                            echo "Você já está cadastrado nessa vaga.<br>";

                            echo "Por favor, aperte no botão para voltar para a tela de vagas.";
                        ?>
                    </h1>
                </div>
                <div class="botao_volta">
                    <a href="./araras_trabalhos_usu.php">Volte</a>
                </div>
            <?php
                exit;
            }
            else{
                //Se não, a pessoa irá ser cadastrada na vaga
                $sql = "INSERT INTO cadastro_usuario_vaga(
                    id_usuario_vagas,
                    id_vaga
                    )VALUES(
                    '".$_SESSION['id_usu']."',
                    '".$id_vagas."'
                )";
                $consulta = mysqli_query($conexao, $sql);?>
                <div class="mensagem_cadastrado">
                    <h1>
                        <?php
                            echo "Seu cadastro foi feito com sucesso! <br>";

                            echo "Por favor, aperte no botão para voltar para a tela de vagas.";
                        ?>
                    </h1>
                </div>
                <div class="botao_volta">
                    <a href="./araras_trabalhos_usu.php">Volte</a>
                </div>
                <?php
                exit;
            }
            ?>
        </div>
    </main>
</body>
</html>