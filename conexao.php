<?php 



# Substitua abaixo os dados, de acordo com o banco criado
$host="localhost";
$user = "root"; 
$password = ""; 
$database = "fornecedor"; 

# Conecta com o servidor de banco de dados 
$conexao=new mysqli( $host, $user, $password, $database ); 

// Verifica se conectou corretamente
if ($conexao->connect_error) {
    die("Erro na conexão com o banco: " . $conexao->connect_error);
}


?>
