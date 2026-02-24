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

function inserirConsultaPaciente($vacinas_disponiveis, $marcacao_consultas, $especialista_dia, $atendimento_urgente)
{
	$banco = abrirBanco();
	$sql = "INSERT INTO paciente_consulta(vacinas_disponiveis, 
																																							marcacao_consultas, 
																																							especialista_dia, 
																																							atendimento_urgente) VALUES ('{$vacinas_disponiveis}',
																																																																				'{$marcacao_consultas}',
																																																																				'{$especialista_dia}',
																																																																				'{$atendimento_urgente}')";
	$banco->query($sql);
	$banco->close();
	voltarIndex();
}

// Função responsável editar uma pessoa no meu banco de dados

function alterarConsultaPaciente()
{
	$banco = abrirBanco();
	session_start();
	$sql = "UPDATE paciente_consulta SET vacinas_disponiveis='{$_POST["vacinas_disponiveis"]}',
																																						marcacao_consultas='{$_POST["marcacao_cosnultas"]}',
																																						especialista_dia='{$_POST["especialista_dia"]}',
																																						atendimento_urgente='{$_POST["atendimento_urgente"]}', 
																																						WHERE id_consulta ='{$_POST["id_consulta"]}'";
	$banco->query($sql);
	$banco->close();
	voltarIndex();
}

// Função responsável excluir uma pessoa no meu banco de dados

function excluirConsultaPaciente()
{
	$banco = abrirBanco();
	$sql = "DELETE FROM paciente_consulta WHERE id_consulta='{$_POST["id_consulta"]}'";
	$banco->query($sql);
	$banco->close();
	voltarIndex();
}

// Após inserir uma nova pessoa, retorna para a página principal

function voltarIndex()
{
	header("Location:principal.php?msg=Cadastrado");
}
