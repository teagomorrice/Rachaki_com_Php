<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="descripiton" content="RachAki">
    <meta name="keywords" content="RachAki">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/main.css">
    <title>Rachaki - Fale Conosco</title>

</head>

<body>
    <header>
        <nav id="navbar">
            <div class="container"></div>
            <h1><a href="./principal.html">RachAki</a></h1>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/sobre">Sobre</a></li>
                <li><a class="pagina-atual" href="/contato">Contato</a></li>
                <li><a href="/registro">Histórico</a></li>
            </ul>
        </nav>
    </header>
    </header>
    <section id="form-contato" class=pad3-y>
        <div class="container">
            <h1 class="cabecalho-form"> <span class="texto-principal">Fale</span> Conosco</h1>
        </div>
        @if(Session::has('message_sent'))
            <div class="alert alert-sucess" role="alert">
                {{Session::get('message_sent')}}
        @endif        
            </div>
        <p>Estamos quase lá, por favor, preencha o fomrulario abaixo: </p>
        <form method="POST" action="{{route('contact.send')}}"kaua enctype="multipart/form-data">
            @csrf
            <div class="campos-form">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome">
            </div>
            <div class="campos-form">
                <label for="email">Email</label>
                <input type="text" name="email" id="email">
            </div>
            <div class="campos-form">
                <label for="mensagem">Mensagem</label>
                <textarea type="text" name="mensagem" id="mensagem"> </textarea>
            </div>
            <button type="submit">Enviar</button>
        </form>
    </section>
    <footer id=rodape>
        <p>RachAki &copy;2021-todos os direitos reservados</p>
    </footer>
</body>

</html>