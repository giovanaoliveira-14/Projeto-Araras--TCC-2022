<?php 
 
require_once('./conexao.php');
date_default_timezone_set('America/Sao_Paulo');

session_start();
if(!isset($_SESSION['id_usu'])){
    header('Location: ./araras_login.php');
    exit;
}

$sql = "SELECT * FROM usuario_simples WHERE id_usu = ".$_SESSION['id_usu'];
$consulta = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_array($consulta);

if(isset( $_POST['modificar'])){

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

    $endereco_usu = $_POST['endereco_usu'];
    $num_residencia_usu = $_POST['num_residencia_usu'];
    $bairro_usu = $_POST['bairro_usu'];
    $cep_usu =  $_POST['cep_usu'];
    $complemento_usu = $_POST['complemento_usu'];
    $pais_usu = $_POST['pais_usu'];
    $cidade_usu = $_POST['cidade_usu'];
    $estado_usu = $_POST['estado_usu'];

    $resultado_modificado = "UPDATE usuario_simples SET
    nome_usu = '".$nome_completo_usu."',
    nome_social_usu = '".$nome_social_usu."',
    nacionalidade_usu = '".$nacionalidade_usu."',
    data_nascimento_usu = '".$data_nascimento_usu."',
    id_tipo_doc_usu = ".$tipo_documento_usu.",
    identidade_usu = '".$identidade_usu."',
    telefone_usu = '".$tel_usu."',
    celular_usu = '".$cel_usu."',
    email_usu = '".$email_usu."',
    senha_usu = '".$senha_usu."',
    rua_usu = '".$endereco_usu."',
    numero_casa_usu = ".$num_residencia_usu.",
    complemento_usu = '".$complemento_usu."',
    cep_usu = ".$cep_usu.",
    bairro_usu = '".$bairro_usu."',
    cidade_usu = '".$cidade_usu."',
    estado_usu = '".$estado_usu."',
    pais_usu = '".$pais_usu."',
    id_sexo_usu = ".$sexo_usu.",
    id_etnia_usu = ".$etnia_usu.",
    id_formacao_usu = ".$formacao_usu.",
    id_visto_usu = ".$possui_visto_usu.",
    descricao_visto_usu = '".$tipo_visto_usu."',
    id_deficiencia_usu = ".$deficiencia_usu.",
    interesse_prof_usu = '".$profissao_interesse_usu."',
    sobre_usu = '".$bio_usu."'
    WHERE id_usu = ".$_SESSION['id_usu'];

    $modificado = mysqli_query($conexao, $resultado_modificado);
}else{
    
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Araras | Perfil</title>

    <!-- Logo do projeto -->
    <link rel="icon" href="../img/logo/favicon-araras.svg">

    <!-- Links css -->
    <link rel="stylesheet" href="../css/fixos/menu.css">
    <link rel="stylesheet" href="../css/formularios/perfil.css">

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
            <h1>
                Modifique seus dados
            </h1>
                <form action="./araras_perfil.php" method="POST">
                    <div class="form">
                        <div class="detalhes_pessoais">
                            <div class="titulo">
                                <span>
                                    Dados Pessoais
                                </span>
                            </div>
                            <div class="componentes">
                                <div class="campo-input">
                                        <!-- Nome compelto da pessoa -->
                                        <label for="nome_completo_usu">Nome Completo</label>
                                        <input type="text" name="nome_completo_usu" value="<?php echo $dados['nome_usu'] ?>" maxlength="100">
                                    </div>
                                    <div class="campo-input">
                                        <!-- Nome social da pessoa, se caso tiver -->
                                        <label for="nome_social_usu">Nome Social</label>
                                        <input type="text" name="nome_social_usu" value="<?php echo $dados['nome_social_usu'] ?>" maxlength="100">
                                    </div>
                                    <div class="campo-input">
                                        <!-- Nacionalidade da pessoa -->
                                        <label for="nacionalidade_usu">Nacionalidade</label>
                                        <input type="text" name="nacionalidade_usu" value="<?php echo $dados['nacionalidade_usu'] ?>" maxlength="30">
                                    </div>
                                    <div class="campo-input">
                                        <!-- Data de nascimento da pessoa -->
                                        <label for="data_nascimento_usu">Data de nascimento</label>
                                        <input type="date" name="data_nascimento_usu" value="<?php echo $dados['data_nascimento_usu'] ?>">
                                    </div>
                                    <div class="campo-input">
                                        <!-- Sexo no qual a pessoa se identifica -->
                                        <label for="sexo_usu">Sexo</label>
                                        <select name="sexo_usu">
                                            <?php
                                                $consulta = "SELECT * FROM sexo AS sex
                                                LEFT JOIN usuario_simples AS usuario ON sex.id_sexo = usuario.id_sexo_usu WHERE usuario.id_usu =".$_SESSION['id_usu'];
                                                $consultado = mysqli_query($conexao, $consulta);
                                                $sexo = mysqli_fetch_array($consultado);
                                            ?>
                                            <option value="<?php echo $sexo['id_sexo']; ?>"><?php echo $sexo['descricao_sexo']; ?></option>
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
                                            <?php
                                                $consulta = "SELECT * FROM tipo_documento AS doc
                                                LEFT JOIN usuario_simples AS usuario ON doc.id_doc = usuario.id_tipo_doc_usu WHERE usuario.id_usu =".$_SESSION['id_usu'];
                                                $consultado = mysqli_query($conexao, $consulta);
                                                $documento = mysqli_fetch_array($consultado);
                                            ?>
                                            <option value="<?php echo $documento['id_doc']; ?>"><?php echo $documento['tipo_doc']; ?></option>
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
                                        <input type="text" name="identidade_usu" value="<?php echo $dados['identidade_usu'] ?>" maxlength="20">
                                    </div>
                                    <div class="campo-input">
                                        <!-- Etnia que a pessoa se considera -->
                                        <label for="etnia_usu">Etnia/Raça</label>
                                        <select name="etnia_usu">
                                            <?php
                                                $consulta = "SELECT * FROM etnia AS etnia
                                                LEFT JOIN usuario_simples AS usuario ON etnia.id_etn = usuario.id_etnia_usu WHERE usuario.id_usu =".$_SESSION['id_usu'];
                                                $consultado = mysqli_query($conexao, $consulta);
                                                $dados = mysqli_fetch_array($consultado);
                                            ?>
                                            <option value="<?php echo $dados['id_etn']; ?>"><?php echo $dados['descricao_etn']; ?></option>
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
                                        <input type="tel" name="tel_usu" value="<?php echo $dados['telefone_usu'] ?>" maxlength="11">
                                    </div>
                                    <div class="campo-input">
                                        <!-- Número de celular -->
                                        <label for="cel_usu">Celular</label>
                                        <input type="tel" name="cel_usu" value="<?php echo $dados['celular_usu'] ?>" maxlength="11">
                                    </div>
                                </div>
                            </div>
                            <div class="dados_profissionais">
                            <div class="titulo">
                                <span>
                                Dados profissionais
                                </span>
                            </div>
                            <div class="componentes">
                                <div class="campo-input">
                                    <!-- Profissão que a pessoa tem interesse -->
                                    <label form="profissao_interesse_usu">Profissão de interesse:</label>
                                    <input type="text" name="profissao_interesse_usu" value="<?php echo $dados['interesse_prof_usu'] ?>" maxlength="200">
                                </div>
                                <div class="campo-input">
                                    <!-- Formação acadêmica da pessoa -->
                                    <label for="formacao_usu">Formação Acadêmica</label>
                                    <select name="formacao_usu"> 
                                        <?php
                                            $consulta = "SELECT * FROM formacao_usuario AS formacao
                                            LEFT JOIN usuario_simples AS usuario ON formacao.id_form = usuario.id_formacao_usu WHERE usuario.id_usu =".$_SESSION['id_usu'];
                                            $consultado = mysqli_query($conexao, $consulta);
                                            $dados = mysqli_fetch_array($consultado);
                                        ?>
                                        <option value="<?php echo $dados['id_form']; ?>"><?php echo $dados['descricao_form']; ?></option>
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
                                    <!-- E-mail da pessoa -->
                                    <label for="email_usu">E-mail</label>
                                    <input type="email" name="email_usu" value="<?php echo $dados['email_usu'] ?>" maxlength="80">
                                </div>

                                <div class="campo-input">
                                    <!-- Senha da pessoa -->
                                    <label for="senha_usu">Senha da plataforma</label>
                                    <input type="password" name="senha_usu" value="<?php echo $dados['senha_usu'] ?>" maxlength="15">
                                </div>
                                <div class="campo-input">
                                    <!-- Sobre a pessoa -->
                                    <label for="bio_usu">Conte um pouco sobre você</label>
                                    <input type="text" name="bio_usu" id="bio_usu" value="<?php echo $dados['sobre_usu'] ?>" id="sobre"></input>
                                </div>
                            </div>
                        </div>


                        <div class="dados_endereco">
                            <div class="titulo">
                                <span>
                                    Dados de endereço
                                </span>
                            </div>
                            <div class="componentes">
                                <div class="campo-input">
                                        <!-- Nome da rua -->
                                    <label for="endereco_usu">Endereço</label>
                                    <input type="text" name="endereco_usu" value="<?php echo $dados['rua_usu'] ?>" maxlength="80">
                                </div>

                                <div class="campo-input">
                                    <!-- Número da residência  -->
                                    <label for="num_residencia_usu">Número</label>
                                    <input type="number" name="num_residencia_usu" value="<?php echo $dados['numero_casa_usu'] ?>">
                                </div>

                                <div class="campo-input">
                                    <!-- Nome do bairro -->
                                    <label for="bairro_usu">Bairro</label>
                                    <input type="text" name="bairro_usu" value="<?php echo $dados['bairro_usu'] ?>" maxlength="80">
                                </div>

                                <div class="campo-input">
                                    <!-- Cep da pessoa -->
                                    <label for="cep_usu">CEP</label>
                                    <input type="number" name="cep_usu" value="<?php echo $dados['cep_usu'] ?>">
                                </div>

                                <div class="campo-input">
                                    <!-- Complemento, se caso tiver -->
                                    <label for="complemento_usu">Complemento</label>
                                    <input type="text" name="complemento_usu" value="<?php echo $dados['complemento_usu'] ?>" maxlength="50">
                                </div>

                                <div class="campo-input">
                                    <!-- Pais no qual reside -->
                                    <label for="pais_usu">País</label>
                                    <input type="text" name="pais_usu" value="<?php echo $dados['pais_usu'] ?>" maxlength="80">
                                </div>

                                <div class="campo-input">
                                    <!-- Cidade na qual reside -->
                                    <label for="cidade_usu">Cidade</label>
                                    <input type="text" name="cidade_usu" value="<?php echo $dados['cidade_usu'] ?>" maxlength="80">
                                </div>

                                <div class="campo-input">
                                    <!-- Estado no qual reside -->
                                    <label for="estado_usu">Estado</label>
                                    <input type="text" name="estado_usu" value="<?php echo $dados['estado_usu'] ?>" maxlength="80">
                                </div>
                            </div>
                        </div>

                        <div class="dados_situacao">
                            <div class="titulo">
                                <span>
                                    Sua situação
                                </span>
                            </div>
                            <div class="componentes">
                                <div class="campo-input">
                                    <!-- Se a pessoa possui alguma deficiencia -->
                                    <label for="deficiencia_usu">Possui alguma deficiência?</label>
                                    <select name="deficiencia_usu">
                                        <?php
                                            $consulta = "SELECT * FROM deficiencias AS def
                                            LEFT JOIN usuario_simples AS usuario ON def.id_def = usuario.id_deficiencia_usu WHERE usuario.id_usu =".$_SESSION['id_usu'];
                                            $consultado = mysqli_query($conexao, $consulta);
                                            $dados = mysqli_fetch_array($consultado);
                                        ?>
                                        <option value="<?php echo $dados['id_def']; ?>"><?php echo $dados['descricao_def']; ?></option>
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
                                        <?php
                                            $consulta = "SELECT * FROM visto AS visto
                                            LEFT JOIN usuario_simples AS usuario ON visto.id_visto = usuario.id_visto_usu WHERE usuario.id_usu =".$_SESSION['id_usu'];
                                            $consultado = mysqli_query($conexao, $consulta);
                                            $dados = mysqli_fetch_array($consultado);
                                        ?>
                                        <option value="<?php echo $dados['id_visto']; ?>"><?php echo $dados['possui_visto']; ?></option>

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
                                    <input type="text" name="tipo_visto_usu" value="<?php echo $dados['descricao_visto_usu'] ?>" maxlength="100">
                                </div>
                                <div class="campo-input">
                                    <input type="submit" value="Modificar" name="modificar">
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </main>
<!-- Script referente a navbar -->
<script type="text/javascript" src="../js/fixos/mobile-navbar.js"></script>
</body>
</html>