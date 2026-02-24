<?php

//Chamei meu crud de inserção, alterar, selecionar e excluir

include("consulta_conexao.php");

//1º: pego os valores via post

$date = $_POST["date"];
$especialidade = $_POST["especialidade"];

//2º: Valido se estão ok

if ($date == "") {
    $erro = "Campo date vazio";
    header("Location:consulta_tela.php?erro=$erro");
}
if ($especialidade == "") {
    $erro = "Campo especialidade vazio";
    header("Location:consulta_tela.php?erro=$erro");
}

//3º: realizo a ação no crud

inserirConsulta($date, $especialidade);
