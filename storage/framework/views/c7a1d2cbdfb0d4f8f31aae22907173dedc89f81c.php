<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Rachaki - Home</title>
    <?php echo \Livewire\Livewire::styles(); ?>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,400;0,700;1,200;1,800&display=swap"
    rel="stylesheet">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/button.css">
    <link rel="stylesheet" href="css/records.css">
    <link rel="stylesheet" href="css/modal.css">
</head>

<body>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('principal')->html();
} elseif ($_instance->childHasBeenRendered('7yHOMP2')) {
    $componentId = $_instance->getRenderedChildComponentId('7yHOMP2');
    $componentTag = $_instance->getRenderedChildComponentTagName('7yHOMP2');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('7yHOMP2');
} else {
    $response = \Livewire\Livewire::mount('principal');
    $html = $response->html();
    $_instance->logRenderedChild('7yHOMP2', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

    <?php echo \Livewire\Livewire::scripts(); ?>

    <script src="js/main.js" defer></script>
</body>

</html><?php /**PATH C:\Users\COMPUTADOR\rachaki\resources\views/index.blade.php ENDPATH**/ ?>