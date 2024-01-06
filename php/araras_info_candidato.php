<?php

require_once('./conexao.php');
date_default_timezone_set('America/Sao_Paulo');

session_start();

$id_usuario_vaga = $_GET['id'];

if($id_usuario_vaga == 0){
    header('Location: ./araras_candidatos_emp.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Araras para Empresas | Perfil Candidato</title>

    <!-- Logo do projeto -->
    <link rel="icon" href="../img/logo/favicon-araras.svg">

    <!-- Links css -->
    <link rel="stylesheet" href="../css/fixos/menu.css">
    <link rel="stylesheet" href="../css/info_candidato.css">

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
                $sql = "SELECT * FROM usuario_simples WHERE id_usu = ".$id_usuario_vaga;
                $consulta = mysqli_query($conexao, $sql);
                $dados = mysqli_fetch_array($consulta);
                ?>
                <div class="imagem_usuario">
                    <!-- Foto do usuario -->
                    <?php
                        if($dados['foto_usuario'] == NULL){ ?>
                            <img src="../img/geral/image-removebg-preview.png">
                        <?php
                        }else{ ?>
                            <img src="../imagens_usuarios/<?php echo $dados['foto_usuario']; ?>">
                        <?php
                        }
                    ?>
                </div>
                <div class="nome_usuario">
                    <h1>
                        <?php
                            echo $dados['nome_usu'];
                        ?>
                    </h1>
                    <p>
                        <?php echo $dados['nacionalidade_usu'] ?>
                    </p>
                </div>
            </div>
                <div class="dados_amplos">
                    <ul>
                        <li> Nome social:
                            <?php echo $dados['nome_social_usu'] ?>
                        </li>
                        <li>
                            Data de nascimento:
                            <?php echo $dados['data_nascimento_usu'] ?>
                        </li>
                        <li>
                            Sexo:
                            <?php 
                                $sql = "SELECT * FROM sexo as sex
                                LEFT JOIN usuario_simples AS usu ON sex.id_sexo = usu.id_sexo_usu WHERE usu.id_usu = ".$id_usuario_vaga;
                                $consulta = mysqli_query($conexao, $sql);
                                $sexo = mysqli_fetch_array($consulta);

                                echo $sexo['descricao_sexo'];
                            
                            ?>
                        </li>
                        <li>
                            Documento: <?php 
                            
                            $sql = "SELECT * FROM tipo_documento as doc 
                            LEFT JOIN usuario_simples AS usu ON doc.id_doc = usu.id_tipo_doc_usu WHERE usu.id_usu = ".$id_usuario_vaga;
                            $consulta = mysqli_query($conexao, $sql);
                            $doc = mysqli_fetch_array($consulta);
                            
                            ?> <?php echo $doc['tipo_doc']; ?> - <?php echo $dados['identidade_usu']; ?>
                        </li>
                        <li>
                            Etnia/Cor:
                            <?php
                                $sql = "SELECT * FROM etnia AS et
                                LEFT JOIN usuario_simples AS usu ON et.id_etn = usu.id_etnia_usu WHERE usu.id_usu = ".$id_usuario_vaga;
                                $consulta = mysqli_query($conexao, $sql);
                                $etnia = mysqli_fetch_array($consulta);

                                echo $etnia['descricao_etn'];
                            ?>
                        </li>
                        <li>Formação:
                            <?php
                                $sql = "SELECT * FROM formacao_usuario AS form
                                LEFT JOIN usuario_simples AS usu ON form.id_form = usu.id_formacao_usu WHERE usu.id_usu =  ".$id_usuario_vaga;
                                $consulta = mysqli_query($conexao, $sql);
                                $formacao = mysqli_fetch_array($consulta);

                                echo $formacao['descricao_form'];
                            ?>
                        </li>
                    </ul>
                    <ul>
                        <li>Telefone:
                            <?php
                                if($dados['telefone_usu'] == NULL){
                                    echo "Não Informado.";
                                }else{
                                    echo $dados['telefone_usu'];
                                }
                            ?>
                        </li>
                        <li>Celular:
                            <?php
                                echo $dados['celular_usu'];
                            ?>
                        </li>
                        <li>E-mail:
                            <?php
                                echo $dados['email_usu'];
                            ?>
                        </li>
                        <li>Visto:
                            <?php
                                if($dados['id_visto_usu'] == 2){
                                    echo "Não tem";
                                }else{
                                    echo $dados['descricao_visto_usu'];
                                }
                            ?>
                        </li>
                        <li>Deficiencias:
                            <?php
                                $sql = "SELECT * FROM deficiencias AS def
                                LEFT JOIN usuario_simples AS usu ON def.id_def = usu.id_deficiencia_usu WHERE usu.id_usu = ".$id_usuario_vaga;
                                $consulta = mysqli_query($conexao, $sql);
                                $def = mysqli_fetch_array($consulta);

                                echo $def['descricao_def'];
                            ?>
                        </li>
                    </ul>
                </div>
                <div class="dados_pessoais">
                    <ul>
                        <li>Sobre:
                            <?php
                                if($dados['sobre_usu'] == NULL){
                                    echo "Não informado.";
                                }else{
                                    echo $dados['sobre_usu'];
                                }
                            ?>
                        </li>
                        <li>Área de interesse:
                            <?php
                                echo $dados['interesse_prof_usu'];
                            ?>
                        </li>
                    </ul>
                </div>
                <div class="dados_endereco">
                    <ul>
                        <li>Rua: 
                            <?php
                                echo $dados['rua_usu'];
                            ?>
                        </li>
                        <li>Número:
                            <?php
                                echo $dados['numero_casa_usu'];
                            ?>
                        </li>
                        <li>Complemento:
                            <?php
                                echo $dados['complemento_usu'];
                            ?>
                        </li>
                        <li>CEP:
                            <?php
                                echo $dados['cep_usu'];
                            ?>
                        </li>
                    </ul>
                    <ul>
                        <li>Bairro:
                            <?php
                                echo $dados['bairro_usu'];
                            ?>
                        </li>
                        <li>Cidade:
                            <?php
                                echo $dados['cidade_usu'];
                            ?>
                        </li>
                        <li>Estado:
                            <?php
                                echo $dados['estado_usu'];
                            ?>
                        </li>
                        <li>País:
                            <?php
                                echo $dados['pais_usu'];
                            ?>
                        </li>
                    </ul>
                </div>
            
        </div>
    </main>
    
</body>
</html>