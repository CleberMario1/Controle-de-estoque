<?php
$servidor = '127.0.0.1';
$usuario = 'root';
$senha = '';
$banco = 'banco';

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco) or die('Não foi possível conectar');
?>