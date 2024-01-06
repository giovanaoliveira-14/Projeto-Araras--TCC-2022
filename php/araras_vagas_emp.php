<?php 
  
require_once('./conexao.php');
date_default_timezone_set('America/Sao_Paulo');

session_start();

if(!isset($_SESSION['id_res'])){
    header('Location: ./araras_login_emp.php');
    exit;
}

if(isset($_POST['btn_cadastrar_vaga'])){
$_SESSION['id_emp'];
$nome_vaga = $_POST['nome_vaga'];
$qntd_vaga = $_POST['qntd_vaga'];
$tipo_vaga = $_POST['tipo_vaga'];
$area_vaga = $_POST['area_vaga'];
$local_vaga = $_POST['local_vaga'];
$data_inicio_vaga = $_POST['data_inicio_vaga'];
$data_final_vaga = $_POST['data_final_vaga'];
$descricao_vaga = $_POST['descricao_vaga'];
$requisitos_vaga = $_POST['requisitos_vaga'];
$tipo_contratacao_vaga = $_POST['tipo_contratacao_vaga'];

$resultado_vagas = "INSERT INTO vagas(
    nome_vagas,
    quantidade_vagas,
    area_vagas,
    tipo_vagas,
    local_vagas,
    data_inicio_vagas,
    data_final_vagas,
    descricao_vagas,
    restricao_vagas,
    id_tipo_contratacao_vagas,
    id_empresa_vagas
    )VALUES(
    '$nome_vaga', 
    $qntd_vaga, 
    '$area_vaga', 
    '$tipo_vaga', 
    '$local_vaga', 
    '$data_inicio_vaga', 
    '$data_final_vaga', 
    '$descricao_vaga', 
    '$requisitos_vaga', 
    $tipo_contratacao_vaga,
    '".$_SESSION['id_emp']."'    
)";

$resultado_conexao = mysqli_query($conexao, $resultado_vagas);

// Imagem
$imagem_ref_vaga = $_FILES['imagem_ref_vaga'];

if($imagem_ref_vaga !== null){

    preg_match("/\.(png|jpg|jpeg){1}$/i", $imagem_ref_vaga["name"], $ext);

    if($ext == true){

        $nome_arquivo  = md5(uniqid(time())) . "." .$ext[1];
        $caminho_arquivo = "../imagens_vagas/" . $nome_arquivo;
        move_uploaded_file($imagem_ref_vaga["tmp_name"],$caminho_arquivo);
        $resultado_arquivo = "INSERT INTO imagens_vagas (imagem_vag, id_vaga_img) VALUES ('$nome_arquivo', @@IDENTITY)";
        $resultado_consulta = mysqli_query($conexao, $resultado_arquivo);
    }
}

header('Location: ./araras_vagas_emp.php');
}else{

}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Araras para Empresas | Cadastro Vagas</title>

    <!-- Logo do projeto -->
    <link rel="icon" href="../img/logo/favicon-araras.svg">

    <!-- Links css -->
    <link rel="stylesheet" href="../css/fixos/menu_emp.css">
    <link rel="stylesheet" href="../css/formularios/vagas_emp.css">

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
            <h1>Cadastrar Vagas</h1>
            <form enctype="multipart/form-data" action="./araras_vagas_emp.php" method="POST">
                <div class="form">
                    <div class="parte_esquerda">
                        <div class="componentes">
                            <div class="campo-input">
                                <label for="nome_vaga">Nome da vaga:</label>
                                <input type="text" name="nome_vaga" placeholder="Digite o nome da vaga" maxlength="80">
                            </div>
                            <div class="campo-input datas">
                                <div class="primeira_linha">
                                    <div class="esquerda">
                                        <label for="qntd_vaga">Quantidade de vagas:</label>
                                        <input type="number" name="qntd_vaga">

                                        <label for="tipo_vaga">Tipo da vaga:</label>
                                        <input type="text" name="tipo_vaga" maxlength="80">
                                    </div>
                                    <div class="direita">
                                        <label for="area_vaga">Área de atuação:</label>
                                        <input type="text" name="area_vaga" maxlength="80">

                                        <label for="local_vaga">Local vaga:</label>
                                        <input type="text" name="local_vaga" maxlength="100">
                                    </div>
                                </div>
                                <div class="segunda_linha">
                                    <div class="esquerda">
                                        <label for="data_inicio_vaga">Data início da vaga:</label>
                                        <input type="date" name="data_inicio_vaga">
                                    </div>
                                    <div class="direita">
                                        <label for="data_final_vaga">Data final da vaga:</label>
                                        <input type="date" name="data_final_vaga">
                                    </div>
                                </div>
                            </div>
                            <div class="campo-input">
                                <label for="imagem_ref_vaga">Imagem referênte / demonstrativa a vaga:</label>
                                <input type="file" accept=".png, .jpg, .jpeg" name="imagem_ref_vaga">
                            </div>
                        </div>

                    </div>
                    <div class="parte_direita">
                        <div class="componentes">
                            <div class="campo-input">
                                <label for="descricao_vaga">Descrição da vaga:</label>
                                <textarea name="descricao_vaga" id="descricao_vaga"></textarea>
                            </div>
                            <div class="campo-input">
                                <label for="requisitos_vaga">Pré-requisitos da vaga:</label>
                                <textarea name="requisitos_vaga" id="requisitos_vaga"></textarea>
                            </div>
                            <div class="campo-input">
                                <label for="tipo_contratacao_vaga">Tipo de contratação:</label>
                                <select name="tipo_contratacao_vaga" id="tipo_contratacao_vaga">
                                <option disabled selected>Selecione</option>
                                    <?php
                                    $resultado_contrato = "SELECT * FROM tipo_contratacao_emp";
                                    $resultado_conexao = mysqli_query($conexao, $resultado_contrato);

                                    while($linhas_contrato = mysqli_fetch_assoc($resultado_conexao)){
                                    ?>
                                    <option value="<?php echo $linhas_contrato['id_contrat']; ?>"><?php echo $linhas_contrato['descricao_contrat']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="campo-input botao_cadastrar">
                    <input type="submit" value="Cadastrar Vaga" name="btn_cadastrar_vaga">
                </div>
            </form>
        </div>
    </main>
    <script type="text/javascript" src="../js/fixos/mobile-navbar.js"></script>
</body>
</html>