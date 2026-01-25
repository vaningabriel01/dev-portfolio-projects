<?php
$host = "localhost:3307";
$usuario = "root"; // usuário padrão do XAMPP
$senha = "";       // senha padrão (em branco)
$banco = "escola"; // nome do banco de dados

$conexao = new mysqli($host, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}
// Opcional: remover echo em produção
//echo "Conectado com sucesso!";
?>
      