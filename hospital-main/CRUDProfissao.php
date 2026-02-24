<?php

// Verifica se o POST existe antes de inserir uma nova profissão

if (isset($_POST["acao"])) {
	if ($_POST["acao"] == "inserir") {
		inserirProfissao($nome, $nivel);
	}
	if ($_POST["acao"] == "alterar") {
		alterarProfissao();
	}
	if ($_POST["acao"] == "excluir") {
		excluirProfissao();
	}
}

// Responsável por criar uma conexão com meu banco

function abrirBanco()
{
	$conexao = new mysqli("localhost", "root", "", "");
	return $conexao;
}

// Função responsável inseir uma profissão no meu banco de dados

function inserirProfissao($nome, $nivel)
{
	$banco = abrirBanco();
	$sql = "INSERT INTO profissao(nome, nivel) VALUES ('{$nome}','{$nivel}')";
	$banco->query($sql);
	$banco->close();
	voltarIndex();
}

// Função responsável editar uma profissão no meu banco de dados

function alterarProfissao()
{
	$banco = abrirBanco();
	$sql = "UPDATE profissao SET nome='{$_POST["nome"]}', nivel='{$_POST["nivel"]}' WHERE id='{$_POST["id"]}'";
	$banco->query($sql);
	$banco->close();
	voltarIndex();
}

// Função responsável excluir uma profissão no meu banco de dados

function excluirProfissao()
{
	$banco = abrirBanco();
	$sql = "DELETE FROM profissao WHERE id='{$_POST["id"]}'";
	$banco->query($sql);
	$banco->close();
	voltarIndex();
}

// Após inserir uma nova pessoa, retorna para a página principal

function voltarIndex()
{
	header("Location:principal.php?msg=Cadastrado");
}
