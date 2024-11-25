<?php
$host = "localhost"; 
$port = "5432";      
$dbname = "hotel-mataya"; 
$user = "user"; 
$password = "9090"; 

// Conexão com o banco de dados
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Erro ao conectar ao banco de dados: " . pg_last_error());
}

// Verificando se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtendo os dados do formulário
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];

    // Validando se as senhas coincidem
    if ($password !== $confirm_password) {
        die("As senhas não coincidem. Por favor, tente novamente.");
    }

    // Hash da senha para maior segurança
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Inserindo os dados no banco de dados
    $query = "INSERT INTO usuarios (nome, email, senha) VALUES ($1, $2, $3)";
    $result = pg_query_params($conn, $query, [$name, $email, $hashed_password]);

    if ($result) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar: " . pg_last_error($conn);
    }

    // Fechando a conexão
    pg_close($conn);
}
?>
