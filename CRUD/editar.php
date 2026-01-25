<?php
include("conexao.php");

if (!isset($_GET['id'])) {
    die("ID não informado.");
}

$id = intval($_GET['id']);

$sql = "SELECT * FROM alunos WHERE id = $id";
$resultado = $conexao->query($sql);

if ($resultado->num_rows == 0) {
    die("Aluno não encontrado.");
}

$aluno = $resultado->fetch_assoc();

if (isset($_POST['nome']) && isset($_POST['email'])) {

    $nome = $conexao->real_escape_string($_POST['nome']);
    $email = $conexao->real_escape_string($_POST['email']);

    $sqlUpdate = "UPDATE alunos SET nome='$nome', email='$email' WHERE id=$id";

    if ($conexao->query($sqlUpdate) === TRUE) {
        header("Location: listar.php?msg=atualizado");
        exit;
    } else {
        echo "Erro ao atualizar: " . $conexao->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Editar Aluno</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="m-8">

<h2 class="text-2xl font-bold mb-4">Editar Aluno</h2>

<form method="POST" class="space-y-4 max-w-md">

  <label class="block">
    <span class="font-semibold">Nome:</span>
    <input type="text" name="nome" value="<?php echo $aluno['nome']; ?>" required
           class="w-full p-2 border rounded">
  </label>

  <label class="block">
    <span class="font-semibold">Email:</span>
    <input type="email" name="email" value="<?php echo $aluno['email']; ?>" required
           class="w-full p-2 border rounded">
  </label>

  <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
    Atualizar
  </button>

</form>

</body>
</html>