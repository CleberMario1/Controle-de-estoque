<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de vendas</title>
    <link rel="icon" href="../_images/logo.png">
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
include ("../db/conexao.php");
$sql = "SELECT * FROM produtos ORDER BY data_venda ASC";
$result = $conexao->query($sql);
?>
<table id="gerente" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Codigo do produto</th>
                <th>Data</th>
                <th>Valor venda</th>
                <th>Quantidade comprada</th>
                <th>Estoque</th>
                <th>Fornecedor</th>
            </tr>
            <tbody>
            <?php
                    while($user_data = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>".$user_data['codigo_produto']."</td>";
                        echo "<td>".$user_data['data_venda']."</td>";
                        echo "<td>".$user_data['valor_venda']."</td>";
                        echo "<td>".$user_data['qnt_comprada']."</td>";
                        echo "<td>".$user_data['estoque']."</td>";
                        echo "<td>".$user_data['fornecedor']."</td>";
                        echo "</tr>";
                    }
            ?>
            </tbody>
        </thead>
    </table>

<script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="../js/dt.js"></script>
 <script language="javascript">
        $('#editModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var nome = button.data('nome')
            var fornecedor = button.data('fornecedor')
            var custoProduto = button.data('custoproduto')
            var valorVenda = button.data('valorvenda')
            var estoque = button.data('estoque')
            console.log(valorVenda)
            // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-body .nome').val(nome)
            modal.find('.modal-body .fornecedor').val(fornecedor)
            modal.find('.modal-body .custoProduto').val(custoProduto)
            modal.find('.modal-body .valorVenda').val(valorVenda)
            modal.find('.modal-body .estoque').val(estoque)
        })
    </script>
    
</body>
</html>