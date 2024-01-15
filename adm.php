<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nihoniku";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$login = $_SESSION['login'];
$sql_id = "SELECT id_admin FROM admin WHERE login = '$login'";
$result_id = $conn->query($sql_id);

if ($result_id->num_rows > 0) {
    $row_id = $result_id->fetch_assoc();
    $id = $row_id["id_admin"];

    $sql = "SELECT nome_admin FROM admin WHERE id_admin = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nomeUsuario = $row["nome_admin"];   
    }
    else {
        $nomeUsuario = "Usuário não encontrado";
    }
} else {
    $nomeUsuario = "Usuário não encontrado";
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/adm.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li>
                    <a href="adm.php">Dashboard</a>
                </li>
                <li>
                    <a href="notas.php">Notas</a>
                </li>
                <li>
                    <a href="logout.php">Sair</a>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <div>
            <h1>Seja bem vindo administrador <?php echo "$nomeUsuario"?>!</h1>
            <p>Acesse aqui o relatório:</p>
            <button><a href="relatorio.php">Acessar</a></button>
        </div>
    </main>
</body>
</html>