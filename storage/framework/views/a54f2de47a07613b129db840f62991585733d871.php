<?php $__env->startSection('title', 'Termos de Uso'); ?>

<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,400;0,700;1,200;1,800&display=swap"
    rel="stylesheet">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/button.css">
    <link rel="stylesheet" href="css/records.css">
    <link rel="stylesheet" href="css/modal.css">
    <script src="js/main.js" defer></script>
    <title>Rachaki - Home</title>
</head>

<body>
    <header>
        <nav id="navbar">
            <div class="container"></div>
            <h1><a href="./principal.html">RachAki</a></h1>
            <ul>
                <li><a class="pagina-atual" href="./principal.html">Home</a></li>
                <li><a href="./sobre.html">Sobre</a></li>
                <li><a href="./contato.html">Contato</a></li>
                <li><a href="./registro.html">Histórico</a></li>
            </ul>
        </nav>
    </header>
    <div id="showcase">
        <div class="container">
            <div class=showcase-principal>
                <h1> <span class="texto-principal">RachAki</span></h1>
                <p class="text-detalhe">Localize jogos de diversos esportes na sua região e divirta-se fazendo novas
                amizades!</p>
            </div>
        </div>
    </div>
    <main>
        <button type="button" class="button blue mobile" id="cadastrarCliente">Cadastrar partida</button>
        <table id="tableClient" class="records">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Esporte</th>
                    <th>Quantidade</th>
                    <th>Data</th>
                    <th>Local</th>
                    <th>Horário</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $partidas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partida): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                <td><?php echo e($partida->name); ?></td>
                <td><?php echo e($partida->esporte); ?></td>
                <td><?php echo e($partida->quant); ?></td>
                <td><?php echo e($partida->data); ?></td>
                <td><?php echo e($partida->hora); ?></td>
                <td><?php echo e($partida->local); ?></td>
                <td>
                        <button type="button" class="button blue" onclick="location.href='<?php echo e($partida->link); ?>';" target="_blank">Entrar</button>

                        <input type="hidden" name="id" value="$partida->id">

        <div class="modal" id="modalEdit">
            <div class="modal-content">
                <header class="modal-header">
                    <h2>Editar Jogo</h2>
                    <span class="modal-close" id="modalClose">&#10006;</span>
                </header>
                <form method="post" id="form" class="modal-form" action="cadastrar">
                <?php echo csrf_field(); ?>
                    <input name="name" type="text" id="nome" data-index="new" class="modal-field" placeholder="Nome do jogo" value=<?php echo e(old($partida->name)); ?>

                    required>
                    <select name="esporte" id="esporte" class="modal-field" required>
                        <option selected disabled value="">Selecione o esporte</option>
                        <option>Futebol</option>
                        <option>Society</option>
                        <option>Futsal</option>
                        <option>Vôlei</option>
                        <option>Basquete</option>
                        <option>Corrida</option>
                        <option>Pedal</option>
                      </select>
                      <input name="quant" type="number" id="quant" class="modal-field" placeholder="Quantidade de jogadores" />
                      <input name="data" type="date" id="data" class="modal-field" placeholder="Data do jogo" required />
                      <input name="hora" type="time" id="hora" class="modal-field" placeholder="Hora do jogo" required />
                      <input name="link" type="url" id="link" class="modal-field" placeholder="Link do grupo do Whatsapp" required />
                      <input name="local" type="text" id="local" class="modal-field" placeholder="Local do jogo" required />
                      <button type="submit" class="button green">Salvar</button>
                      <button id="cancelar" class="button blue" onclick=closeModalEdit();>Cancelar</button>
                </form>
                <footer class="modal-footer">
                    
                </footer>
            </div>
        </div>
                        <form action="pegaId" method="POST">
                            <input type="hidden" name="id" value="$partida->id">
                        
                            <button type="submit" class="button green" id="edit-${index}" onclick=openModalEdit();>Editar</button>
                        </form>
                        
                        <button type="submit" class="button red" id="delete-${index}" onclick=confirm(Deseja realmente excluir a partida?)>Excluir</button>
                </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>            
            </tbody>
        </table>
        <div class="modal" id="modal">
            <div class="modal-content">
                <header class="modal-header">
                    <h2>Novo Jogo</h2>
                    <span class="modal-close" id="modalClose">&#10006;</span>
                </header>
                <form method="post" id="form" class="modal-form" action="cadastrar">
                <?php echo csrf_field(); ?>
                    <input name="name" type="text" id="nome" data-index="new" class="modal-field" placeholder="Nome do jogo"
                    required>
                    <select name="esporte" id="esporte" class="modal-field" required>
                        <option selected disabled value="">Selecione o esporte</option>
                        <option>Futebol</option>
                        <option>Society</option>
                        <option>Futsal</option>
                        <option>Vôlei</option>
                        <option>Basquete</option>
                        <option>Corrida</option>
                        <option>Pedal</option>
                      </select>
                      <input name="quant" type="number" id="quant" class="modal-field" placeholder="Quantidade de jogadores" />
                      <input name="data" type="date" id="data" class="modal-field" placeholder="Data do jogo" required />
                      <input name="hora" type="time" id="hora" class="modal-field" placeholder="Hora do jogo" required />
                      <input name="link" type="url" id="link" class="modal-field" placeholder="Link do grupo do Whatsapp" required />
                      <input name="local" type="text" id="local" class="modal-field" placeholder="Local do jogo" required />
                      <button type="submit" class="button green">Salvar</button>
                      <button id="cancelar" class="button blue" onclick=closeModal();>Cancelar</button>
                </form>
                <footer class="modal-footer">
                    
                </footer>
            </div>
        </div>
    </main>
    <section id="info-principal" class="bg-escuro">
        <div class="info-imagem"></div>
        <div class="info-conteudo">
            <h2><span>Facilidade para jogar o esporte que você tanto ama!</span></h2>
            <p>Com o RachAki, você pode encontrar jogos do esporte que você gosta próximo a você! Ou até mesmo, criar um
                jogo para que outras pessoas também possam participar!
            </p>
            <a class="btn btn-claro" href="./sobre.html">Saiba mais</a>
        </div>
    </section>

    <footer id="rodape">
        <p>RachAki &copy;2021-todos os direitos reservados</p>
    </footer>
</body>

</html><?php /**PATH C:\Users\Thiago\ppo\resources\views/index.blade.php ENDPATH**/ ?>