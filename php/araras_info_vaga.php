<?php 

require_once('./conexao.php');
date_default_timezone_set('America/Sao_Paulo');

session_start();

$id_vaga = $_GET['vaga'];

if($id_vaga == 0){
    header('Location: ./araras_trabalhos.php');
    exit;
}
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Araras | Informações sobre a vaga</title>

    <!-- Logo do projeto -->
    <link rel="icon" href="../img/logo/favicon-araras.svg">

    <!-- Links css -->
    <link rel="stylesheet" href="../css/fixos/menu.css">
    <link rel="stylesheet" href="../css/info_vaga.css">

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
            <div class="parte_principal">
                <?php
                    $sql = "SELECT * FROM vagas WHERE id_vagas = ".$id_vaga;
                    $consulta = mysqli_query($conexao, $sql);
                    $dados = mysqli_fetch_array($consulta);
                ?>
                <div class="imagem_vaga">
                    <!-- imagem da vaga -->
                    <?php 
                        $sql = "SELECT * FROM imagens_vagas AS imagem
                        LEFT JOIN vagas AS vaga ON imagem.id_vaga_img = vaga.id_vagas WHERE vaga.id_vagas = ".$id_vaga;
                        $consulta = mysqli_query($conexao, $sql);
                        $imagem = mysqli_fetch_array($consulta);
                    ?>
                    <img src="../imagens_vagas/<?php echo $imagem['imagem_vag']; ?>">
                </div>
                <div class="nome_vaga">
                    <h2>
                        <?php
                            echo $dados['nome_vagas'];
                        ?>
                    </h2>
                </div>
                <div class="contratacao">
                    <!-- tipo de contratacao -->
                    <?php
                        $sql = "SELECT * FROM tipo_contratacao_emp AS contrato
                        LEFT JOIN vagas AS vaga ON contrato.id_contrat = vaga.id_tipo_contratacao_vagas WHERE vaga.id_vagas = ".$id_vaga;
                        $consulta = mysqli_query($conexao, $sql);
                        $contrato = mysqli_fetch_array($consulta);
                    ?>
                    <p>
                        <?php  
                            echo $contrato['descricao_contrat'];
                        ?>
                    </p>
                </div>
            </div>
            <div class="parte_informacoes">
                <div class="lado_esquerdo">
                    <ul>
                        <li>
                            <!-- quantidade de vagas -->
                            <h3>
                                Quantidade de vagas
                            </h3>
                            <p>
                                <?php
                                    echo $dados['quantidade_vagas'];
                                ?>
                            </p>
                        </li>
                        <li>
                            <!-- area da vaga -->
                            <h3>
                                Área da vaga
                            </h3>
                            <p>
                                <?php
                                    echo $dados['area_vagas'];
                                ?>
                            </p>
                        </li>
                        <li>
                            <!-- data inicio da vaga -->
                            <h3>
                                Data início da vaga
                            </h3>
                            <p>
                                <?php
                                    echo $dados['data_inicio_vagas'];
                                ?>
                            </p>
                        </li>
                    </ul>
                </div>
                <div class="lado_direito">
                    <ul>
                        <li>
                            <!-- tipo da vaga -->
                            <h3>
                                Tipo da vaga
                            </h3>
                            <p>
                                <?php   
                                    echo $dados['tipo_vagas'];
                                ?>
                            </p>
                        </li>
                        <li>
                            <!-- local da vaga -->
                            <h3>
                                Local
                            </h3>
                            <p>
                                <?php
                                    echo $dados['local_vagas'];
                                ?>
                            </p>
                        </li>
                        <li>
                            <!-- data final da vaga -->
                            <h3>
                                Data final da vaga
                            </h3>
                            <p>
                                <?php
                                    echo $dados['data_final_vagas'];
                                ?>
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="parte_sobre">
                <div class="sobre_vaga">
                    <h3>
                        Sobre
                    </h3>
                    <!-- descricao da vaga -->
                    <p>
                        <?php
                            echo $dados['descricao_vagas'];
                        ?>
                    </p>
                </div>
                <div class="requisitos">
                    <h3>
                        Requisitos
                    </h3>
                    <!-- requisitos da vaga -->
                    <p>
                        <?php
                            echo $dados['restricao_vagas'];
                        ?>
                    </p>
                </div>
            </div>
            
        </div>
    </main>

<!-- Script referente a função responsiva da nav-bar -->
<script type="text/javascript" src="../js/fixos/mobile-navbar.js"></script>
</body>
</html>