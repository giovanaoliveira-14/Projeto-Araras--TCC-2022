<?php 

require_once('./conexao.php');
date_default_timezone_set('America/Sao_Paulo');

// Cadastrar novo usuário
if(isset( $_POST['proximo'])){

    $nome_completo_usu = $_POST['nome_completo_usu'];
    $nome_social_usu = $_POST['nome_social_usu'];
    $nacionalidade_usu = $_POST['nacionalidade_usu'];
    $data_nascimento_usu = $_POST['data_nascimento_usu'];
    $sexo_usu =  $_POST['sexo_usu'];
    $tipo_documento_usu =  $_POST['tipo_documento_usu'];
    $identidade_usu = $_POST['identidade_usu'];
    $etnia_usu =  $_POST['etnia_usu'];

    $tel_usu = $_POST['tel_usu'];
    $cel_usu = $_POST['cel_usu'];

    $profissao_interesse_usu = $_POST['profissao_interesse_usu'];
    $formacao_usu = $_POST['formacao_usu'];
    $bio_usu = $_POST['bio_usu'];
    $deficiencia_usu =  $_POST['deficiencia_usu'];
    $tipo_visto_usu = $_POST['tipo_visto_usu'];
    $possui_visto_usu =  $_POST['possui_visto_usu'];

    $email_usu = $_POST['email_usu'];
    $senha_usu = $_POST['senha_usu'];

    // Senha criptografada
    $senha_nova = md5($senha_usu);

    $endereco_usu = $_POST['endereco_usu'];
    $num_residencia_usu =   $_POST['num_residencia_usu'];
    $bairro_usu = $_POST['bairro_usu'];
    $cep_usu =  $_POST['cep_usu'];
    $complemento_usu = $_POST['complemento_usu'];
    $pais_usu = $_POST['pais_usu'];
    $cidade_usu = $_POST['cidade_usu'];
    $estado_usu = $_POST['estado_usu'];
    $foto_usu = $_FILES['foto_usu'];

    if($foto_usu !== null){

        preg_match("/\.(png|jpg|jpeg){1}$/i", $foto_usu["name"], $ext);
    
        if($ext == true){

            $nome_arquivo  = md5(uniqid(time())) . "." .$ext[1];

            $caminho_arquivo = "../imagens_usuarios/" . $nome_arquivo;

            move_uploaded_file($foto_usu["tmp_name"], $caminho_arquivo);

            $resultado_cadastro = " INSERT INTO usuario_simples(
                nome_usu, 
                nome_social_usu,
                nacionalidade_usu,
                data_nascimento_usu,
                id_tipo_doc_usu,
                identidade_usu,
                telefone_usu,
                celular_usu,
                email_usu,
                senha_usu,
                rua_usu,
                numero_casa_usu,
                complemento_usu,
                cep_usu,
                bairro_usu,
                cidade_usu,
                estado_usu,
                pais_usu,
                id_sexo_usu,
                id_etnia_usu,
                id_formacao_usu,
                id_visto_usu,
                descricao_visto_usu,
                id_deficiencia_usu,
                interesse_prof_usu,
                sobre_usu,
                foto_usuario
                )
                VALUES
                (
                '$nome_completo_usu',
                '$nome_social_usu',
                '$nacionalidade_usu',
                '$data_nascimento_usu',
                $tipo_documento_usu,
                '$identidade_usu',
                '$tel_usu',
                '$cel_usu',
                '$email_usu ',
                '$senha_usu',
                '$endereco_usu',
                $num_residencia_usu,
                '$complemento_usu',
                $cep_usu,
                '$bairro_usu',
                '$cidade_usu',
                '$estado_usu',
                '$pais_usu',
                $sexo_usu,
                $etnia_usu,
                $formacao_usu,
                $possui_visto_usu,
                '$tipo_visto_usu',
                $deficiencia_usu,
                '$profissao_interesse_usu',
                '$bio_usu',
                '$nome_arquivo'
            )";
            $resultado_conexao = mysqli_query($conexao, $resultado_cadastro);
        
        }
    }

    // Cadastro de currico no banco de dados
    $curriculo_usu = $_FILES['curriculo_usu'];

    if($curriculo_usu !== null){

        preg_match("/\.(pdf|docx){1}$/i", $curriculo_usu["name"], $ext);

        if($ext == true){

            $nome_arquivo  = md5(uniqid(time())) . "." .$ext[1];

            $caminho_arquivo = "../documentos/" . $nome_arquivo;

            move_uploaded_file($curriculo_usu["tmp_name"],$caminho_arquivo);

            $resultado_arquivo = "INSERT INTO curriculos (curriculo_curr, id_usuario_curr) VALUES ('$nome_arquivo', @@IDENTITY)";
            $resultado_consulta = mysqli_query($conexao, $resultado_arquivo);
        }
    }

    header('Location: ./araras_login.php');

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
    <title>Araras | Cadastro Usuário</title>

    <!-- Logo do projeto -->
    <link rel="icon" href="../img/logo/favicon-araras.svg">

    <!-- Links css -->
    <link rel="stylesheet" href="../css/fixos/menu.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/formularios/cadastro.css">

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
    <main>
        <div class="container">
            <h1>Cadastro</h1>
            <!-- Barra de progresso do formulário -->
            <article class="barra_progresso_form">
                <section>
                    <p  class="bolinha"></p>
                    <p class="bolinha"></p>
                </section>
            </article>

            <!-- Formulário -->
            <form enctype="multipart/form-data" action="./araras_cadastro.php" method="POST">
                <!-- Primeira parte do formulário -->
                <div class="form primeiro">
                    <!-- Sessão dos dados pessoais do usuário -->
                    <div class="detalhes pessoal">
                        <span class="titulo">Dados Pessoais</span>
                        <div class="componentes">
                            <div class="campo-input">
                                <!-- Nome compelto da pessoa -->
                                <label for="nome_completo_usu">Nome Completo</label>
                                <input type="text" name="nome_completo_usu" placeholder="Digite o nome completo" maxlength="100" required>
                            </div>
                            <div class="campo-input">
                                <!-- Nome social da pessoa, se caso tiver -->
                                <label for="nome_social_usu">Nome Social</label>
                                <input type="text" name="nome_social_usu" placeholder="Digite o nome que gostaria de ser chamado" maxlength="100">
                            </div>
                            <div class="campo-input">
                                <!-- Nacionalidade da pessoa -->
                                <label for="nacionalidade_usu">Nacionalidade</label>
                                <input type="text" name="nacionalidade_usu" placeholder="Digite a nacionalidade" maxlength="30" required>
                            </div>
                            <div class="campo-input">
                                <!-- Data de nascimento da pessoa -->
                                <label for="data_nascimento_usu">Data de nascimento</label>
                                <input type="date" name="data_nascimento_usu" required>
                            </div>
                            <div class="campo-input">
                                <!-- Sexo no qual a pessoa se identifica -->
                                <label for="sexo_usu">Sexo</label>
                                <select name="sexo_usu">
                                    <option disabled selected required>Selecione seu sexo</option>
                                    <?php
                                    $resultado_sexo = 'SELECT * FROM sexo';
                                    $resultado_conexao = mysqli_query($conexao, $resultado_sexo);

                                    while($linhas_sexo = mysqli_fetch_assoc($resultado_conexao)){
                                    ?>
                                    <option value="<?php echo $linhas_sexo['id_sexo']; ?>"> <?php echo $linhas_sexo['descricao_sexo']; ?></option>

                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="campo-input">
                                <!-- Tipo de documento a pessoa tem para se identificar -->
                                <label for="tipo_documento_usu">Tipo de documento de identidade</label>
                                <select name="tipo_documento_usu">
                                    <option disabled selected required>Selecione</option>
                                    <?php
                                    $resultado_documentos = 'SELECT * FROM tipo_documento';
                                    $resultado_conexao = mysqli_query($conexao, $resultado_documentos);

                                    while($linhas_doc = mysqli_fetch_assoc($resultado_conexao)){
                                    ?>
                                    <option value="<?php echo $linhas_doc['id_doc']; ?>"><?php echo $linhas_doc['tipo_doc']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="campo-input">
                                <!-- Número do documento identificador -->
                                <label for="identidade_usu">Número de identidade</label>
                                <input type="text" name="identidade_usu" placeholder="Digite seu número de identidade" maxlength="20" required>
                            </div>
                            <div class="campo-input">
                                <!-- Etnia que a pessoa se considera -->
                                <label for="etnia_usu">Etnia/Raça</label>
                                <select name="etnia_usu">
                                    <option disabled selected required>Selecione sua etnia</option>
                                    
                                    <?php
                                    $resultado_etnia = 'SELECT * FROM etnia';
                                    $resultado_conexao = mysqli_query($conexao, $resultado_etnia);

                                    while($linhas_etnia = mysqli_fetch_assoc($resultado_conexao)){
                                    ?>
                                    <option value="<?php echo $linhas_etnia['id_etn']; ?>"> <?php echo $linhas_etnia['descricao_etn']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            
                            <div class="campo-input">
                                <!-- Número de telefone -->
                                <label for="tel_usu">Telefone</label>
                                <input type="tel" name="tel_usu"placeholder="(xx) xxxxx-xxxx" maxlength="11">
                            </div>
                            <div class="campo-input">
                                <!-- Número de celular -->
                                <label for="cel_usu">Celular</label>
                                <input type="tel" placeholder="(xx) xxxxx-xxxx" name="cel_usu" maxlength="11" required>
                            </div>
                            <div class="campo-input">
                                <!-- Foto da pessoa -->
                                <label for="foto_usu">Foto de usuário</label>
                                <input type="hidden">
                                <input type="file" name="foto_usu" accept=".png, .jpg, .jpeg" placeholder="Upload do sua foto">
                            </div>
                        </div>
                    </div>

                    <!-- Sessão dados profissionais -->
                    <div class="detalhes profissional">
                        <span class="titulo">Dados profissionais</span>
                        <div class="componentes">
                            <div class="campo-input">
                                <!-- Profissão que a pessoa tem interesse -->
                                <label form="profissao_interesse_usu">Profissão de interesse:</label>
                                <input type="text" name="profissao_interesse_usu" placeholder="Digite a profissão que te interessa" maxlength="200" required>
                            </div>
                            <div class="campo-input">
                                <!-- Formação acadêmica da pessoa -->
                                <label for="formacao_usu">Formação Acadêmica</label>
                                <select name="formacao_usu"> 
                                    <option disabled selected required>Selecione sua formação</option>
                                    <?php
                                    $resultado_formacao = 'SELECT * FROM formacao_usuario';
                                    $resultado_conexao = mysqli_query($conexao, $resultado_formacao);

                                    while($linhas_formacao = mysqli_fetch_array($resultado_conexao)){
                                    ?>
                                    <option value="<?php echo $linhas_formacao['id_form']; ?>"><?php echo $linhas_formacao['descricao_form']; ?></option>

                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="campo-input">
                                <!-- Sobre a pessoa -->
                                <label for="bio_usu">Conte um pouco sobre você</label>
                                <textarea name="bio_usu" id="bio_usu"></textarea>
                            </div>

                            <div class="campo-input">
                                <!-- Curriculo da pessoa -->
                                <label for="curriculo_usu">Curriculo</label>
                                <input type="hidden">
                                <input type="file" name="curriculo_usu"  multiple accept="application/pdf, .docx" placeholder="Upload do seu curriculo">
                            </div>

                            <div class="campo-input">
                                <!-- E-mail da pessoa -->
                                <label for="email_usu">E-mail</label>
                                <input type="email" name="email_usu" placeholder="Digite seu e-mail" maxlength="80" required>
                            </div>

                            <div class="campo-input">
                                <!-- Senha da pessoa -->
                                <label for="senha_usu">Senha</label>
                                <input type="password" name="senha_usu" placeholder="Crie uma senha" maxlength="15" required>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Segunda parte do formulário -->
                <div class="form terceiro">
                    <!-- Sessâo referende aos dados de endereço -->
                    <div class="detalhes endereco">
                        <span class="titulo">Dados de endereço</span>
                       
                        <div class="componentes">
                            <div class="campo-input">
                                 <!-- Nome da rua -->
                                <label for="endereco_usu">Endereço</label>
                                <input type="text" name="endereco_usu" placeholder="Digite seu endereço" maxlength="80" required>
                            </div>

                            <div class="campo-input">
                                <!-- Número da residência  -->
                                <label for="num_residencia_usu">Número</label>
                                <input type="number" name="num_residencia_usu" placeholder="Número de sua residência"  required>
                            </div>

                            <div class="campo-input">
                                <!-- Nome do bairro -->
                                <label for="bairro_usu">Bairro</label>
                                <input type="text" name="bairro_usu" placeholder="Digite o nome do bairro" maxlength="80" required>
                            </div>

                            <div class="campo-input">
                                <!-- Cep da pessoa -->
                                <label for="cep_usu">CEP</label>
                                <input type="number" name="cep_usu" placeholder="Digite seu CEP" required>
                            </div>

                            <div class="campo-input">
                                <!-- Complemento, se caso tiver -->
                                <label for="complemento_usu">Complemento</label>
                                <input type="text" name="complemento_usu" placeholder="Digite seu complemento" maxlength="50">
                            </div>

                            <div class="campo-input">
                                <!-- Pais no qual reside -->
                                <label for="pais_usu">País</label>
                                <input type="text" name="pais_usu" placeholder="Digite seu país" maxlength="80" required>
                            </div>

                            <div class="campo-input">
                                <!-- Cidade na qual reside -->
                                <label for="cidade_usu">Cidade</label>
                                <input type="text" name="cidade_usu" placeholder="Digite sua cidade" maxlength="80" required>
                            </div>

                            <div class="campo-input">
                                <!-- Estado no qual reside -->
                                <label for="estado_usu">Estado</label>
                                <input type="text" name="estado_usu" placeholder="Digite seu estado" maxlength="80" required>
                            </div>
                        </div>
                    </div>
                
                    <!-- Sessão sobre a situação do imigrante -->
                    <div class="detalhes situacao">
                        <span class="titulo">Sua situação</span>
                        <div class="componentes">
                            <div class="campo-input">
                                <!-- Se a pessoa possui alguma deficiencia -->
                                <label for="deficiencia_usu">Possui alguma deficiência?</label>
                                <select name="deficiencia_usu">
                                    <option disabled selected required>Selecione</option>
                                    <?php
                                    $resultado_deficiencias = 'SELECT * FROM deficiencias';
                                    $resultado_conexao = mysqli_query($conexao, $resultado_deficiencias);

                                    while($linhas_deficiencias = mysqli_fetch_assoc($resultado_conexao)){
                                    ?>
                                    <option value="<?php echo $linhas_deficiencias['id_def']; ?>"> <?php echo $linhas_deficiencias['descricao_def']; ?></option>

                                    <?php 
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="campo-input">
                                <!-- Se possui visto -->
                                <label for="possui_visto_usu">Possui visto?</label>
                                <select name="possui_visto_usu" id="possui_visto_usu">
                                    <option disabled selected required>Selecione</option>

                                    <?php
                                    $resultado_visto = "SELECT * FROM visto";
                                    $resultado_conexao = mysqli_query($conexao, $resultado_visto);

                                    while($linhas_visto = mysqli_fetch_assoc($resultado_conexao)){
                                    ?>
                                    <option value="<?php echo $linhas_visto['id_visto']; ?>"><?php echo $linhas_visto['possui_visto']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="campo-input">
                                <!-- Qual o tipo de visto que a pessoa tem -->
                                <label for="tipo_visto_usu">Se sim, qual o tipo de visto?</label>
                                <input type="text" name="tipo_visto_usu" placeholder="Digite o tipo do seu visto" maxlength="100">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Botões próximo e anterior -->
                <div class="botoes_baixos">
                    <button class="btn-anterior" name="anterior">
                        Anterior
                    </button>
                    <button class="btn-proximo" name="proximo">
                        Próximo
                    </button>
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
            <!-- Informações de conato -->
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
    <!-- Script referente ao movimento do formulário -->
    <script type="text/javascript" src="../js/formularios/cadastro.js"></script>
</body>
</html>