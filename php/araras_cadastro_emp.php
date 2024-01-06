<?php

require_once('./conexao.php');
date_default_timezone_set('America/Sao_Paulo');
 
// Cadastrar nova empresa
if(isset($_POST['cadastrar_empresa'])){

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

    // Senha criptografada
    $senha_nova_emp = md5($senha_emp);
    
    $endereco_emp = $_POST['endereco_emp'];
    $num_residencia_emp = $_POST['num_residencia_emp'];
    $complemento_emp = $_POST['complemento_emp'];
    $bairro_emp = $_POST['bairro_emp'];
    $cep_emp = $_POST['cep_emp'];
    $cidade_emp = $_POST['cidade_emp'];
    $estado_emp = $_POST['estado_emp'];
    $pais_emp = $_POST['pais_emp'];
    
    // Inserir dados na tablea responsável empresarial
    $resultado_responsavel = "INSERT INTO responsavel_empresarial(
        nome_res,
        departamento_res,
        telefone_res,
        telefone_comercial_res,
        email_res,
        senha_res
        )VALUES(
        '$nome_responsavel_emp',
        '$dep_responsavel_emp',
        '$tel_responsavel_emp',
        '$tel_comercial_emp',
        '$email_emp',
        '$senha_emp'
    )";
    
    $resultado_conexao = mysqli_query($conexao, $resultado_responsavel);

    // Inserir dados na tebela empresa simples 
    $resultado_empresa = "INSERT INTO empresa_simples (
        id_tipo_doc_emp,
        numero_doc_emp,
        cei_emp,
        razao_emp,
        nome_fantasia_emp,
        ramo_emp,
        rua_emp,
        numero_end_emp,
        complemento_emp, 
        cep_emp,
        bairro_emp,
        cidade_emp,
        estado_emp,
        pais_emp,
        id_responsavel_emp
        )VALUES(
        $tipo_documento_emp,
        '$identificacao_emp',
        '$cei_usu',
        '$razao_social_emp',
        '$nome_fantasia_emp',
        '$ramo_emp',
        '$endereco_emp',
        $num_residencia_emp,
        '$complemento_emp',
        $cep_emp,
        '$bairro_emp',
        '$cidade_emp',
        '$estado_emp',
        '$pais_emp',
        @@IDENTITY
    )";
    
    $resultado_conexao = mysqli_query($conexao, $resultado_empresa);

    header('Location: ./araras_login_emp.php');

    }else{
       
    }
?>

<!-- Parte html -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Araras | Cadastro Empresa</title>

    <!-- Logo do projeto -->
    <link rel="icon" href="../img/logo/favicon-araras.svg">

    <!-- Links css -->
    <link rel="stylesheet" href="../css/fixos/menu.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/formularios/cadastro_emp.css">

    <!-- Links internos -->
    <script src="https://kit.fontawesome.com/68819aaeff.js" crossorigin="anonymous"></script>

</head>
<body>
<header>
        <!-- Nav bar do site -->
        <nav id="nav">
            <!-- Logo -->
            <div class="logo">
              <a href="../index.html"><img src="../img/logo/favicon-araras128px.svg" alt="Logo de uma arara azul em forma de desenho, com os olhos fechados e sorrindo, cor roxo azulado e com somente a parte da cabeça amostra."></a>
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
                    <li><a href="../index.html">Home</a></li>
                    <li><a href="../araras_sobre.html">Sobre o projeto</a></li>
                    <li><a href="./araras_trabalhos.php">Trabalhos disponíveis</a></li>
                    <li><a href="./araras_contato.php">Contato</a></li>
                    <li><a href="../araras_index_emp.html">Araras para Empresas</a></li>
                    <li><a href="./araras_login.php" class="menu_oculto">Entrar</a></li>
                    <li><a href="#" class="menu_oculto">Trocar idioma</a></li>
                </ul>
            </div>

            <!-- Botões de entrar e troca de idioma -->
            <div class="botoes">
                <ul>
                    <li>
                        <a href="./araras_login.php">
                            <!-- <img src="./img/icones/icone_conta.png"  class="img_conta"> -->
                            <i class="fa-solid fa-user"></i>
                            <p>Entrar</p>
                        </a>
                    </li>

                    <li>
                        <a href="#" >
                            <!-- <img src="./img/icones/icone_tradutor_globo.png" class="img_idioma"> -->
                            <i class="fa-solid fa-globe"></i>
                            <p>Idioma</p>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Main - conteúdo da página -->
    <main>
        <div class="container">
            <h1>Cadastro Empresa</h1>
            <!-- Formulário de cadastro de empresas -->
            <form action="./araras_cadastro_emp.php" method="POST">
                <div class="form">
                    <div class="detalhes basico">
                        <span class="titulo">Dados Básicos</span>

                            <div class="componentes">
                                <div class="campo-input">
                                    <!-- Documento identificador da empresa CPF/CNPJ -->
                                    <label for="tipo_documento_emp">Documento identificador</label>
                                    <select name="tipo_documento_emp" id="tipo_documento_emp">
                                        <option disabled selected required>Selecione</option>
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
                                    <input type="text" name="identificacao_emp" placeholder="Digite o número identificação da empresa" maxlength="14" required>
                                </div>
                                <div class="campo-input">
                                    <!-- Número CEI da empresa, se caso tiver  -->
                                    <label for="cei_usu">CEI</label>
                                    <input type="text" name="cei_usu" placeholder="Digite seu CEI" maxlength="14">
                                </div>
                                <div class="campo-input">
                                    <!-- Razão Social da empresa -->
                                    <label for="razao_social_emp">Razão Social</label>
                                    <input type="text" name="razao_social_emp" placeholder="Digite a razão social" maxlength="80" required>
                                </div>
                                <div class="campo-input">
                                    <!-- Nome fantasia da empresa -->
                                    <label for="nome_fantasia_emp">Nome fantasia</label>
                                    <input type="text" name="nome_fantasia_emp" placeholder="Digite o nome fantasia" maxlength="50" required>
                                </div>
                                <div class="campo-input">
                                    <!-- Ramo no qual a empresa atua -->
                                    <label for="ramo_emp">Ramo da empresa</label>
                                    <input type="text" name="ramo_emp" placeholder="Digite o ramo empresarial" maxlength="30" required>
                                </div>
                            </div>
                    </div>
                    <div class="detalhes responsavel">
                        <!-- Dados referente ao representante da empresa que está realizando o cadastro da empresa -->
                        <span class="titulo">Dados Responsável</span>

                        <div class="componentes">
                            <div class="campo-input">
                                <!-- Nome do representante -->
                                <label for="nome_responsavel_emp">Nome do responsável</label>
                                <input type="text" name="nome_responsavel_emp" placeholder="Digite o nome completo" maxlength="100" required>
                            </div>
                            <div class="campo-input">
                                <!-- Departamento do respresentante -->
                                <label for="dep_responsavel_emp">Departamento responsável</label>
                                <input type="text" name="dep_responsavel_emp" placeholder="Digite o departamento correspondente" maxlength="50" required>
                            </div>
                            <div class="campo-input">
                                <!-- Telefone do representante -->
                                <label for="tel_responsavel_emp">Telefone do responsável</label>
                                <input type="tel" name="tel_responsavel_emp" placeholder="(xx) xxxx-xxxx" maxlength="11" required>
                            </div>
                            <div class="campo-input">
                                <!-- Telefone comercial da empresa -->
                                <label for="tel_comercial_emp">Telefone comercial</label>
                                <input type="tel" name="tel_comercial_emp"  placeholder="(xx) xxxx-xxxx" maxlength="11" required>
                            </div>
                            <div class="campo-input">
                                <!-- E-mail empresarial -->
                                <label for="email_emp">E-mail empresarial</label>
                                <input type="tel" name="email_emp"  placeholder="Digite o e-mail da empresa" maxlength="80" required>
                            </div>
                            <div class="campo-input">
                                <!-- Senha para acesso da empresa a plataforma -->
                                <label for="senha_emp">Define uma senha</label>
                                <input type="password" name="senha_emp"  placeholder="Define uma senha de acesso" maxlength="15" required>
                            </div>
                        </div>

                    </div>
                    <div class="detalhes endereco">
                        <!-- Dados de endereço da empresa -->
                        <span class="titulo">Dados Endereço</span>

                        <div class="componentes">
                            <div class="campo-input">
                                <!-- Nome da rua  -->
                                <label for="endereco_emp">Endereço</label>
                                <input type="text" name="endereco_emp"  placeholder="Digite o endereço" maxlength="80" required>
                            </div>
                            <div class="campo-input">
                                <!-- Número do local  -->
                                <label for="num_residencia_emp">Número</label>
                                <input type="number" name="num_residencia_emp" required>
                            </div>
                            <div class="campo-input">
                                <!-- Complemento, se caso houver -->
                                <label for="complemento_emp">Completo</label>
                                <input type="text" name="complemento_emp" maxlength="50">
                            </div>
                             <div class="campo-input">
                                <!-- Nome do bairro -->
                                <label for="bairro_emp">Bairro</label>
                                <input type="text" name="bairro_emp"  placeholder="Digite o bairro" maxlength="80" required>
                            </div>
                            <div class="campo-input">
                                <!-- CEP -->
                                <label for="cep_emp">CEP</label>
                                <input type="number" name="cep_emp"  placeholder=" xxxxx-xxx" maxlength="9" required>
                            </div>
                            <div class="campo-input">
                                <!-- Nome da cidade -->
                                <label for="cidade_emp">Cidade</label>
                                <input type="text" name="cidade_emp"  placeholder="Digite a cidade" maxlength="80" required>
                            </div>
                            <div class="campo-input">
                                <!-- Nome do estado pertencente -->
                                <label for="estado_emp">Estado</label>
                                <input type="text" name="estado_emp"  placeholder="Digite o estado" maxlength="80" required>
                            </div>
                            <div class="campo-input">
                                <!-- Nome do pais que a empresa esta localizada -->
                                <label for="pais_emp">País</label>
                                <input type="text" name="pais_emp"  placeholder="Digite o país" maxlength="80" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="botoes_baixos">
                    <!-- Botão de cadastrar empresa -->
                    <button class="btn-cadastrar" name="cadastrar_empresa">Cadastrar</button>
                </div>
            </form>
        </div>
    </main>

    <!-- Parte footer -->
    <footer class="rodape">
        <div class="rodape-1">
            <h3 class="rodae-titulo">Páginas:</h3>
            <!-- Links -->
            <ul class="rodape-links">
                <li>
                    <a href="../araras_sobre.html" class="rodape-link">Sobre o Projeto</a>
                </li><br>
                <li>
                    <a href="./araras_trabalhos.php" class="rodape-link">Trabalhos disponiveis</a>
                </li><br>
                <li>
                    <a href="../araras_index_emp.html" class="rodape-link">Araras para Empresas</a>
                </li><br>
            </ul>
        </div>
        <div class="rodape-2">
            <!-- Informações de contato -->
            <ul>
                <li>
                    <a href="https://criarmeulink.com.br/u/1668606312"><b>Telefone:</b> (14) 3433-5467</a>
                </li>
                <li>
                    <a href="https://goo.gl/maps/xqctfFax79jJCeZw5"><b>Endereço:</b> Av. Castro Alves, 62 - Somenzari, Marília - SP</a>
                </li>
            </ul>
        </div>
        <div class="rodape-3">
            <!-- Redes sociais -->
            <h3 class="rodape-titulo" id="footer">Siga-nos em nossas redes sociais:</h3>
            <ul>
                <li>
                    <a href="https://www.linkedin.com/in/giovana-oliveira-500954238/" id="linkedin"></a>
                    <a href="https://www.instagram.com/_yogioliveira/" id="instagram"></a>
                    <p> Giovana Oliveira </p>
                </li>
                <li>
                    <a href="" id="linkedin"></a>
                    <a href="https://www.instagram.com/joaovulgojao_/" id="instagram"></a>
                    <p> João Victor </p>
                </li>
                <li>
                    <a href="https://www.linkedin.com/in/let%C3%ADcia-rodrigues-pimenta/" id="linkedin"></a>
                    <a href="https://www.instagram.com/leticiarpimenta/" id="instagram"></a>
                    <p> Letícia Pimenta </p> 
                </li>
                <li>
                    <a href="https://www.linkedin.com/in/pedrooctavio27" id="linkedin"></a>
                    <a href="https://www.instagram.com/quetavio/" id="instagram"></a>
                    <p> Pedro Octávio </p> 
                </li>
            </ul>
        </div>
    </footer>

    <!-- Script referente a navbar -->
    <script type="text/javascript" src="../js/fixos/mobile-navbar.js"></script>
</body>
</html>