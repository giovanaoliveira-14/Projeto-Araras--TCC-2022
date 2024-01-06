<?php 

require_once('./conexao.php');
// date_default_timezone_set('America/Sao_Paulo');

session_start();

$id_emp = $_GET['id'];

if($id_emp == 0){
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
    <title>Araras | Informações sobre a empresa</title>

    <!-- Logo do projeto -->
    <link rel="icon" href="../img/logo/favicon-araras.svg">

    <!-- Links css -->
    <link rel="stylesheet" href="../css/fixos/menu.css">
    <link rel="stylesheet" href="../css/info_empresa.css">

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
                    $sql = "SELECT * FROM historico WHERE id_empresa_hist = ".$id_emp;
                    $consulta = mysqli_query($conexao, $sql);
                    $dados = mysqli_fetch_array($consulta);
                ?>
                <div class="imagem_empresa">
                    <!-- imagem da empresa -->
                    <?php
                        $sql = "SELECT * FROM imagem_historico AS imagem
                        LEFT JOIN historico AS hist ON imagem.id_historico_img = hist.id_hist WHERE hist.id_empresa_hist = ".$id_emp;
                        $consulta = mysqli_query($conexao, $sql);
                        $imagem = mysqli_fetch_array($consulta); 
                    ?>
                        <img src="../imagens_empresas/<?php echo $imagem['imagem_img']; ?>">
                </div>
                <div class="nome_empresa">
                    <!-- nome da empresa -->
                    <h2>
                        <?php
                            echo $dados['nome_empresa_hist'];
                        ?>
                    </h2>
                </div>
                <div class="ramo_empresa">
                    <!-- ramo da empresa -->
                    <h3>
                        <?php
                            $sql = "SELECT * FROM empresa_simples AS empresa
                            LEFT JOIN historico AS hist ON empresa.id_emp = hist.id_empresa_hist WHERE hist.id_empresa_hist = ".$id_emp;
                            $ramos = mysqli_query($conexao, $sql);
                            $ramo = mysqli_fetch_array($ramos);
                            echo $ramo['ramo_emp'];
                        ?>
                    </h3>
                </div>
            </div>

            <div class="parte_sobre">
                <div class="sobre_empresa">
                    <!-- sobre a empresa -->
                    <h3>
                        Sobre
                    </h3>
                    <p>
                        <?php
                            echo $dados['sobre_hist'];
                        ?>
                    </p>
                </div>
                <div class="valores_empresa">
                    <!-- valores da empresa -->
                   <p>
                        <?php
                            echo $dados['valores_hist'];
                        ?>
                   </p>
                </div>
            </div>
            <div class="parte_contato">
                <h3>Contato</h3>
                <div class="contato_empresa">
                    <ul>
                        <li>
                            <!-- Endereco da empresa -->
                            <i class="fa-regular fa-building"></i>
                            <p>
                                <?php
                                    echo $dados['endereco_hist'];
                                ?>
                            </p>
                        </li>
                        <li>
                            <!-- Telefone da empresa -->
                            <i class="fa-solid fa-phone"></i>
                           <p>
                                <?php
                                    echo $dados['telefone_hist'];
                                ?>
                           </p>
                        </li>
                        
                    </ul>
                    <ul>
                        <li>
                            <!-- Whatsaap da empresa -->
                            <i class="fa-brands fa-whatsapp"></i>
                            <p>
                                <?php
                                    echo $dados['whatsapp_hist'];
                                ?>
                            </p>
                        </li>

                        <li>
                            <!-- Site da empresa -->
                            <i class="fa-solid fa-globe"></i>
                            <a href="<?php echo $dados['site_hist']; ?>">Site</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
    
<!-- Script referente a função responsiva da nav-bar -->
<script type="text/javascript" src="../js/fixos/mobile-navbar.js"></script>
</body>
</html>