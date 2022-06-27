<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produtos</title>
    <link rel="icon" href="../_images/logo.png">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css">
    <script src="https://kit.fontawesome.com/8411fef42f.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
</head>
<?php
include ("../db/conexao.php");
include ("../db/functions.php");
$sql = "SELECT * FROM produtos ORDER BY codigo_produto DESC";
$result = $conexao->query($sql);
?>
<body>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@cadastrar">Cadastrar produto</button>
<table id="gerente" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Codigo do produto</th>
                <th>Nome</th>
                <th>Fornecedor</th>
                <th>Valor venda</th>
                <th>Valor de compra</th>
                <th>Estoque</th>
                <th>Data</th>
                <th>Editar</th>
                <th>Apagar</th>
            </tr>
            <tbody>
            <?php
                    while($row = $result->fetch_all(MYSQLI_ASSOC)):
                        foreach ($row as $value) :?>
                         <tr>
                                    <td><?php echo $value['codigo_produto']; ?></td>
                                    <td><?php echo $value['nome']; ?></td>
                                    <td><?php echo $value['fornecedor']; ?></td>
                                    <td><?php echo "R$ " . number_format(floatval(str_replace(",", ".", $value['custo_produto'])), 2, ',', ''); ?> </td>
                                    <td><?php echo "R$ " . number_format(floatval(str_replace(",", ".", $value['valor_venda'])), 2, ',', ''); ?></td>
                                    <td><?php echo $value['estoque']; ?></td>
                                    <td><?php echo $value['data_venda']; ?></td>
                                    <td>
                                        <button data-toggle="modal" data-target="#editModal" data-nome="<?php echo $value['nome']; ?>" data-fornecedor="<?php echo $value['fornecedor']; ?>" data-custoproduto="<?php echo number_format(floatval(str_replace(",", ".", $value['custo_produto'])), 2, ',', ''); ?>" data-valorvenda="<?php echo number_format(floatval(str_replace(",", ".", $value['valor_venda'])), 2, ',', ''); ?>" data-estoque="<?php echo $value['estoque']; ?>" data-id="<?php echo $value['codigo_produto'];  ?>" class="btn btn-info">
                                            EDITAR
                                        </button>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger" href="?r=delete&id=<?php echo $value['codigo_produto']?>">APAGAR</a>
                                    </td>
                                </tr>
                    <?php endforeach; 
                    endwhile;?>
            </tbody>
        </thead>
    </table>
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="cadModalLabel">Editar Produto</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="?r=update">
                                <div class="form-group">
                                        <label for="message-text" class="col-form-label">ID</label>
                                        <input type="text" class="form-control id" id="id" name="id" readonlys required>
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Nome: </label>
                                        <input type="text" class="form-control nome" id="nome" name="nome" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Fornecedor:</label>
                                        <input type="text" class="form-control fornecedor" id="fornecedor" name="fornecedor" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Custo do Produto:</label>
                                        <input type="text" class="form-control custoProduto" id="custoProduto" name="custoProduto" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Valor de venda:</label>
                                        <input type="text" class="form-control valorVenda" id="valorVenda" name="valorVenda" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Estoque:</label>
                                        <input type="text" class="form-control estoque" id="Estoque" name="estoque" required>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Fechar">
                                        <input type="submit" class="btn btn-primary" value="Enviar">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Cadastrar produto</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="?r=add">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Nome:</label>
                                        <input type="text" class="form-control" id="nome" name="nome" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Fornecedor:</label>
                                        <input type="text" class="form-control" id="fornecedor" name="fornecedor" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Custo do Produto:</label>
                                        <input type="text" class="form-control" id="custoProduto" name="custoProduto" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Valor de venda:</label>
                                        <input type="text" class="form-control" id="valorVenda" name="valorVenda" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Estoque:</label>
                                        <input type="text" class="form-control" id="Estoque" name="estoque" required>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Fechar">
                                        <input type="submit" class="btn btn-primary" value="Enviar">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php

    if(!empty($_GET)){
    switch ($_GET['r']) {
        case 'add':
            if (!empty($_POST['nome'])) {

                if (cadastrarProdutos($_POST)) { ?>

                    <script language='javascript'>
                        swal.fire({
                            icon: "success",
                            text: "Feito com Sucesso!",
                            type: "success"
                        }).then(okay => {
                            if (okay) {
                                window.location.href = "cadastrar.php";
                            }
                        });
                    </script>
                <?php } else { ?>
                    <script language='javascript'>
                        swal.fire({
                            icon: "error",
                            text: "Ops! Ouve um erro.",
                            type: "success"
                        }).then(okay => {
                            if (okay) {
                                window.location.href = "cadastrar.php";
                            }
                        });
                    </script>
                <?php } 
            }
            break;

        case 'update':
            if (!empty($_POST['nome'])) {
                if (editarProdutos($_POST)) { ?>
                
                    <script language='javascript'>
                        swal.fire({
                            icon: "success",
                            text: "Feito com Sucesso!",
                            type: "success"
                        }).then(okay => {
                            if (okay) {
                                window.location.href = "cadastrar.php";
                            }
                        });
                    </script>
                <?php } else { ?>
                    <script language='javascript'>
                        swal.fire({
                            icon: "error",
                            text: "Ops! Ouve um erro.",
                            type: "success"
                        }).then(okay => {
                            if (okay) {
                                window.location.href = "cadastrar.php";
                            }
                        });
                    </script>
            <?php }
            }
            
            break;
            case'delete':
            if (!empty($_GET['id'])) {

                if (apagarProduto($_GET['id'])) { 
                    ?>
                    <script language='javascript'>
                        swal.fire({
                            icon: "success",
                            text: "Feito com Sucesso!",
                            type: "success"
                        }).then(okay => {
                            if (okay) {
                                window.location.href = "cadastrar.php";
                            }
                        });
                    </script>
            <?php }
            }
            /* code.. */
            break;
            default:
            break;
            
    }
    }
    ?>
            </body>

            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
            <script src="https://code.jquery.com/jquery-3.5.1.js"></script> 
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
            <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
            <script src="../js/dt.js"></script> 
            <script language="javascript">
        $('#editModal').on('show.bs.modal', function(event) {
            console.log("cheguei")
            var button = $(event.relatedTarget) // Button that triggered the modal
            var nome = button.data('nome')
            var fornecedor = button.data('fornecedor')
            var custoProduto = button.data('custoproduto')
            var valorVenda = button.data('valorvenda')
            var estoque = button.data('estoque')
            var id = button.data('id')
            console.log(nome)
            // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-body .nome').val(nome)
            modal.find('.modal-body .fornecedor').val(fornecedor)
            modal.find('.modal-body .custoProduto').val(custoProduto)
            modal.find('.modal-body .valorVenda').val(valorVenda)
            modal.find('.modal-body .estoque').val(estoque)
            modal.find('.modal-body .id').val(id)
        })
    </script>
</html>