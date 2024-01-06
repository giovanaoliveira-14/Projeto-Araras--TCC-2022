<?php  

require_once('./conexao.php');
date_default_timezone_set('America/Sao_Paulo');

session_start();

if(!isset($_SESSION['id_res'])){
    header('Location: ./araras_login_emp.php');
    exit;
}

    // Cadastrar historico da empresa
    if(isset($_POST['btn_cadastrar_historico'])){

    $nome_empresa_historico = $_POST['nome_empresa_historico'];
    $sobre_empresa_historico = $_POST['sobre_empresa_historico'];
    $valores_empresa_historico = $_POST['valores_empresa_historico'];
    $endereco_empresa_historico = $_POST['endereco_empresa_historico'];
    $telefone_empresa_historico = $_POST['telefone_empresa_historico'];
    $whatsapp_empresa_historico = $_POST['whatsapp_empresa_historico'];
    $site_empresa_historico = $_POST['site_empresa_historico'];
    $_SESSION['id_emp'];
    
    $resultado_historico = "INSERT INTO historico(
        nome_empresa_hist,
        sobre_hist,
        valores_hist,
        endereco_hist,
        telefone_hist,
        whatsapp_hist,
        site_hist,
        id_empresa_hist
        )VALUES(
        '$nome_empresa_historico',
        '$sobre_empresa_historico',
        '$valores_empresa_historico',
        '$endereco_empresa_historico',
        '$telefone_empresa_historico',
        '$whatsapp_empresa_historico',
        '$site_empresa_historico',
        '".$_SESSION['id_emp']."')";
    
    $resultado_conexao = mysqli_query($conexao, $resultado_historico);
    
    $imagem_empresa_historico = $_FILES['imagem_empresa_historico'];
    
    if($imagem_empresa_historico !== null){
    
        preg_match("/\.(png|jpg|jpeg){1}$/i", $imagem_empresa_historico["name"], $ext);
    
        if($ext == true){
    
            $nome_arquivo  = md5(uniqid(time())) . "." .$ext[1];
    
            $caminho_arquivo = "../imagens_empresas/" . $nome_arquivo;
    
            move_uploaded_file($imagem_empresa_historico["tmp_name"],$caminho_arquivo);
    
            $resultado_arquivo = "INSERT INTO imagem_historico (imagem_img, id_historico_img) VALUES ('$nome_arquivo', @@IDENTITY)";
            $resultado_consulta = mysqli_query($conexao, $resultado_arquivo);
        }
    }
    
    header('Location: ./araras_historico_emp.php');
    
    }else{
    
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Araras para Empresas | Cadastro Histórico</title>

    <!-- Logo do projeto -->
    <link rel="icon" href="../img/logo/favicon-araras.svg">

    <!-- Links css -->
    <link rel="stylesheet" href="../css/fixos/menu_emp.css">
    <link rel="stylesheet" href="../css/formularios/historico.css">

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
            <h1>Histórico Empresarial</h1>
            <span>Fale um pouco mais sobre sua empresa, para que os candidatos possam conhece-la melhor</span>
            <form enctype="multipart/form-data" action="./araras_historico_emp.php" method="POST">
                <div class="form">
                    <div class="lado_esquerdo">
                        <div class="componentes">
                            <div class="campo-input">
                                <!-- Nome da empresa -->
                                <label for="nome_empresa_historico">Nome da empresa:</label>
                                <input type="text" name="nome_empresa_historico" maxlength="80" required>
                            </div>
                            <div class="campo-input">
                                <!-- Sobre a empresa -->
                                <label for="sobre_empresa_historico">Sobre:</label>
                                <textarea name="sobre_empresa_historico" id="sobre_empresa_historico" cols="30" rows="10" required></textarea>
                            </div>
                            <div class="campo-input">
                                <!-- Valores da empresa -->
                                <label for="valores_empresa_historico">Seus valores/facilidades:</label>
                                <textarea name="valores_empresa_historico" id="" cols="30" rows="10" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="lado_direito">
                        <div class="componentes">
                            <div class="campo-input">
                                <!-- Endereço completo da empresa -->
                                <label for="endereco_empresa_historico">Endereço:</label>
                                <input type="text" name="endereco_empresa_historico" required>
                            </div>
                            <div class="campo-input">
                                <!-- Telefone comercial:  -->
                                <label for="telefone_empresa_historico">Telefone:</label>
                                <input type="text" name="telefone_empresa_historico" maxlength="11" required>
                            </div>
                            <div class="campo-input">
                                <!-- Whatsapp da empresa -->
                                <label for="whatsapp_empresa_historico">Whatsapp:</label>
                                <input type="text" name="whatsapp_empresa_historico" maxlength="11">
                            </div>
                            <div class="campo-input site">
                                <!-- Site da empresa -->
                                <label for="site_empresa_historico">Site:</label>
                                <input type="url" name="site_empresa_historico" maxlength="50">
                            </div>
                            <div class="campo-input">
                                <!-- Imagem da empresa -->
                                <label for="imagem_empresa_historico">Imagem da empresa:</label>
                                <input type="file" accept=".png, .jpg, .jpeg" name="imagem_empresa_historico">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="campo-input botoes">
                    <!-- Botão de limpar os campos de input -->
                    <input type="reset" value="Limpar">
                    <!-- Botão de enviar -->
                    <input type="submit" value="Enviar" name="btn_cadastrar_historico">
                </div>
            </form>
        </div>
    </main>

    <!-- Script referente a navbar -->
    <script type="text/javascript" src="../js/fixos/mobile-navbar.js"></script>
</body>
</html>