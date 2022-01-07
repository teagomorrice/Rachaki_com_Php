<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    $html = \Livewire\Livewire::mount('registro')->html();
} elseif ($_instance->childHasBeenRendered('7XoLXPU')) {
    $componentId = $_instance->getRenderedChildComponentId('7XoLXPU');
    $componentTag = $_instance->getRenderedChildComponentTagName('7XoLXPU');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('7XoLXPU');
} else {
    $response = \Livewire\Livewire::mount('registro');
    $html = $response->html();
    $_instance->logRenderedChild('7XoLXPU', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

    <?php echo \Livewire\Livewire::scripts(); ?>

    <script src="main.js" defer></script>
</body>

</html><?php /**PATH C:\Users\Thiago\rachaki\resources\views/registro.blade.php ENDPATH**/ ?>