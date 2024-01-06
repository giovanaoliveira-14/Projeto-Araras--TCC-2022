<?php
 
require_once('./conexao.php');
date_default_timezone_set('America/Sao_Paulo');

if(isset($_POST['btn_contato'])){
$nome_contato = $_POST['nome_contato'];
$email_contato = $_POST['email_contato'];
$telefone_contato = $_POST['telefone_contato'];
$assunto_contato = $_POST['assunto_contato'];
$mensagem_contato = $_POST['mensagem_contato'];

$resultado_contato = "INSERT INTO contato(
    nome_cont,
    email_cont,
    telefone_cont,
    mensagem_cont,
    id_assunto_cont
    )VALUES(
    '$nome_contato',
    '$email_contato',
    '$telefone_contato',
    '$mensagem_contato',
    $assunto_contato
)";

$resultado_conexao = mysqli_query($conexao, $resultado_contato);

}else{

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Araras | Contato</title>

    <!-- Logo do projeto -->
    <link rel="icon" href="../img/logo/favicon-araras.svg">

    <!-- Links css -->
    <link rel="stylesheet" href="../css/fixos/menu.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/formularios/contato.css">

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
            <h1>Entre em contato com nossa equipe</h1>
            <div class="conteudo">
                <!-- Lado no qual contem informações de contato -->
                <div class="lado_esquerdo">
                    <h3>Entre em contato e estaremos sempre dipostos a te ajudar!</h3>
                    <div class="elementos">
                        <div class="campo-elemento">
                            <!-- E-mail do projeto -->
                            <img src="../img/icones/icone_email.png" alt="ícone de um envelope fechado">
                            <p>Nosso e-mail</p>
                            <p>grupinhodoTCC22@gmail.com</p>
                        </div>
                        <div class="campo-elemento">
                            <!-- Telefone de contato -->
                            <img src="../img/icones/icone_telefone.png" alt="ícone de um telefone">
                            <p>Nosso telefone</p>
                            <p>(14) 3433-5467</p>
                        </div>
                        <div class="campo-elemento">
                            <!-- Endereço -->
                            <img src="../img/icones/icone_local_ponto.png" alt="ícone de um ponto de local">
                            <p>Nosso endereço</p>
                            <p>Av. Castro Alves, 62 - Somenzari, Marília - SP</p>
                        </div>
                    </div>
                </div>
                <div class="lado_direito">
                    <!-- Formulário -->
                    <form action="./araras_contato.php" method="POST">
                        <div class="form">
                            <div class="componentes">
                                <div class="campo-input">
                                    <!-- Nome completo -->
                                    <label for="nome_contato">Nome completo:</label>
                                    <input type="text" name="nome_contato" maxlength="80" required>
                                </div>
                                <div class="campo-input email-tel">
                                    <!-- E-mail -->
                                    <label for="email_contato">E-mail:</label>
                                    <input type="email" name="email_contato" maxlength="80" required>
                                </div>
                                <div class="campo-input">
                                    <!-- Telefone -->
                                    <label for="telefone_contato">Telefone:</label>
                                    <input type="tel" name="telefone_contato" maxlength="11">
                                </div>
                                <div class="campo-input">
                                    <!-- Assunto referente a esse contato -->
                                    <label for="assunto_contato">Assunto:</label>
                                    <select name="assunto_contato">
                                        <option disabled selected required>Selecione</option>

                                        <?php
                                    $resultado_assunto = 'SELECT * FROM assunto_contato';
                                    $resultado_conexao = mysqli_query($conexao, $resultado_assunto);

                                    while($linhas_assunto = mysqli_fetch_assoc($resultado_conexao)){
                                    ?>
                                    <option value="<?php echo $linhas_assunto['id_ass']; ?>"> <?php echo $linhas_assunto['descricao_ass']; ?></option>

                                    <?php
                                    }
                                    ?>
                                    </select>
                                </div>
                                <div class="campo-input">
                                    <!-- Mensagem -->
                                    <label for="mensagem_contato">Mensagem:</label>
                                    <textarea name="mensagem_contato" id="mensagem_contato" cols="30" rows="10" maxlength="300" required></textarea>
                                </div>
                                <div class="campo-input">
                                    <input type="submit" value="Enviar" name="btn_contato">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </main>
    
    <footer class="rodape">
        <div class="rodape-1">
            <h3 class="rodae-titulo">Páginas:</h3>
            <ul class="rodape-links">
                <li>
                    <a href="../araras_sobre.html" class="rodape-link">Sobre o Projeto</a>
                </li><br>
                <li>
                    <a href="./php/araras_trabalhos.php" class="rodape-link">Trabalhos disponiveis</a>
                </li><br>
                <li>
                    <a href="../araras_index_emp.html" class="rodape-link">Araras para Empresas</a>
                </li><br>
            </ul>
        </div>
        <div class="rodape-2">
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

    <script type="text/javascript" src="../js/fixos/mobile-navbar.js"></script>
</body>
</html>