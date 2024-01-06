
<?php

// Criando as váriaveis para que seja possível fazer a conexão com o banco de dados
$servidor = 'localhost';  //Nome do servidor 
$usuario = 'root'; //Nome do usuario
$senha = 'devisate'; //Senha 
$banco = 'banco_araras'; //Nome do banco de dados

// Estabelecendo a conexão com o banco de dados
date_default_timezone_set('America/Sao_Paulo');
$conexao =  mysqli_connect($servidor, $usuario, $senha, $banco) 
    or die ('Não foi possivel estabelecer uma conexão com o banco de dados.'); // Se caso der errado, mostrar mensagem de erro.
$conexao->set_charset("UTF8");
// Fecha a conexão com o banco de dados
// mysqli_close($conexao);

?>