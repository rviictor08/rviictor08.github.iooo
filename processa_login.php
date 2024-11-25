<?php
$host = "localhost"; 
$port = "5432";      
$dbname = "hotel-mataya"; 
$user = "user"; 
$password = "9090"; 

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Erro ao conectar ao banco de dados: " . pg_last_error());
}

// Verificando se foi enviado o formulario prenchido
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Consultando o banco de dados
    $query = "SELECT senha FROM usuarios WHERE email = $1";
    $result = pg_query_params($conn, $query, [$email]);

    if ($result && pg_num_rows($result) > 0) {
        $user = pg_fetch_assoc($result);
        
        // Verificando a senha
        if (password_verify($password, $user['senha'])) {
            echo "Login bem-sucedido! Bem-vindo.";
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Usuário não encontrado.";
    }

    // Fechando a conexão
    pg_close($conn);
}
?>
