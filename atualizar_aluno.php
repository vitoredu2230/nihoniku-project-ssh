<?php
$id = $_POST['id_aluno'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$login = $_POST['login'];
$conexao = mysqli_connect('localhost', 'root', '', 'nihoniku');
$sql = "UPDATE aluno SET nome_aluno='$nome', email_aluno='$email', tel_aluno='$tel', login='$login' WHERE id_aluno='$id'";
$executar = mysqli_query($conexao, $sql);
if (mysqli_affected_rows($conexao) > 0) {
    echo "Atualizado com sucesso!<br> <a href='relatorio.php'>Voltar para o relatório</a>";
} else {
    echo "Erro ao atualizar.";
}
mysqli_close($conexao);
?>