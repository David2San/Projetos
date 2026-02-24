<?php

//Chamei meu crud de inserção, alterar, selecionar e excluir

include("CRUDProfissao.php");

//1º: pego os valores via post

$nome = $_POST["nome"];
$nivel = $_POST["nivel"];

//2º: Valido se estão ok

if ($nome == "") {
    $erro = "Campo nome vazio";
    header("Location:profissao_tela.php?erro=$erro");
}
if ($nivel == "") {
    $erro = "Campo nivel vazio";
    header("Location:profissao_tela.php?erro=$erro");
}

//3º: realizo a ação no crud

inserirProfissao($nome, $nivel);
