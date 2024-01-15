<?php
$id = $_GET['id_professor'];
$conexao = mysqli_connect('localhost', 'root', '', 'nihoniku');
$sql = "SELECT nome_professor, email_professor, tel_professor, login FROM professor WHERE id_professor = $id";
//echo $sql;
$executar = mysqli_query($conexao, $sql);
$resultado = mysqli_fetch_array($executar);
$nome = $resultado['nome_professor'];
$email = $resultado['email_professor'];
$tel = $resultado['tel_professor'];
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
<form action="atualizar_professor.php" method="post">
	  ID do Professor: <input type="text" name="id_professor" value="<?php echo $id;?>" readonly><br> 
	  Nome do Professor: <input type="text" name="nome" value="<?php echo $nome;?>"><br>
	  Email do Professor: <input type="text" name="email" value="<?php echo $email;?>"><br>
	  Telefone do Professor: <input type="text" name="tel" value="<?php echo $tel;?>"><br>
      Login: <input type="text" name="login" value="<?php echo $login;?>"><br>
	  <input type="submit" value="Atualizar">
	</form>
</body>
</html>