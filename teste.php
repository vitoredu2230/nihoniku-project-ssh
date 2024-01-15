<?php
$r1 = $_POST['resposta1'];
$r2 = $_POST['resposta2'];
$r3 = $_POST['resposta3'];
$r4 = $_POST['resposta4'];
$r5 = $_POST['resposta5'];
$r6 = $_POST['resposta6'];
if ($r1 == 'aisatsu' && $r2 == 'benri' && $r3 == 'sassoku' && $r4 == 'benkyoushinakatta' && $r5 == 'isshoninaru' && $r6 == 'hiroshimatotoukyou') {
    header("Location: shitsumon.html");
}
else {
    header("Location: cadastro.html");
}
?>