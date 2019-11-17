<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "sistema_atestado";

//Criar a conexão
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname) or die('Erro ao conectar ao banco de dados');
?>