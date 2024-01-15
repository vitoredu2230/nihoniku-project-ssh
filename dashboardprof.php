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
$sql_id = "SELECT id_professor FROM professor WHERE login = '$login'";
$result_id = $conn->query($sql_id);

if ($result_id->num_rows > 0) {
    $row_id = $result_id->fetch_assoc();
    $id = $row_id["id_professor"];

    $sql = "SELECT nome_professor FROM professor WHERE id_professor = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nomeUsuario = $row["nome_professor"];   
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
    <link rel="stylesheet" href="css/prof.css">
    <title>Dashboard</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li>
                    <a href="dashboardprof.php">Dashboard</a>
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
            <h1>Seja bem vindo professor <?php echo "$nomeUsuario"?>!</h1>
            <p>Aqui está a lista dos alunos de hoje!</p>
            <?php
            $conexao = mysqli_connect('localhost', 'root', '', 'nihoniku');
            $sql = "SELECT * FROM aluno ORDER BY nome_aluno ASC";
            $executar = mysqli_query($conexao, $sql);
            echo "<table border='1'><tr><th>ID</th><th>Nome</th><th>Email</th><th>Telefone</th></tr>";
            while($resultado = mysqli_fetch_array($executar)){
                $id = $resultado['id_aluno'];
                $nome = $resultado['nome_aluno'];
                $email = $resultado['email_aluno'];
                $tel = $resultado['tel_aluno'];
                echo "<tr><td>$id</td><td>$nome</td><td>$email</td><td>$tel</td></tr>";
                }
                echo "</table>";
                mysqli_close($conexao);
            ?>
        </div>
    </main>
</body>
</html>