<?php
session_start();
$select = $_POST['select'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$tel = $_POST['telefone'];
$login = $_POST['login'];
$senha = $_POST['senha'];
$conexao = mysqli_connect('localhost', 'root', '', 'nihoniku');
$sql = "INSERT INTO $select (nome_$select, email_$select, tel_$select, login, senha) value('$nome', '$email', '$tel', '$login', '$senha')";
$executar = mysqli_query($conexao, $sql);
if ($executar == 1 && $select == 'aluno') {
    header("Location: login.html");
}
else if ($executar == 1 && $select == 'professor') {
    header("Location: login.html");
}
else{
    echo "Erro ao fazer o cadastro, tente novamente!<br><a href='cadastro.html'></a>";
}
mysqli_close($conexao);
?>