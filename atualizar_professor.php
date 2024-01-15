<?php
$id = $_POST['id_professor'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$login = $_POST['login'];
$conexao = mysqli_connect('localhost', 'root', '', 'nihoniku');
$sql = "UPDATE professor SET nome_professor='$nome', email_professor='$email', tel_professor='$tel', login='$login' WHERE id_professor='$id'";
$executar = mysqli_query($conexao, $sql);
if (mysqli_affected_rows($conexao) > 0) {
    echo "Atualizado com sucesso!<br> <a href='relatorio.php'>Voltar para o relatório</a>";
} else {
    echo "Erro ao atualizar.";
}
mysqli_close($conexao);
?>