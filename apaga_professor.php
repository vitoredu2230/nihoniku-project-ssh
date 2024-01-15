<?php
$id = $_GET['id_professor'];
$conexao = mysqli_connect('localhost', 'root', '', 'nihoniku');
$sql = "DELETE FROM professor WHERE id_professor = $id";
$exe = mysqli_query($conexao, $sql);
if($exe){
  echo "Registro Excluído com Sucesso!<br><a href='relatorio.php'>Voltar para o relatório</a>";
}
else{
  echo "Erro ao deletar o usuário.";
}
mysqli_close($conexao);
?>