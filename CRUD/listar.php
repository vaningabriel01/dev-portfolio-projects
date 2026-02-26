<?php include("conexao.php"); ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title>Lista de Alunos</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="m-8">

<h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Lista de Alunos</h2>
<a href='inserir.php' class='text-blue-600 font-semibold hover:underline'>Criar novo aluno</a>

<?php
$sql = "SELECT * FROM alunos";
$resultado = $conexao->query($sql);

if ($resultado->num_rows > 0) {

    echo "<table class='min-w-full bg-white border border-gray-300 rounded'>";
    echo "<tr class='bg-gray-100'>
            <th class='p-2 border'>ID</th>
            <th class='p-2 border'>Nome</th>
            <th class='p-2 border'>Email</th>
            <th class='p-2 border'>Ações</th>
          </tr>";

    while ($linha = $resultado->fetch_assoc()) {
        echo "<tr>
                <td class='p-2 border'>{$linha['id']}</td>
                <td class='p-2 border'>{$linha['nome']}</td>
                <td class='p-2 border'>{$linha['email']}</td>
                <td class='p-2 border text-center'>
                  <a href='editar.php?id={$linha['id']}' class='text-blue-600 font-semibold hover:underline'>Editar</a> |
                  <a href='excluir.php?id={$linha['id']}' class='text-red-600 font-semibold hover:underline'
                     onclick='return confirm(\"Tem certeza que deseja excluir?\")'>Excluir</a>
                </td>
              </tr>";
    }

    echo "</table>";

} else {
    echo "<p class='text-center text-gray-600'>Nenhum aluno cadastrado.</p>";
}
?>

</body>
</html>