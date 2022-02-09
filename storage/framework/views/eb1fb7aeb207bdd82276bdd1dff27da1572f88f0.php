<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Contato</title>
</head>
<body>
    <h1>Mensagem de contato</h1>
    <p>Nome : <?php echo e($details['name']); ?></p>
    <p>Email : <?php echo e($details['email']); ?></p>
    <p>Mensagem : <?php echo e($details['mensagem']); ?></p>
</body>
</html><?php /**PATH C:\Users\Thiago\rachaki\resources\views/emails/ContactMail.blade.php ENDPATH**/ ?>