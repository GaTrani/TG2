<?php
$Localhost = 'Localhost';
$root = 'root';
$senha = '1234';
$banco = 'bd_site';

$conexao = new mysqli($Localhost, $root, $senha, $banco);

if($conexao -> connect_error){    
    echo "nao foi possivel estabelecer a conexao com o banco de dados.";
}else{
    echo "conectado com sucesso.";
}    

$nomeUsuario = isset($_POST['nomeUsuario']) ? $_POST['nomeUsuario']: "";
$nomeEmail = isset($_POST['nomeEmail']) ? $_POST['nomeEmail']: "";
$nomeSenha = isset($_POST['nomeSenha']) ? $_POST['nomeSenha']: "";
$nomeSenha = $hash = password_hash($nomeSenha, PASSWORD_DEFAULT);

$sql = "insert into usuarios(USUARIO, EMAIL, SENHA) values('$nomeUsuario', '$nomeEmail','$nomeSenha')";

$resulado = $conexao->query($sql) or trigger_error($conexao->error);

if ($conexao->affected_rows > 0) {
    echo "Dados inseridos com sucesso.";
    session_start();
    // Redirecionar para a página inicial após o login
    header("Location: ../index.html");
} else {
    echo "Erro ao enviar dados.";
}

$conexao -> close();

?>