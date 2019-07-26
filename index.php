<?php
# Iniciar Sessão
session_start();

# Base de Dados
include 'db.php';

# Cabeçalho
include 'header.php';

# Conteúdo da Página
if(isset($_SESSION['login'])) {
    if(isset($_GET['pagina'])) {
        $pagina = $_GET['pagina'];
    }
    else {
        $pagina = 'cursos';
    }
} else {
    $pagina = 'home';
}

switch ($pagina) {
    case 'cursos': include 'views/cursos.php'; break;
    case 'alunos': include 'views/alunos.php'; break;
    case 'matriculas': include 'views/matriculas.php'; break;
    case 'inserir_curso': include 'views/inserir_curso.php'; break;
    case 'inserir_aluno': include 'views/inserir_aluno.php'; break;
    case 'inserir_matricula': include 'views/inserir_matricula.php'; break;

    default: include 'views/home.php'; break;
}

# Rodapé
include 'footer.php';


