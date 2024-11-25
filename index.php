<?php
$host = "localhost"; // Endereço do servidor do banco para eu fazer a vinculação
$port = "5432";      // Porta padrão do PostgreSQL padrao
$dbname = "hotel-mataya"; // Nome do banco de dados
$user = "user"; // Usuário do banco de dados
$password = "9090"; // Senha do banco de dados

// codigo que conecta ao banco de dados
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

// verifica atrasves de site se foi feita a conexao
if (!$conn) {
    die("Erro ao conectar ao banco de dados: " . pg_last_error());
} else {
    echo "Conexão bem-sucedida com o banco de dados!";
}

// Fechando a conexão (se quiser)
// pg_close($conn);
?>
