<div>
    <header>
        <nav id="navbar">
            <div class="container"></div>
            <h1><a href="/">RachAki</a></h1>
            <ul>
                <li><a class="pagina-atual" href="/">Home</a></li>
                <li><a href="/sobre">Sobre</a></li>
                <li><a href="/contato">Contato</a></li>
                <li><a href="/registro">Histórico</a></li>
            </ul>
        </nav>
    </header>
    <div id="showcase">
        <div class="container">
            <div class=showcase-principal>
                <h1> <span class="texto-principal">RachAki</span></h1>
                <p class="text-detalhe">Crie partidas de diversos esportes e/ou junte-se a partidas que já existem. Nunca foi tão fácil praticar esportes!</p>
            </div>
        </div>
    </div>
    <main>
        <button type="button" class="button blue mobile" id="cadastrarCliente">Criar partida</button>
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
                <td><?php echo e($partida->local); ?></td>
                <td><?php echo e($partida->hora); ?></td>
                <td>
                <button type="button" class="button blue" onclick="location.href='<?php echo e($partida->link); ?>';" target="_blank">Participar</button>
                <button type="submit" class="button green" wire:click="modalEdit(<?php echo e($partida); ?>)">Editar</button>
                <button type="submit" class="button red" wire:click="modalDelete(<?php echo e($partida->id); ?>)">Deletar</button>
                </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>            
            </tbody>
        </table>

        <div class="modal" id="modalEdit" wire:ignore>
            <div class="modal-content">
                <header class="modal-header">
                    <h2>Editar Jogo</h2>
                    <span class="modal-close" id="modalClose">&#10006;</span>
                </header>
                <form method="post" id="form" class="modal-form" wire:submit.prevent="editarPartida">
                <?php echo csrf_field(); ?>
                    <input wire:model.defer="posts.name" type="text" id="nome" data-index="new" class="modal-field" placeholder="Nome do jogo"
                    required>
                    <select wire:model.defer="posts.esporte" id="esporte" class="modal-field" required>
                        <option selected disabled value="">Selecione o esporte</option>
                        <option>Futebol</option>
                        <option>Society</option>
                        <option>Futsal</option>
                        <option>Vôlei</option>
                        <option>Basquete</option>
                        <option>Corrida</option>
                        <option>Pedal</option>
                    </select>
                    <input wire:model.defer="posts.quant" type="number" id="quant" class="modal-field" placeholder="Quantidade de jogadores" />
                    <input wire:model.defer="posts.data" type="date" id="data" class="modal-field" placeholder="Data do jogo" required />
                    <input wire:model.defer="posts.hora" type="time" id="hora" class="modal-field" placeholder="Hora do jogo" required />
                    <input wire:model.defer="posts.link" type="url" id="link" class="modal-field" placeholder="Link do grupo do Whatsapp" required />
                    <input wire:model.defer="posts.local" type="text" id="local" class="modal-field" placeholder="Local do jogo" required />
                    <button type="submit" class="button green">Salvar</button>
                    <button id="cancelar" class="button blue" onclick=closeModalEdit();>Cancelar</button>
                </form>
                <footer class="modal-footer">
                    
                </footer>
            </div>
        </div>

        <div class="modal" id="modalDelete" wire:ignore>
            <div class="modal-content">
                <header class="modal-header">
                    <h2>Deseja realmente excluir a partida?</h2>
                    <span class="modal-close" id="modalClose">&#10006;</span>
                </header>
                <button type="submit" class="button red" wire:click.prevent="deletarPartida()">Deletar</button>
                <button id="cancelar" class="button blue" onclick=closeModalDelete();>Cancelar</button>
            </div>
        </div>
    
        <div class="modal" id="modal" wire:ignore>
            <div class="modal-content">
                <header class="modal-header">
                    <h2>Novo Jogo</h2>
                    <span class="modal-close" id="modalClose">&#10006;</span>
                </header>
                <form method="post" id="form" class="modal-form" wire:submit.prevent="cadastrarPartida">
                <?php echo csrf_field(); ?>
                    <input wire:model.defer="posts.name" type="text" id="nome" data-index="new" class="modal-field" placeholder="Nome do jogo"
                    required>
                    <select wire:model.defer="posts.esporte" id="esporte" class="modal-field" required>
                        <option selected hidden value="">Selecione o esporte</option>
                        <option>Futebol</option>
                        <option>Society</option>
                        <option>Futsal</option>
                        <option>Vôlei</option>
                        <option>Basquete</option>
                        <option>Corrida</option>
                        <option>Pedal</option>
                    </select>
                    <input wire:model.defer="posts.quant" type="number" id="quant" class="modal-field" placeholder="Quantidade de jogadores" required/>
                    <input wire:model.defer="posts.data" type="date" id="data" class="modal-field" placeholder="Data do jogo" required />
                    <input wire:model.defer="posts.hora" type="time" id="hora" class="modal-field" placeholder="Hora do jogo" required />
                    <input wire:model.defer="posts.link" type="url" id="link" class="modal-field" placeholder="Link do grupo do Whatsapp" required />
                    <input wire:model.defer="posts.local" type="text" id="local" class="modal-field" placeholder="Local do jogo" required />
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
            <a class="btn btn-claro" href="/sobre">Saiba mais</a>
        </div>
    </section>
    <footer id=rodape>
        <p>RachAki &copy;2021-todos os direitos reservados</p>
    </footer>
</div>
<?php /**PATH C:\Users\Thiago\rachaki\resources\views/livewire/principal.blade.php ENDPATH**/ ?>