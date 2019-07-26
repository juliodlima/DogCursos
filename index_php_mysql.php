<?php

# Conexão com o banco de dados MySQL ******************************
$servidor = "localhost";
$usuario = "root";
$senha = "";
$database = "aula_php";

$conexao = mysqli_connect($servidor, $usuario, $senha, $database);

// if ($conexao) {
//     echo "conectado com sucesso!";
// } 
/*
# Criando tabelas usando PHP **************************************
# Tabela cursos (nome do curso, carga horaria)
$query = "CREATE TABLE CURSOS(
    id_curso int not null auto_increment,
    nome_curso varchar(255) not null,
    carga_horaria int not null,
    primary key(id_curso)
)";

$executar = mysqli_query($conexao, $query);

# Tabela alunos (nome do aluno, data de nascimento)
$query = "CREATE TABLE ALUNOS(
    id_aluno int not null auto_increment,
    nome_aluno varchar(255) not null,
    data_nascimento varchar(255),
    primary key(id_aluno)
)";

$executar = mysqli_query($conexao, $query);

# Tabela alunos_cursos (aluno, curso)
$query = "CREATE TABLE ALUNOS_CURSOS(
    id_aluno_curso int not null auto_increment,
    id_aluno int not null,
    id_curso int not null,
    primary key(id_aluno_curso)
)";

$executar = mysqli_query($conexao, $query);

# Inserir alunos **********************************
$query = "INSERT INTO ALUNOS(nome_aluno, data_nascimento) VALUES('Joao', '01-01-1991')";
$executar = mysqli_query($conexao, $query);
$query = "INSERT INTO ALUNOS(nome_aluno, data_nascimento) VALUES('Maria', '01-01-1992')";
$executar = mysqli_query($conexao, $query);

# Inserir cursos
$query = "INSERT INTO CURSOS(nome_curso, carga_horaria) VALUES('PHP e MySQL', 10)";
$executar = mysqli_query($conexao, $query);
$query = "INSERT INTO CURSOS(nome_curso, carga_horaria) VALUES('HTML, CSS e JavaScript', 12)";
$executar = mysqli_query($conexao, $query);

#Inserir alunos_cursos
$query = "INSERT INTO ALUNOS_CURSOS(id_aluno, id_curso) VALUES(1,1)";
$executar = mysqli_query($conexao, $query);
$query = "INSERT INTO ALUNOS_CURSOS(id_aluno, id_curso) VALUES(4,1)";
$executar = mysqli_query($conexao, $query);
$query = "INSERT INTO ALUNOS_CURSOS(id_aluno, id_curso) VALUES(5,2)";
$executar = mysqli_query($conexao, $query);

if(mysqli_query($conexao, "DELETE FROM ALUNOS WHERE id_aluno IN (3,6,7)")){
    echo 'Apagado com sucesso.';
}
else {
    echo 'Falha ao apagar.';
}

if(mysqli_query($conexao, "DELETE FROM CURSOS WHERE id_curso IN (3,4)")){
    echo 'Apagado com sucesso.';
}
else {
    echo 'Falha ao apagar.';
}

if(mysqli_query($conexao, "UPDATE ALUNOS SET nome_aluno = 'Joaozinho' WHERE id_aluno = 8")){
    echo 'Alterado com sucesso.';
}
else {
    echo 'Falha ao alterar.';
}
if(mysqli_query($conexao, "UPDATE ALUNOS SET nome_aluno = 'Mariazinha' WHERE id_aluno = 9")){
    echo 'Alterado com sucesso.';
}
else {
    echo 'Falha ao alterar.';
}

echo '<table border=1>
        <tr>
            <th>id_aluno</th>
            <th>Nome</th>
            <th>Data de Nascimento</th>
        </tr>';
$consulta = mysqli_query($conexao, "SELECT * FROM ALUNOS");
//print_r($consulta);
while ($linha = mysqli_fetch_array($consulta)) {
    echo '<tr><td>'.$linha['id_aluno'].'</td>';
    echo '<td>'. $linha['nome_aluno'].'</td>';
    echo '<td>'.$linha['data_nascimento'].'</td></tr>';
}
echo '</table>';
*/

$consulta = mysqli_query($conexao, "SELECT	alunos.nome_aluno, cursos.nome_curso 
    FROM alunos, cursos, alunos_cursos
    WHERE alunos_cursos.id_aluno = alunos.id_aluno
    AND alunos_cursos.id_curso = cursos.id_curso")
;
echo '<table border=1>
        <tr>
            <th>Nome do Aluno</th>
            <th>Nome do Curso</th>
        </tr>'
;
while($linha = mysqli_fetch_array($consulta)){
    echo '<tr><td>'. $linha['nome_aluno'].'</td>';
    echo '<td>'.$linha['nome_curso'].'</td></tr>';
}
echo '</table>';