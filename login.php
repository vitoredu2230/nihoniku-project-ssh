<?php
session_start();
$login = $_POST['login'];
$senha = $_POST['senha'];
$enviar = $_POST['enviar'];
$select = $_POST['select'];
$_SESSION['login'] = $login;
$_SESSION['senha'] = $senha;
$_SESSION['enviar'] = $enviar;
$_SESSION['select'] = $select;
$conexao = mysqli_connect('localhost', 'root', '', 'nihoniku');
if (isset($enviar)) {
    $verifica = mysqli_query($conexao, "SELECT * FROM $select WHERE login = '$login' AND senha = '$senha'") or die("erro ao selecionar");
    if (mysqli_num_rows($verifica)<=0) {
        echo "Login ou senha incorretos! Por favor, tente novamente!<br><a href='login.html'>Login</a>";
        die();
    }
    else {
        header("Location: verifica.php");
    }
}
?>