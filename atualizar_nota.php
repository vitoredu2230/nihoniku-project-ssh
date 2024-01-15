<?php
$id = $_POST['id_video'];
$video = $_POST['video'];
$nota = $_POST['nota'];
$id_aluno = $_POST['id_aluno'];
$conexao = mysqli_connect('localhost', 'root', '', 'nihoniku');
$sql = "UPDATE video SET nota_video='$nota'WHERE id_video='$id'";
$executar = mysqli_query($conexao, $sql);
if (mysqli_affected_rows($conexao) > 0) {
    echo "Atualizado com sucesso!<br> <a href='notas.php'>Voltar para notas</a> <br> <a href='dashboardprof.php'>Voltar para o dashboard</a>";
} else {
    echo "Erro ao atualizar.";
}
mysqli_close($conexao);
?>