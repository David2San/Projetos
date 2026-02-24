<?php

// Verifica se o POST existe antes de inserir uma nova profissão

if (isset($_POST["acao"])) {
	if ($_POST["acao"] == "inserir") {
		inserirAdministradores($cadastro_vacina_disponivel, $cadastro_marcaçao_consulta, $cadastro_especialista_dia, $suporte_online, $cadastro_consulta, $cadastro_paciente, $cadastro_funcionario, $cadastro_especialista);
	}
	if ($_POST["acao"] == "alterar") {
		alterarAdministradores();
	}
	if ($_POST["acao"] == "excluir") {
		excluirAdministradores();
	}
}

// Responsável por criar uma conexão com meu banco

function abrirBanco()
{
	$conexao = new mysqli("localhost", "root", "root", "agenda");
	return $conexao;
}

// Função responsável inseir uma profissão no meu banco de dados

function inserirAdministradores(
	$cadastro_vacina_disponivel,
	$cadastro_marcaçao_consulta,
	$cadastro_especialista_dia,
	$suporte_online,
	$cadastro_consulta,
	$cadastro_paciente,
	$cadastro_funcionario,
	$cadastro_especialista
) {
	$banco = abrirBanco();
	$sql = "INSERT INTO adminitradores(cadastro_vacina_disponivel, 
	cadastro_marcaçao_consulta, 
	cadastro_especialista_dia, 
	suporte_online, 
	cadastro_consulta, 
	cadastro_paciente, 
	cadastro_funcionario, 
	cadastro_especialista) VALUES ('{$cadastro_vacina_disponivel}', 
	'{$cadastro_marcaçao_consulta}', 
	'{$cadastro_especialista_dia}', 
	'{$suporte_online}', 
	'{$cadastro_consulta}', 
	'{$cadastro_paciente}', 
	'{$cadastro_funcionario}', 
	'{$cadastro_especialista}', )";
	$banco->query($sql);
	$banco->close();
	voltarIndex();
}

// Função responsável editar uma profissão no meu banco de dados

function alterarAdministradores()
{
	$banco = abrirBanco();
	$sql = "UPDATE adminitradores SET cadastro_vacina_disponivel='{$_POST["cadastro_vacina_disponivel"]}', 
	cadastro_marcaçao_consulta='{$_POST["cadastro_marcaçao_consulta"]}', 
	cadastro_especialista_dia='{$_POST["cadastro_especialista_dia"]}', 
	suporte_online='{$_POST["suporte_online"]}', 
	cadastro_consulta='{$_POST["cadastro_consulta"]}', 
	cadastro_paciente='{$_POST["cadastro_paciente"]}', 
	cadastro_funcionario='{$_POST["cadastro_funcionario"]}', 
	cadastro_especialista='{$_POST["cadastro_especialista"]}' 
	WHERE id='{$_POST["id"]}'";
	$banco->query($sql);
	$banco->close();
	voltarIndex();
}

// Função responsável excluir uma profissão no meu banco de dados

function excluirAdministradores()
{
	$banco = abrirBanco();
	$sql = "DELETE FROM adminitradores WHERE id='{$_POST["id"]}'";
	$banco->query($sql);
	$banco->close();
	voltarIndex();
}

// Após inserir uma nova pessoa, retorna para a página principal

function voltarIndex()
{
	header("Location:principal.php?msg=Cadastrado");
}
