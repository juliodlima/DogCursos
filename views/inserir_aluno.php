<?php if(!isset($_GET['editar'])){ ?>

<h1>Inserir Novo Aluno</h1>
<form method="post" action="processa_aluno.php">
    <br>
    <label class="badge badge-secondary">Nome Aluno:</label><br>
    <input class="form-control" type="text" name="nome_aluno" placeholder="Insira o Nome do Aluno">
    <br><br>
    <label class="badge badge-secondary">Data de Nascimento:</label><br>
    <input class="form-control" type="text" name="data_nascimento" placeholder="Insira a Data de Nascimento">
    <br><br>
    <input class="btn btn-success" type="submit" value="Inserir Aluno">
</form>

<?php } else { ?>
    <?php while($linha = mysqli_fetch_array($consulta_alunos)){ ?>
        <?php if($linha['id_aluno'] == $_GET['editar']){ ?>
        <h1>Editar Aluno</h1>
        <form method="post" action="edita_aluno.php">
            <input type="hidden" name="id_aluno" value="<?php echo $linha['id_aluno']; ?>">
            <br>
            <label class="badge badge-secondary">Nome Aluno:</label><br>
            <input class="form-control" type="text" name="nome_aluno" placeholder="Insira o Nome do Aluno" value="<?php echo $linha['nome_aluno']; ?>">
            <br><br>
            <label class="badge badge-secondary">Data de Nascimento:</label><br>
            <input class="form-control" type="text" name="data_nascimento" placeholder="Insira a Data de Nascimento" value="<?php echo $linha['data_nascimento']; ?>">
            <br><br>
            <input class="btn btn-success" type="submit" value="Editar Aluno">
        </form>
        <?php } ?>
    <?php } ?>
<?php } ?>