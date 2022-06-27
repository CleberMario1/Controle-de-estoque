<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Vendas</title>
    <link rel="icon" href="../_images/logo.png">
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
</head>
<?php
include ("../db/conexao.php");
$sql = "SELECT * FROM produtos ORDER BY qnt_comprada ASC";
$result = $conexao->query($sql);
?>
<body>
<table id="gerente" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Codigo do produto</th>
                <th>Nome</th>
                <th>Data</th>
                <th>Valor da venda</th>
                <th>Quantidade Comprada</th>
            </tr>
        </thead>
        <tbody>
        <?php
                    while($user_data = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>".$user_data['codigo_produto']."</td>";
                        echo "<td>".$user_data['nome']."</td>";
                        echo "<td>".$user_data['data_venda']."</td>";
                        echo "<td>".$user_data['valor_venda']."</td>";
                        echo "<td>".$user_data['qnt_comprada']."</td>";
                        echo "</tr>";
                    }
            ?>
        </tbody>
     
    </table>
<script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="../js/dt.js"></script>
    
</body>
</html>