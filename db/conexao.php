<?php
if (!defined('HOST')) define('HOST', '127.0.0.1');
if (!defined('USUARIO')) define('USUARIO', 'root');
if (!defined('SENHA')) define('SENHA', '');
if (!defined('DB')) define('DB', 'login');
$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die('Não foi possível conectar');
?>