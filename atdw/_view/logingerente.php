<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../_images/logo.png">
    <title>Tela de login do gerente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../_css/login.css" type="text/css" rel="stylesheet">
</head>
<body class="text-center">
  <form action="login_G.php" method="POST" class="form-signin">
        <img class="mb-4" src="../_images/logogerente.png" alt="Tela de Login" width="100px" height="100px">
        <h1 class="h3 mb-3 font-weight-normal">Realize o login</h1>
        <label class="sr-only">Endereço de E-mail</label>
        <input name="usuario" class="form-control" placeholder="Digite seu E-mail" >

        <label class="sr-only">Senha</label>
        <input name="senha" type="password" id="inputPassword" class="form-control" placeholder="Digite sua senha" ><br>


        <button class="btn btn-lg btn-primary" type="submit">Entrar</button>
        <p class="mt-5 mb-3 text-muted">&copy;2022</p>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>