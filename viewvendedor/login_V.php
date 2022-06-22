<?php
include ('../db/conexao.php');
if(empty($_POST['usuario']) || empty($_POST['senha'])) {
    header('Location: loginvendedor.php');
    exit();
}
$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
$query = "select vendedor_id, usuario from vendedor where usuario = '{$usuario}' and senha = md5('{$senha}')";
$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);
if($row == 1){
    $_SESSION['usuario'] = $usuario;
    header('Location: principal.php');
    exit();
}else {
    header('Location: loginvendedor.php');
    exit();
}
?>
