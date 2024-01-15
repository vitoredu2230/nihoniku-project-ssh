<?php
session_start();
$id = $_GET['id_video'];
$conexao = mysqli_connect('localhost', 'root', '', 'nihoniku');
$sql = "SELECT video, nota_video, id_aluno FROM video WHERE id_video = $id";
//echo $sql;
$executar = mysqli_query($conexao, $sql);
$resultado = mysqli_fetch_array($executar);
$video = $resultado['video'];
$nota = $resultado['nota_video'];
$id_aluno = $resultado['id_aluno'];
?>
<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar</title>
</head>
<body>
<form action="atualizar_nota.php" method="post">
	  ID do video: <input type="text" name="id_video" value="<?php echo $id;?>" readonly><br> 
	  Video: <input type="text" name="video" value="<?php echo $video;?>" readonly><br>
	  Nota: <input type="text" name="nota" value="<?php echo $nota;?>"><br>
	  ID do aluno: <input type="text" name="id_aluno" value="<?php echo $id_aluno;?>" readonly><br>
	  <input type="submit" value="Atualizar">
	</form>
</body>
</html>