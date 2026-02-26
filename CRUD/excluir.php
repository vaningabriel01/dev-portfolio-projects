<?php
include("conexao.php");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "DELETE FROM alunos WHERE id = $id";

    if ($conexao->query($sql) === TRUE) {
        header("Location: listar.php?msg=excluido");
        exit;
    } else {
        echo "Erro ao excluir: " . $conexao->error;
    }
} else {
    echo "ID não informado.";
}
?>