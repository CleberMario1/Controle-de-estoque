<?php

function matriculadata(){

    include "./db/conexao.php";
    $sql = "";
    $query = $mysqli->query($sql);
    $dados = $query->fetch_array();

    return $dados;  
}

function cadastrarProdutos($dados){
    include 'conexao.php';
    $nome = $dados['nome'];
    $fornecedor = $dados['fornecedor'];
    $custoProduto = $dados['custoProduto'];
    $valorVenda = $dados['valorVenda'];
    $estoque = $dados['estoque'];
    $sql = "INSERT INTO produtos(nome, fornecedor,custo_produto, valor_venda, estoque )values('$nome','$fornecedor','$custoProduto', '$valorVenda', '$estoque')";
    
    $query = $conexao->query($sql);
    return $query;
}



function editarProdutos($dados)
{
    include 'conexao.php';

    $nome = $dados['nome'];
    $fornecedor = $dados['fornecedor'];
    $custoProduto = $dados['custoProduto'];
    $valorVenda = $dados['valorVenda'];
    $estoque = $dados['estoque'];
    $id = $dados['id'];
    $sql = "UPDATE produtos SET nome = '$nome', fornecedor = '$fornecedor', custo_produto = '$custoProduto', valor_venda = '$valorVenda', estoque = '$estoque' WHERE codigo_produto= '$id'";
    $query = $conexao->query($sql);
    return $query;
}

function apagarProduto($id){
    include 'conexao.php';
    $sql = "DELETE FROM produtos WHERE codigo_produto = '$id'";
    $query = $conexao->query($sql);
    return $query;
}
?>