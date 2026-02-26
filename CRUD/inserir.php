<?php include("conexao.php"); ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title>Inserir Aluno</title>
</head>
<body>

<h2>Cadastrar Aluno</h2>

<form method="POST">
    Nome: <input type="text" name="nome" required><br>
    E-mail: <input type="email" name="email" required><br>
    <button type="submit">Salvar</button>
</form>

<?php
if (isset($_POST["nome"]) && isset($_POST["email"])) {
    $nome = $conexao->real_escape_string($_POST["nome"]);
    $email = $conexao->real_escape_string($_POST["email"]);

    $sql = "INSERT INTO alunos (nome, email) VALUES ('$nome', '$email')";

    if ($conexao->query($sql) === TRUE) {
        echo "<p>Aluno cadastrado com sucesso!</p>";
    } else {
        echo "<p>Erro: " . $conexao->error . "</p>";
    }
}
?>

</body>
</html>
      
