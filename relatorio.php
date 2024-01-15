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
    <title>Relatório</title>
</head>
<body>
    <main>
        <div class="aluno">
            <h1>Alunos:</h1>
            <?php
                $conexao = mysqli_connect('localhost', 'root', '', 'nihoniku');
                $sql = "SELECT * FROM Aluno";
                $executar = mysqli_query($conexao, $sql);
                echo "<table border='1'><tr><th>ID</th><th>Nome</th><th>Email</th><th>Telefone</th><th>Login</th><th>Excluir</th><th>Atualizar</th></tr>";
                while($resultado = mysqli_fetch_array($executar)){
                    $id = $resultado['id_aluno'];
                    $nome = $resultado['nome_aluno'];
                    $email = $resultado['email_aluno'];
                    $tel = $resultado['tel_aluno'];
                    $login = $resultado['login'];
                    echo "<tr><td>$id</td><td>$nome</td><td>$email</td><td>$tel</td><td>$login</td><td><a href='apaga_aluno.php?id_aluno=$id'>Excluir</a></td><td><a href='atualiza_aluno.php?id_aluno=$id'>Atualizar</a></td></tr>";
                    }
                echo "</table>";
                mysqli_close($conexao);
            ?>
        </div>
        <br>
        <div class="professor">
            <h1>Professores:</h1>
            <?php
                $conexao = mysqli_connect('localhost', 'root', '', 'nihoniku');
                $sql = "SELECT * FROM Professor";
                $executar = mysqli_query($conexao, $sql);
                echo "<table border='1'><tr><th>ID</th><th>Nome</th><th>Email</th><th>Telefone</th><th>Login</th><th>Excluir</th><th>Atualizar</th></tr>";
                while($resultado = mysqli_fetch_array($executar)){
                    $id = $resultado['id_professor'];
                    $nome = $resultado['nome_professor'];
                    $email = $resultado['email_professor'];
                    $tel = $resultado['tel_professor'];
                    $login = $resultado['login'];
                    echo "<tr><td>$id</td><td>$nome</td><td>$email</td><td>$tel</td><td>$login</td><td><a href='apaga_professor.php?id_professor=$id'>Excluir</a></td><td><a href='atualiza_professor.php?id_professor=$id'>Atualizar</a></td></tr>";
                    }
                echo "</table>";
                mysqli_close($conexao);
            ?>
        </div>
        <br>
        <a href="adm.php">Voltar</a>
    </main>
</body>
</html>