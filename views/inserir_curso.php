<?php if(!isset($_GET['editar'])){ ?>

<h1>Inserir Novo Curso</h1>
<form method="post" action="processa_curso.php">
    <br>
    <label class="badge badge-secondary">Nome Curso:</label><br>
    <input class="form-control" type="text" name="nome_curso" placeholder="Insira o Nome do Curso">
    <br><br>
    <label class="badge badge-secondary">Carga Horária:</label><br>
    <input class="form-control"  type="text" name="carga_horaria" placeholder="Insira a Carga Horária">
    <br><br>
    <input class="btn btn-success" type="submit" value="Inserir Curso">
</form>

<?php } else { ?>
    <?php while($linha = mysqli_fetch_array($consulta_cursos)){ ?>
        <?php if($linha['id_curso'] == $_GET['editar']){ ?>
        <h1>Editar Curso</h1>
        <form method="post" action="edita_curso.php">
            <input type="hidden" name="id_curso" value="<?php echo $linha['id_curso']; ?>">
            <br>
            <label class="badge badge-secondary">Nome Curso:</label><br>
            <input class="form-control"  type="text" name="nome_curso" placeholder="Insira o Nome do Curso" value="<?php echo $linha['nome_curso']; ?>">
            <br><br>
            <label class="badge badge-secondary">Carga Horária:</label><br>
            <input class="form-control"  type="text" name="carga_horaria" placeholder="Insira a Carga Horária" value="<?php echo $linha['carga_horaria']; ?>">
            <br><br>
            <input class="btn btn-success" type="submit" value="Editar Curso">
        </form>
        <?php } ?>
    <?php } ?>
<?php } ?>
