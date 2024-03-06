<?php
// Conectar ao banco de dados
$Localhost = 'Localhost';
$root = 'root';
$senha = '1234';
$banco = 'bd_site';

$conn = new mysqli($Localhost, $root, $senha, $banco);

// Verificar se a conexão foi bem-sucedida
if (!$conn) {
  die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
}
// Verifica se foram coletados a chaves de entrada
if (isset($_POST['entradaLog']) && isset($_POST['entradaPass'])) {
  $usuario = $_POST['entradaLog'];
  $senha = $_POST['entradaPass'];

  // Resto do código de validação do usuário
} else {
  echo "Nome de usuário ou senha incorretos. nao foi coletado email e senha.";
}

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Extrair os valores do formulário
  $username = $_POST['entradaLog'];
  $password = $_POST['entradaPass'];

  // Executar a consulta para encontrar o usuário correspondente
  $sql = "SELECT * FROM usuarios WHERE EMAIL = '$username'";
  $result = mysqli_query($conn, $sql);

  // Verificar se um usuário foi encontrado
  if (mysqli_num_rows($result) == 1) {
    // Extrair a senha do usuário
    $row = mysqli_fetch_assoc($result);
    $hashed_password = $row["SENHA"];

    // Verificar se a senha corresponde à senha hash no banco de dados
    if (password_verify($password, $hashed_password)) {
      // Iniciar a sessão e armazenar o nome de usuário
      session_start();
      $_SESSION["entradaLog"] = $username;

      // Redirecionar para a página inicial após o login
      header("Location: ../site/home.html");
      exit();
    } else {
      // Senha incorreta
      echo "Senha incorreta.";
    }
  } else {
    // Nome de usuário incorreto
    echo "Nome de usuário incorreto.";
  }
}
?>

