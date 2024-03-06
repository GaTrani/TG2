<?php
$Localhost = 'Localhost';
$root = 'root';
$senha = '1234';
$banco = 'bd_site';

$conexao = new mysqli($Localhost, $root, $senha, $banco);

if($conexao -> connect_error){    
    echo "nao foi possivel estabelecer a conexao com o banco de dados.";
}
else{
    echo "conectado com sucesso.";
}
?>