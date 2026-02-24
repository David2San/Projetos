<?php

// Responsável por criar uma conexão com meu banco

function abrirBanco()
{
	$host = "localhost";
	$usuario = "root";
	$senha = "";
	$bd = "";
	$conexao = new mysqli($host, $usuario, $senha, $bd);
	return $conexao;
}

// Função responsável inseir uma pessoa no meu banco de dados

function inserirConsulta($date, $especialidade)
{
	$banco = abrirBanco();
	$sql = "INSERT INTO consulta(data, especialidade) VALUES ('{$date}','{$especialidade}')";
	$banco->query($sql);
	$banco->close();
	voltarIndex();
}

// Função responsável editar uma pessoa no meu banco de dados

function alterarConsulta()
{
	$banco = abrirBanco();
	session_start();
	$sql = "UPDATE consulta SET data='{$_POST["date"]}', especialidade='{$_POST["especialidade"]}', WHERE id_profissional ='{$_POST["id_profissional"]}'";
	$banco->query($sql);
	$banco->close();
	voltarIndex();
}

// Função responsável excluir uma pessoa no meu banco de dados

function excluirConsulta()
{
	$banco = abrirBanco();
	$sql = "DELETE FROM consulta WHERE id_profissional='{$_POST["id_profissional"]}'";
	$banco->query($sql);
	$banco->close();
	voltarIndex();
}

// Após inserir uma nova pessoa, retorna para a página principal

function voltarIndex()
{
	header("Location:principal.php?msg=Cadastrado");
}
