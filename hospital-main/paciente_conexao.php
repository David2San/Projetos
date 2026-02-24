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

function inserirPaciente($nome, $nascimento, $email, $senha, $CPF, $telefone, $RG, $endereco, $filiacao, $estado_civil, $doenca_cronica)
{
	$banco = abrirBanco();
	$sql = "INSERT INTO paciente(nome, 
																														nascimento, 
																														email, 
																														senha, 
																														CPF, 
																														telefone, 
																														RG, 
																														endereco, 
																														filiacao, 
																														estado_civil, 
																														doenca_cronica) VALUES ('{$nome}',
																																																						'{$nascimento}',
																																																						'{$email}',
																																																						'{$senha}',
																																																						'{$CPF}',
																																																						'{$telefone}',
																																																						'{$RG}',
																																																						'{$endereco}',
																																																						'{$filiacao}',
																																																						'{$estado_civil}',
																																																						'{$doenca_cronica}')";
	$banco->query($sql);
	$banco->close();
	voltarIndex();
}

// Função responsável editar uma pessoa no meu banco de dados

function alterarPaciente()
{
	$banco = abrirBanco();
	session_start();
	$sql = "UPDATE paciente SET nome='{$_POST["nome"]}',
																													nascimento='{$_POST["nascimento"]}',
																													email='{$_POST["email"]}',
																													senha='{$_POST["senha"]}',
																													CPF='{$_POST["CPF"]}',
																													telefone='{$_POST["telefone"]}',
																													RG='{$_POST["RG"]}',
																													endereco='{$_POST["endereco"]}',
																													filiacao='{$_POST["filiacao"]}',
																													estado_civil='{$_POST["estado_civil"]}',
																													doenca_cronica='{$_POST["doenca_cronica"]}' 
																													WHERE id_pacientte ='{$_POST["id_paciente"]}'";
	$banco->query($sql);
	$banco->close();
	voltarIndex();
}

// Função responsável excluir uma pessoa no meu banco de dados

function excluirPaciente()
{
	$banco = abrirBanco();
	$sql = "DELETE FROM paciente WHERE id_paciente='{$_POST["id_paciente"]}'";
	$banco->query($sql);
	$banco->close();
	voltarIndex();
}

// Após inserir uma nova pessoa, retorna para a página principal

function voltarIndex()
{
	header("Location:principal.php?msg=Cadastrado");
}
