<?php
if (isset($_POST['pergunta']) == 'sim') {
    header("Location: cadastro.html");
} else if(isset($_POST['pergunta']) == 'nao') {
    header("Location:cadastro.html");
}else {
    var_dump("não escolheu nenhuma resposta");
}
?>