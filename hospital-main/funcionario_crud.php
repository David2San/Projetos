<?php

// Responsável por criar uma conexão com meu banco
function abrirBanco()
{
	$conexao = new mysqli("localhost", "root", "root", "agenda");
	return $conexao;
}

// Função responsável inseir uma pessoa no meu banco de dados
function inserirFuncionario($nome, $nascimento, $email, $senha, $cpf, $rg, $telefone, $endereco, $filiacao, $estado_civil, $especialidade)
{
	$banco = abrirBanco();
	$sql = "INSERT INTO funcionario (nome, 
																																		nascimento, 
																																		email, 
																																		senha, 
																																		cpf, 
																																		rg, 
																																		telefone, 
																																		endereco, 
																																		filiaçao, 
																																		estado civil, 
																																		especialidade) VALUES ('{$nome}',
																																																									'{$nascimento}',
																																																									'{$email}',
																																																									'{$senha}',
																																																									'{$cpf}',
																																																									'{$rg}',
																																																									'{$telefone}',
																																																									'{$endereco}',
																																																									'{$filiacao}',
																																																									'{$estado_civil}',
																																																									'{$especialidade}')";
	$banco->query($sql);
	$banco->close();
	voltarIndex();
}
function alterarFuncionario()
{
	$banco = abrirBanco();
	$sql = "UPDATE funcionario SET nome='{$_POST["nome"]}',
																																nascimento='{$_POST["nascimento"]}',
																																endereco='{$_POST["endereco"]}',
																																telefone='{$_POST["telefone"]}' 
																																WHERE id='{$_POST["id"]}'";
	$banco->query($sql);
	$banco->close();
	voltarIndex();
}


function excluirFuncionario()
{
	$banco = abrirBanco();
	$sql = "DELETE FROM funcionario WHERE id='{$_POST["id"]}'";
	$banco->query($sql);
	$banco->close();
	voltarIndex();
}

function voltarIndex()
{
	header("Location:principal.php?msg=Cadastrado");
}
function selectAllFuncionario()
{
	$banco = abrirBanco();

	$sql = "SELECT * FROM funcionario ORDER BY nome";
	$resultado = $banco->query($sql);


	$banco->close();

	while ($row = mysqli_fetch_array($resultado)) {
		$grupo[] = $row;
	}
	return $grupo;
}
