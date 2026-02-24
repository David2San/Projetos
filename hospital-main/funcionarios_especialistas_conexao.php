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

function inserirFuncionariosEspecialistas($informacao_pessoal, $horario_consulta, $ponto_servico)
{
	$banco = abrirBanco();
	$sql = "INSERT INTO funcionarios_especialistas(informacao_pessoal, horario_consulta, ponto_servico)
	VALUES ('{$informacao_pessoal}','{$horario_consulta}','{$ponto_servico}')";
	$banco->query($sql);
	$banco->close();
	voltarIndex();
}

// Função responsável editar uma pessoa no meu banco de dados

function alterarFuncionariosEspecialistas()
{
	$banco = abrirBanco();
	session_start();
	$sql = "UPDATE funcionarios_especialistas SET informacao_pessoal='{$_POST["informacao_pessoal"]}', horario_consulta='{$_POST["horario_consulta"]}', ponto_servico='{$_POST["ponto_servico"]}', 
	WHERE id_funcionario_especialista ='{$_POST["id_funcionario_especialista"]}'";
	$banco->query($sql);
	$banco->close();
	voltarIndex();
}

// Função responsável excluir uma pessoa no meu banco de dados

function excluirFuncionariosEspecialistas()
{
	$banco = abrirBanco();
	$sql = "DELETE FROM funcionarios_especialistas WHERE id_funcionario_especialista='{$_POST["id_funcionario_especialista"]}'";
	$banco->query($sql);
	$banco->close();
	voltarIndex();
}

// Após inserir uma nova pessoa, retorna para a página principal

function voltarIndex()
{
	header("Location:principal.php?msg=Cadastrado");
}
