<div>
<header>
        <nav id="navbar">
            <div class="container"></div>
            <h1><a href="/">RachAki</a></h1>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/sobre">Sobre</a></li>
                <li><a href="/contato">Contato</a></li>
                <li><a class="pagina-atual" href="/registro">Histórico</a></li>
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
        <table id="tableClient" class="records">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Esporte</th>
                    <th>Quantidade</th>
                    <th>Data</th>
                    <th>Local</th>
                    <th>Horário</th>
                    <th>Link</th>
                </tr>
            </thead>
            <tbody>
            @foreach($historicos as $historico)
            <tr>
                <td>{{ $historico->name }}</td>
                <td>{{ $historico->esporte }}</td>
                <td>{{ $historico->quant }}</td>
                <td>{{ $historico->data }}</td>
                <td>{{ $historico->local }}</td>
                <td>{{ $historico->hora }}</td>
                <td>{{ $historico->link }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
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

    <footer id="rodape">
        <p>RachAki &copy;2021-todos os direitos reservados</p>
    </footer>
</div>
