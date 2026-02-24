<?php

//Chamei meu crud de inserção, alterar, selecionar e excluir

include("CRUDEspecialidade.php");

//1º: pego os valores via post

$nome = $_POST["nome"];

//2º: Valido se estão ok

if ($nome == "") {
    $erro = "Campo nome vazio";
    header("Location:especialidade_tela.php?erro=$erro");
}

//3º: realizo a ação no crud

inserirEspecialidade($nome);
