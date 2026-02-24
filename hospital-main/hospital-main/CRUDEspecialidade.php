<?php

// Verifica se o POST existe antes de inserir uma nova profissão

if (isset($_POST["acao"])) {
	if ($_POST["acao"] == "inserir") {
		inserirEspecialidade($nome);
	}
	if ($_POST["acao"] == "alterar") {
		alterarEspecialidade();
	}
	if ($_POST["acao"] == "excluir") {
		excluirEspecialidade();
	}
}

// Responsável por criar uma conexão com meu banco

function abrirBanco()
{
	$conexao = new mysqli("localhost", "root", "root", "agenda");
	return $conexao;
}

// Função responsável inseir uma profissão no meu banco de dados

function inserirEspecialidade($nome)
{
	$banco = abrirBanco();
	$sql = "INSERT INTO especialidade(nome) VALUES ('{$nome}')";
	$banco->query($sql);
	$banco->close();
	voltarIndex();
}

// Função responsável editar uma profissão no meu banco de dados

function alterarEspecialidade() {
	$banco = abrirBanco();
	$sql = "UPDATE especialidade SET nome='{$_POST["nome"]}' WHERE id='{$_POST["id"]}'";
	$banco->query($sql);
	$banco->close();
	voltarIndex();
}

// Função responsável excluir uma profissão no meu banco de dados

function excluirEspecialidade() {
	$banco = abrirBanco();
	$sql = "DELETE FROM especialidade WHERE id='{$_POST["id"]}'";
	$banco->query($sql);
	$banco->close();
	voltarIndex();
}

// Após inserir uma nova pessoa, retorna para a página principal

function voltarIndex()
{
	header("Location:principal.php?msg=Cadastrado");
}
