<?php
 
require_once('./conexao.php');
date_default_timezone_set('America/Sao_Paulo');

session_start();

if(!isset($_SESSION['id_res'])){
    header('Location: ./araras_login_emp.php');
    exit;
}

$_SESSION['id_emp'];

$sql = "SELECT * FROM empresa_simples WHERE id_emp = ".$_SESSION['id_emp'];
$consulta = mysqli_query($conexao, $sql);
$dados_emp = mysqli_fetch_array($consulta);


$sql = "SELECT * FROM responsavel_empresarial WHERE id_res = ".$_SESSION['id_res'];
$consulta = mysqli_query($conexao, $sql);
$dados_res = mysqli_fetch_array($consulta);


if(isset($_POST['modificar']))
{
    $tipo_documento_emp = $_POST['tipo_documento_emp'];
    $identificacao_emp = $_POST['identificacao_emp'];
    $cei_usu = $_POST['cei_usu'];
    $razao_social_emp = $_POST['razao_social_emp'];
    $nome_fantasia_emp = $_POST['nome_fantasia_emp'];
    $ramo_emp = $_POST['ramo_emp'];
    
    $nome_responsavel_emp = $_POST['nome_responsavel_emp'];
    $dep_responsavel_emp = $_POST['dep_responsavel_emp'];
    $tel_responsavel_emp = $_POST['tel_responsavel_emp'];
    $tel_comercial_emp = $_POST['tel_comercial_emp'];
    $email_emp = $_POST['email_emp'];
    $senha_emp = $_POST['senha_emp'];
    
    $endereco_emp = $_POST['endereco_emp'];
    $num_residencia_emp = $_POST['num_residencia_emp'];
    $complemento_emp = $_POST['complemento_emp'];
    $bairro_emp = $_POST['bairro_emp'];
    $cep_emp = $_POST['cep_emp'];
    $cidade_emp = $_POST['cidade_emp'];
    $estado_emp = $_POST['estado_emp'];
    $pais_emp = $_POST['pais_emp'];

    // Modificar os dados da tabela responsavel empresarial
    $resultado_responsavel = "UPDATE responsavel_empresarial SET
    nome_res = '".$nome_responsavel_emp."',
    departamento_res = '".$dep_responsavel_emp."',
    telefone_res = '".$tel_responsavel_emp."',
    telefone_comercial_res = '".$tel_comercial_emp."',
    email_res = '".$email_emp."',
    senha_res = '".$senha_emp."'
    WHERE id_res = ".$_SESSION['id_res'];

    $consulta = mysqli_query($conexao, $resultado_responsavel);

    $resultado_empresa = "UPDATE empresa_simples SET
    id_tipo_doc_emp = ".$tipo_documento_emp.",
    numero_doc_emp = '".$identificacao_emp."',
    cei_emp = '".$cei_usu."',
    razao_emp = '".$razao_social_emp."',
    nome_fantasia_emp = '".$nome_fantasia_emp."',
    ramo_emp = '".$ramo_emp."',
    rua_emp = '".$endereco_emp."',
    numero_end_emp = ".$num_residencia_emp.",
    complemento_emp = '".$complemento_emp."',
    cep_emp = ".$cep_emp.",
    bairro_emp = '".$bairro_emp."',
    cidade_emp = '".$cidade_emp."',
    estado_emp = '".$estado_emp."',
    pais_emp = '".$pais_emp."',
    id_responsavel_emp = ".$_SESSION['id_res']." WHERE id_emp = ".$_SESSION['id_emp'];

    $consulta = mysqli_query($conexao, $resultado_empresa);

}else{

}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Araras para Empresas | Perfil Empresa</title>

    <!-- Logo do projeto -->
    <link rel="icon" href="../img/logo/favicon-araras.svg">

    <!-- Links css -->
    <link rel="stylesheet" href="../css/fixos/menu.css">
    <link rel="stylesheet" href="../css/formularios/perfil_emp.css">

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
                        <a href="#" >
                            <!-- <img src="./img/icones/icone_tradutor_globo.png" class="img_idioma"> -->
                            <i class="fa-solid fa-globe"></i>
                            <p>Idioma</p>
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
            <h1>
                Modifique seus dados
            </h1>
                <form action="./araras_perfil_emp.php" method="POST">
                    <div class="dados_basicos">
                        <div class="titulo">
                           <span>
                                Dados básicos
                           </span>
                        </div>
                        <div class="componentes">
                            <div class="campo-input">
                                <!-- Documento identificador da empresa CPF/CNPJ -->
                                <label for="tipo_documento_emp">Documento identificador</label>
                                <select name="tipo_documento_emp" id="tipo_documento_emp">
                                <?php
                                    $consulta = "SELECT * FROM tipo_documento_emp AS doc_emp
                                    LEFT JOIN empresa_simples AS emp ON doc_emp.id_doc_emp = emp.id_tipo_doc_emp WHERE emp.id_emp =".$_SESSION['id_emp'];
                                    $consultado = mysqli_query($conexao, $consulta);
                                    $dados = mysqli_fetch_array($consultado);
                                ?>
                                <option value="<?php echo $dados['id_doc_emp']; ?>"><?php echo $dados['documento_emp']; ?></option>
                                <?php
                                $resultado_documento = 'SELECT * FROM tipo_documento_emp';
                                $resultado_conexao = mysqli_query($conexao, $resultado_documento);

                                while($linhas_documento = mysqli_fetch_assoc($resultado_conexao)){
                                ?>
                                <option value="<?php echo $linhas_documento['id_doc_emp']; ?>"> <?php echo $linhas_documento['documento_emp']; ?></option>

                                <?php
                                }
                                ?>
                                </select>
                            </div>
                            <div class="campo-input">
                                <!-- Número referente ao identificador no qual a empresa selecionou anteriormente -->
                                <label for="identificacao_emp">Número do documento</label>
                                <input type="text" name="identificacao_emp" value="<?php echo $dados_emp['numero_doc_emp'] ?>" maxlength="14">
                            </div>
                            <div class="campo-input">
                                <!-- Número CEI da empresa, se caso tiver  -->
                                <label for="cei_usu">CEI</label>
                                <input type="text" name="cei_usu" maxlength="14" value="<?php echo $dados_emp['cei_emp'] ?>">
                            </div>
                            <div class="campo-input">
                                <!-- Razão Social da empresa -->
                                <label for="razao_social_emp">Razão Social</label>
                                <input type="text" name="razao_social_emp" maxlength="80" value="<?php echo $dados_emp['razao_emp'] ?>">
                            </div>
                            <div class="campo-input">
                                <!-- Nome fantasia da empresa -->
                                <label for="nome_fantasia_emp">Nome fantasia</label>
                                <input type="text" name="nome_fantasia_emp" maxlength="50" value="<?php echo $dados_emp['nome_fantasia_emp'] ?>">
                            </div>
                            <div class="campo-input">
                                <!-- Ramo no qual a empresa atua -->
                                <label for="ramo_emp">Ramo da empresa</label>
                                <input type="text" name="ramo_emp" maxlength="30" value="<?php echo $dados_emp['ramo_emp'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="dados_responsavel">
                        <div class="titulo">
                           <span>
                            Dados responsável
                           </span>
                        </div>
                        <div class="componentes">
                            <div class="campo-input">
                                <!-- Nome do representante -->
                                <label for="nome_responsavel_emp">Nome do responsável</label>
                                <input type="text" name="nome_responsavel_emp" maxlength="100" value="<?php echo $dados_res['nome_res'] ?>">
                            </div>
                            <div class="campo-input">
                                <!-- Departamento do respresentante -->
                                <label for="dep_responsavel_emp">Departamento responsável</label>
                                <input type="text" name="dep_responsavel_emp" maxlength="50" value="<?php echo $dados_res['departamento_res'] ?>">
                            </div>
                            <div class="campo-input">
                                <!-- Telefone do representante -->
                                <label for="tel_responsavel_emp">Telefone do responsável</label>
                                <input type="tel" name="tel_responsavel_emp" maxlength="11" value="<?php echo $dados_res['telefone_res'] ?>">
                            </div>
                            <div class="campo-input">
                                <!-- Telefone comercial da empresa -->
                                <label for="tel_comercial_emp">Telefone comercial</label>
                                <input type="tel" name="tel_comercial_emp" maxlength="11" value="<?php echo $dados_res['telefone_comercial_res'] ?>">
                            </div>
                            <div class="campo-input">
                                <!-- E-mail empresarial -->
                                <label for="email_emp">E-mail empresarial</label>
                                <input type="tel" name="email_emp" maxlength="80" value="<?php echo $dados_res['email_res'] ?>">
                            </div>
                            <div class="campo-input">
                                <!-- Senha para acesso da empresa a plataforma -->
                                <label for="senha_emp">Define uma senha</label>
                                <input type="password" name="senha_emp" maxlength="15" value="<?php echo $dados_res['senha_res'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="dados_endereco">
                        <div class="titulo">
                            <span>
                                Dados endereço
                            </span>
                        </div>
                        <div class="componentes">
                            <div class="campo-input">
                                <!-- Nome da rua  -->
                                <label for="endereco_emp">Endereço</label>
                                <input type="text" name="endereco_emp"  maxlength="80" value="<?php echo $dados_emp['rua_emp'] ?>">
                            </div>
                            <div class="campo-input">
                                <!-- Número do local  -->
                                <label for="num_residencia_emp">Número</label>
                                <input type="number" name="num_residencia_emp" value="<?php echo $dados_emp['numero_end_emp'] ?>">
                            </div>
                            <div class="campo-input">
                                <!-- Complemento, se caso houver -->
                                <label for="complemento_emp">Completo</label>
                                <input type="text" name="complemento_emp" maxlength="50" value="<?php echo $dados_emp['complemento_emp'] ?>">
                            </div>
                             <div class="campo-input">
                                <!-- Nome do bairro -->
                                <label for="bairro_emp">Bairro</label>
                                <input type="text" name="bairro_emp"  maxlength="80" value="<?php echo $dados_emp['bairro_emp'] ?>">
                            </div>
                            <div class="campo-input">
                                <!-- CEP -->
                                <label for="cep_emp">CEP</label>
                                <input type="number" name="cep_emp" value="<?php echo $dados_emp['cep_emp'] ?>">
                            </div>
                            <div class="campo-input">
                                <!-- Nome da cidade -->
                                <label for="cidade_emp">Cidade</label>
                                <input type="text" name="cidade_emp" maxlength="80" value="<?php echo $dados_emp['cidade_emp'] ?>">
                            </div>
                            <div class="campo-input">
                                <!-- Nome do estado pertencente -->
                                <label for="estado_emp">Estado</label>
                                <input type="text" name="estado_emp" maxlength="80"  value="<?php echo $dados_emp['estado_emp'] ?>">
                            </div>
                            <div class="campo-input">
                                <!-- Nome do pais que a empresa esta localizada -->
                                <label for="pais_emp">País</label>
                                <input type="text" name="pais_emp" maxlength="80"  value="<?php echo $dados_emp['pais_emp'] ?>">
                            </div>
                            
                           
                        </div>
                            <div class="campo-input botao_modificar">
                                <input type="submit" value="Modificar" name="modificar">
                            </div>
                    </div>
                    
                </form>
        </div>
    </main>
    <script type="text/javascript" src="../js/fixos/mobile-navbar.js"></script>
</body>
</html>