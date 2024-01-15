<?php
session_start();
global $select;
$userRole = $_SESSION['select'];
echo "$userRole";
if ($userRole == 'aluno') {
    header("Location: dashboardaluno.php");
}
else if ($userRole == 'professor') {
    header("Location: dashboardprof.php");
}
else{
    header("Location: adm.php");
}
?>