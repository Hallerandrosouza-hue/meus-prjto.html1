<?php
/*
    Conceitos de PHP:
    1. O PHP roda no servidor. O navegador envia dados e o servidor processa.
    2. O método POST envia os dados no corpo da requisição.
    3. A função filter_input ajuda a ler e sanitizar dados com segurança.
    4. htmlspecialchars evita que conteúdo com tags HTML seja interpretado.
*/

date_default_timezone_set('America/Fortaleza');

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_SPECIAL_CHARS);

$erros = [];

if (!$nome || mb_strlen($nome) < 2) {
    $erros[] = "Nome inválido.";
}

if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $erros[] = "E-mail inválido.";
}

if (!$mensagem || mb_strlen($mensagem) < 5) {
    $erros[] = "Mensagem muito curta.";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resultado do Formulário</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<main class="conteudo">
    <section class="secao">
        <h1>Resultado do envio</h1>
        <?php if (!empty($erros)) : ?>
            <p><strong>Ocorreram problemas:</strong></p>
            <ul>
                <?php foreach ($erros as $e): ?>
                    <li><?php echo htmlspecialchars($e, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php endforeach; ?>
                <li><a href="index.html">Voltar e corrigir</a></li>
            </ul>
        <?php else : ?>
            <ul>
                <li>Nome: <?php echo htmlspecialchars($nome, ENT_QUOTES, 'UTF-8'); ?></li>
                <li>E-mail: <?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?></li>
                <li>Mensagem: <?php echo nl2br(htmlspecialchars($mensagem, ENT_QUOTES, 'UTF-8')); ?></li>
            </ul>
            <p>Esta é apenas uma simulação. Em um site real, os dados seriam salvos em arquivo ou banco de dados.</p>
            <a href="index.html">Voltar à página inicial</a>
        <?php endif; ?>
    </section>
</main>
</body>
</html>
