<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produtos</title>
    <link rel="icon" href="../_images/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produtos</title>
    <link rel="icon" href="../_images/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
include ("../db/conexao.php");
$sql = "SELECT * FROM produtos ORDER BY data_venda ASC";
$result = $conexao->query($sql);
?>
<form class="form-control" method="post" action="?r=add">
          <div class="row">
            <div class="col-8">
              <label class="col-form-label">Produto: </label>
              <select class="form-control" id="produto" name="produto" onchange="pegarValor(this.selectedIndex)">
                <?php foreach ($result as $value) : ?>
                  <option id="produto-selecionado" value="<?php echo $value['nome']; ?>"><?php echo $value['nome']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-2">
              <label class=" col-form-label">Quantidade: </label>
              <input class="form-control" type="number" name="quantidade" id="quantidade" min="1" value="1">
            </div>
            <div class="col-2">
              <label class=" col-form-label">Valor: </label>
              <select class="form-control" id="valor" name="valor" disabled onchange="pegarValor(this.value)">
                <?php foreach ($result as $value) : ?>
                  <option class="form-control" type="number" name="valor" id="valor-selecionado" value="<?php echo $value['valor_venda'] ?>"><?php echo $value['valor_venda']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col">

              <label class="col-form-label"></label>
              <button type="button" class="btn btn-primary form-control" onclick="adicionarProduto()">Adicionar</button>
            </div>
          </div>
        </form>
<table id="gerente" class="display" style="width:100%">
          <thead>
            <tr>
              <th>Produto</th>
              <th>Quantidade</th>
              <th>Valor</th>
              <th>Valor Total</th>
            </tr>
          </thead>
          <tbody id="tbody-venda">
          </tbody>
          <div class="d-flex m-4">
          <h3 class="m-1">O valor total é: </h3>
          <input type="text" disabled id="valor-total">
        </div>
        </table>
<script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="../js/dt.js"></script>
<script language="javascript">
    const pedido = new Map();
    pedidos = []

    function adicionarProduto() {
      var prodList = document.getElementById('produto')
      var prod = prodList.options[prodList.selectedIndex].value

      var quant = document.getElementById('quantidade').value

      var valueList = document.getElementById('valor')
      var value = valueList.options[valueList.selectedIndex].value

      pedidos.push({
        'produto': prod,
        'quantidade': quant,
        'valor': value
      })

      // return JSON.stringify(pedidos);
      construirTabela(pedidos)
    }

    function pegarValor(value) {
      var valueList = document.getElementById('valor')
      var valor = valueList.options[value].value
      document.getElementById('valor').value = valor
    }

    function construirTabela(data) {

      var table = document.getElementById('tbody-venda')
      table.innerHTML = ""

      var total = 0.0;
      for (var i = 0; 0 < data.length; i++) {
        total += data[i].quantidade * parseFloat(data[i].valor);
        var row =
          `<tr>
            <td>${data[i].produto}</td>
            <td>${data[i].quantidade}</td> 
            <td>R$ ${data[i].valor}</td> 
            <td>R$ ${(data[i].quantidade * parseFloat(data[i].valor)).toFixed(2).replace(".", ",")}</td>
        </tr>
        `
        table.innerHTML += row

        document.getElementById('valor-total').value = "R$ " + (total).toFixed(2).replace(".", ",")
      }
      console.log('cheguri')
      console.log(total)
    }
  </script>
   <script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="../js/dt.js"></script>
    
</body>
</html>
    
</body>
</html>