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
$sql_id = "SELECT id_aluno FROM aluno WHERE login = '$login'";
$result_id = $conn->query($sql_id);

if ($result_id->num_rows > 0) {
    $row_id = $result_id->fetch_assoc();
    $id = $row_id["id_aluno"];

    $sql = "SELECT nome_aluno FROM aluno WHERE id_aluno = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nomeUsuario = $row["nome_aluno"];   
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
    <link rel="stylesheet" href="css/aluno.css">
</head>
<body>
<header>
        <nav>
            <ul>
                <li>
                    <a href="dashboardaluno.php">Dashboard</a>
                </li>
                <li>
                    <a href="notas_aluno.php">Notas</a>
                </li>
                <li>
                    <a href="videoaulas.php">Video Aulas</a>
                </li>
                <li>
                    <a href="logout.php">Sair</a>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <div>
            <h1>Seja bem vindo aluno <?php echo "$nomeUsuario"?>!</h1>
            <p>Acesse aqui suas videoaulas!</p>
            <a href="videoaulas.php">Video aulas</a>
        </div>
    </main>
</body>
</html>