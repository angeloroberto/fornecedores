<?php 

# Substitua abaixo os dados, de acordo com o banco criado
$host="localhost";
$user = "root"; 
$password = ""; 
$database = "agendamento_teste"; 

# Conecta com o servidor de banco de dados 
$conexao=mysqli_connect( $host, $user, $password, $database ) or die( ' Erro na conexão ' ); 



?>
