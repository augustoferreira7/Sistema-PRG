<?php
//variaveis para a conexão
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "pr3_2025";

//tratamento de erro

try{
    $pdo = new pdo("mysql:dbname=$banco; host=$servidor; charset=utf8", "$usuario", "$senha");
}catch(exception $e){
    echo "Erro ao conectar com o banco de dados! " . $e;
}
?>