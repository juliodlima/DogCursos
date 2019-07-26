<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$db = "aula_php";

$conexao = mysqli_connect($servidor, $usuario, $senha, $db);

$query = "SELECT * FROM cursos";
$consulta_cursos = mysqli_query($conexao, $query);

$query = "SELECT * FROM alunos";
$consulta_alunos = mysqli_query($conexao, $query);

$query = "SELECT ac.id_aluno_curso, a.nome_aluno, c.nome_curso 
            FROM alunos a, cursos c, alunos_cursos ac
            WHERE ac.id_aluno = a.id_aluno
            AND ac.id_curso = c.id_curso";
$consulta_matriculas = mysqli_query($conexao, $query);