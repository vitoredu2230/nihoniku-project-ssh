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
$sql_id_adm = "SELECT id_admin FROM admin WHERE login = '$login'";
$result_id_adm = $conn->query($sql_id_adm);

if ($result_id_adm->num_rows > 0) {
    $row_id_adm = $result_id_adm->fetch_assoc();
    $id = $row_id_adm["id_admin"];

    $sql = "SELECT nome_admin FROM admin WHERE id_admin = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nomeUsuario = $row["nome_admin"];   
    }
    else {
        $nomeUsuario = "Usuário não encontrado";
    }
} else{
    $sql_id_prof = "SELECT id_professor FROM professor WHERE login = '$login'";
    $result_id_prof = $conn->query($sql_id_prof);

    if ($result_id_prof->num_rows > 0) {
        $row_id_prof = $result_id_prof->fetch_assoc();
        $id = $row_id_prof["id_professor"];
    
        $sql = "SELECT nome_professor FROM professor WHERE id_professor = $id";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nomeUsuario = $row["nome_professor"];   
        }
        else {
            $nomeUsuario = "Usuário não encontrado";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas</title>
</head>
<body>
    <main>
        <div class="aluno">
            <h1>Alunos:</h1>
            <?php
                $conexao = mysqli_connect('localhost', 'root', '', 'nihoniku');
                $sql = "SELECT * FROM Video";
                $executar = mysqli_query($conexao, $sql);
                echo "<table border='1'><tr><th>ID</th><th>Video</th><th>Nota</th><th>ID Aluno</th><th>Atualizar</th></tr>";
                while($resultado = mysqli_fetch_array($executar)){
                    $id = $resultado['id_video'];
                    $video = $resultado['video'];
                    $nota = $resultado['nota_video'];
                    $id_aluno = $resultado['id_aluno'];
                    echo "<tr><td>$id</td><td>$video</td><td>$nota</td><td>$id_aluno</td><td><a href='atualiza_nota.php?id_video=$id'>Atualizar</a></td></tr>";
                    }
                echo "</table>";
                mysqli_close($conexao);
            ?>
        </div>
        <br>
        <a href="adm.php">Voltar para o Relatório</a>
        <br>
        <a href="dashboardprof.php">Voltar para o Dashboard</a>
    </main>
</body>
</html>