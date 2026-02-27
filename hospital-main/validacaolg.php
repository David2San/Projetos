<?php

// Responsavel por criar uma conexão com meu banco

function abrirBanco () {
    $conexao = new mysqli("localhost", "root", "root", "agenda");

    return $conexao;
}

// Função Responsavel por inserir uma pessoa no meu banco de dados

function inserirPessoa($id_login, $id_usuario, $usuario, $senha) {
    $banco = abrirBanco();
    $sql = "INSERT INTO pessoa($id_login, $id_usuario, $usuario, $senha)
    VALUES ('{$id_login}','{$id_usuario}','{$usuario}','{$senha}')";
    $banco->query($sql);
    $banco->close();
    voltarIndex();
}

// Após Inserir Uma nova pessoa, retorna a pagina principal

function voltarIndex() {
    header("Location:principal.php?msg=Cadastro");
}

?>