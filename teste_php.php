<?php
/*
    Primeiro teste de PHP.
    1. Se você conseguiu abrir esta página no navegador como http://localhost/aula/teste_php.php
    então o PHP está funcionando no seu servidor local.
    2. A função phpinfo exibe detalhes técnicos. Mantemos só um aviso simples aqui.
*/

date_default_timezone_set('America/Fortaleza');
$agora = date('d/m/Y H:i');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Teste do PHP</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<main class="conteudo">
    <section class="secao">
        <h1>PHP em funcionamento :)</h1>
        <p>Se você está vendo esta página renderizada, o PHP está configurado corretamente.</p>
        <p>Data e hora do servidor: <strong><?php echo $agora; ?></strong></p>
        <p><a href="index.html">Voltar à página inicial</a></p>
        <p><a href="<?php echo $_SERVER['PHP_SELF']; ?>?phpinfo=1" onclick="return false;">Exibir informações do PHP</a></p>
        <?php
        if (isset($_GET['phpinfo'])) {
            phpinfo();
        }
        ?>
    </section>
</main>
</body>
</html>
