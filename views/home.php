
<!-- <h1 style="text-align:center">Bem vindos a Dog Cursos</h1> -->
<?php

require_once 'app/config/config.php';
require_once 'app/modules/hg-api.php';

$hg = new HG_API(HG_API_KEY);
//$dolar = $hg->dolar_quotation();

$cotacao_moedas = $hg->quotation_moedas();
//var_dump($cotacao_moedas);

$cotacao_bolsas = $hg->quotation_bolsas();
//var_dump($cotacao_bolsas);

if ($hg->is_error() == false){
    foreach ($cotacao_moedas as $k => $v) {
        $moeda[$k] = $v;
        if (@$v['variation'] < 0) $variation[$k] = 'danger';
        else $variation[$k] = 'info';
    }  
    foreach ($cotacao_bolsas as $k => $v) {
        $bolsa[$k] = $v;
        if (@$v['variation'] < 0) $variation[$k] = 'danger';
        else $variation[$k] = 'info';
    }   
}

?>

<div class="container">
    <div class="row">
        <div class="col-sm badge badge-secondary">
            <p>Cotação <?php echo $moeda['USD']['name']; ?></p>
            <?php if ($hg->is_error() == false): ?>
                <p>USD <span class="badge badge-pill badge-<?php echo($variation['USD']); ?>"><?php echo $moeda['USD']['buy']; ?></span></p>
            <?php else: ?>
                <p>USD <span class="badge badge-pill badge-danger">Serviços Indisponível</span></p>
            <?php endif; ?>
        </div>
        <div class="col-sm badge badge-secondary">
            <p>Cotação <?php echo $moeda['EUR']['name']; ?></p>
            <?php if ($hg->is_error() == false): ?>
                <p>EUR <span class="badge badge-pill badge-<?php echo($variation['EUR']); ?>"><?php echo $moeda['EUR']['buy']; ?></span></p>
            <?php else: ?>
                <p>EUR <span class="badge badge-pill badge-danger">Serviços Indisponível</span></p>
            <?php endif; ?>
        </div>
        <div class="col-sm badge badge-secondary">
            <p>Cotação <?php echo $moeda['GBP']['name']; ?></p>
            <?php if ($hg->is_error() == false): ?>
                <p>GBP <span class="badge badge-pill badge-<?php echo($variation['GBP']); ?>"><?php echo $moeda['GBP']['buy']; ?></span></p>
            <?php else: ?>
                <p>GBP <span class="badge badge-pill badge-danger">Serviços Indisponível</span></p>
            <?php endif; ?>
        </div>
        <div class="col-sm badge badge-secondary">
            <p>Cotação <?php echo $moeda['ARS']['name']; ?></p>
            <?php if ($hg->is_error() == false): ?>
                <p>ARS <span class="badge badge-pill badge-<?php echo($variation['ARS']); ?>"><?php echo $moeda['ARS']['buy']; ?></span></p>
            <?php else: ?>
                <p>ARS <span class="badge badge-pill badge-danger">Serviços Indisponível</span></p>
            <?php endif; ?>
        </div>
        <div class="col-sm badge badge-secondary">
            <p>Bolsa <?php echo $bolsa['IBOVESPA']['name']; ?></p>
            <?php if ($hg->is_error() == false): ?>
                <p>IBOVESPA <span class="badge badge-pill badge-<?php echo($variation['IBOVESPA']); ?>"><?php echo $bolsa['IBOVESPA']['points']; ?></span></p>
            <?php else: ?>
                <p>IBOVESPA <span class="badge badge-pill badge-danger">Serviços Indisponível</span></p>
            <?php endif; ?>
        </div>
        <div class="col-sm badge badge-secondary">
            <p>Bolsa <?php echo $bolsa['NASDAQ']['name']; ?></p>
            <?php if ($hg->is_error() == false): ?>
                <p>NASDAQ <span class="badge badge-pill badge-<?php echo($variation['NASDAQ']); ?>"><?php echo $bolsa['NASDAQ']['points']; ?></span></p>
            <?php else: ?>
                <p>NASDAQ <span class="badge badge-pill badge-danger">Serviços Indisponível</span></p>
            <?php endif; ?>
        </div>
    </div>
</div>
<br><br>

<form method="post" action="login.php">

    <label class="badge badge-secondary">Usuário</label>
    <input type="text" name="usuario" placeholder="Nome do Usuário" class="form-control">
    <br>

    <label class="badge badge-secondary">Senha</label>
    <input type="password" name="senha" placeholder="Digite a Senha" class="form-control">
    <br>

    <input type="submit" value="Entrar" class="btn btn-success">
</form>
<br>

<?php if(isset($_GET['erro'])){ ?>
    <div class="alert alert-danger" role="alert">
        Usuário e/ou senha inválida!
    </div>
<?php } ?>