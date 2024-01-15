<?php
$id = $_GET['id_aluno'];
$conexao = mysqli_connect('localhost', 'root', '', 'nihoniku');
$sql = "SELECT nome_aluno, email_aluno, tel_aluno, login FROM aluno WHERE id_aluno = $id";
//echo $sql;
$executar = mysqli_query($conexao, $sql);
$resultado = mysqli_fetch_array($executar);
$nome = $resultado['nome_aluno'];
$email = $resultado['email_aluno'];
$tel = $resultado['tel_aluno'];
$login = $resultado['login'];
mysqli_close($conexao);
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
<form action="atualizar_aluno.php" method="post">
	  ID do aluno: <input type="text" name="id_aluno" value="<?php echo $id;?>" readonly><br> 
	  Nome do aluno: <input type="text" name="nome" value="<?php echo $nome;?>"><br>
	  Email do aluno: <input type="text" name="email" value="<?php echo $email;?>"><br>
	  Telefone do aluno: <input type="text" name="tel" value="<?php echo $tel;?>"><br>
      Login: <input type="text" name="login" value="<?php echo $login;?>"><br>
	  <input type="submit" value="Atualizar">
	</form>
</body>
</html>