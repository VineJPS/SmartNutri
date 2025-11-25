<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <script src="https://unpkg.com/@phosphor-icons/web" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    @include('_partials.dark')

    <style>
        /*Header*/
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #E6DCDC;
        }

        header {
            padding: 1.5vh;
            width: 100%;
            height: 350px;
            background: #4CAF50;
            color: #fff;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
        }

        #seta {
            font-size: 25px;
            margin-top: 25px;
        }

        .dadosUsuario {
            width: 100%;
            height: 180px;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 50px
        }

        h2 {
            font-size: 30px;
        }

        h3 {
            font-size: 20px;
        }

        .IMGperfil {
            border-radius: 50%;
            width: 125px;
            height: 125px;
            border: 1px solid #fff;
            margin-bottom: 20px;
        }

        .infos {
            margin-top: 25px;
            display: flex;
            gap: 10em
        }

        .campoInfor {
            font-size: 1.5em;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .tituloCampoInfor {
            font-size: 25px;

        }

        .subtituloCampoInfor {
            font-size: 20px;
            font-weight: 300;
        }


        /*Main*/
        main {
            background: #E6DCDC;
            padding: 5em;
            width: 100%;
            height: 450px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            width: 700px;
            height: 400px;
            background: #fff;
            border-radius: 20px;
            padding: 1em;
        }

        .card-header {
            width: 100%;
            height: 40px;
            border-bottom: 2px solid green;
            display: flex;
            gap: 1em;
            align-items: center;
            margin-bottom: 20px;
        }

        #usericon {
            font-size: 30px;
            color: #4CAF50;
        }

        .titulo-card {
            color: #4CAF50;
            font-size: 20px;
        }

        .card-linha {
            display: flex;
            justify-content: space-between;
            height: 50px;
        }

        .card-linha1 {
            color: #757575;
        }

        .btn-area {
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .btn {
            width: 250px;
            height: 50px;
            background: #fff;
            border: 2px solid #4CAF50;
            color: #4CAF50;
            margin-top: 25px;
        }

        /*Footer*/
        footer {
            color: red;
            display: flex;
            width: 100%;
            height: 100px;
            justify-content: center;
            align-items: center;
            gap: 1em;
            padding: 3em;
        }

        #iconLogout {
            font-size: 20px;
        }

        .logout:hover {
            transform: scale(1.1);
        }

        .logout {
            color: red;
            cursor: pointer;
            transition: 0.4s;
        }

        .btn {
            cursor: pointer;
            transition: 0.4s;
        }

        .btn:hover {
            background: #4CAF50;
            color: white;
        }

        .butao {
            width: 250px;
            height: 50px;
            background: #fff;
            border: 2px solid #4CAF50;
            color: #4CAF50;
            margin-top: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }

        /*Responsivo*/
        /*header */
        @media screen and (max-width: 600px) {
            .infos {
                gap: 3em
            }

        }

        .seta {
            color: white;
            text-decoration: none;
            transition: 0.4s;
        }

        #seta:hover {
            transform: scale(1.1);
        }

        form {
            display: flex;
        }

        form button {
            border: none;
            background: transparent;
            display: flex;
            flex-direction: row;
            column-gap: .7em;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <a href="{{ route('index') }}" class="seta">
                <i class="ph ph-arrow-left" id='seta'></i>
            </a>
            <div class="dadosUsuario">
                <div class="img">
                    <img class="IMGperfil"
                        src="https://marketplace.canva.com/FaoS8/MAErepFaoS8/1/tl/canva-person-icon-MAErepFaoS8.png"
                        alt="">
                </div>
                <h2>{{ isset($usuario->name) ? $usuario->name : '' }}</h2>
                <h3>{{ isset($usuario->email) ? $usuario->email : '' }}</h3>

                <div class="infos">
                    <div class="campoInfor">
                        <h2 class='tituloCampoInfor'>{{ isset($historico->peso) ? $historico->peso : 0 }}</h2>
                        <h3 class='subtituloCampoInfor'>Peso</h3>
                    </div>
                    <div class="campoInfor">
                        <h2 class='tituloCampoInfor'>{{ isset($historico->altura) ? $historico->altura : 0 }}</h2>
                        <h3 class='subtituloCampoInfor'>Altura</h3>
                    </div>
                    <div class="campoInfor">
                        <h2 class='tituloCampoInfor'>{{ isset($historico->imc) ? $historico->imc : 0 }}</h2>
                        <h3 class='subtituloCampoInfor'>IMC</h3>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <div class="card">
                <div class="card-header">
                    <i class="ph ph-user-circle" id="usericon"></i>
                    <p class="titulo-card"> Informações Pessoais</p>
                </div>
                <div class="card-dados">
                    <div class="card-linha">
                        <p class="card-linha1">Nome Completo</p>
                        <p class="card-linha2">{{ isset($usuario->name) ? $usuario->name : '' }}</p>
                    </div>
                    <div class="card-linha">
                        <p class="card-linha1">E-mail</p>
                        <p class="card-linha2">{{ isset($usuario->email) ? $usuario->email : '' }}</p>
                    </div>
                    <div class="card-linha">
                        <p class="card-linha1">Data de Nascimento</p>
                        <p class="card-linha2">{{ isset($usuario->dataNasc) ? $usuario->dataNasc : '' }}</p>
                    </div>
                    <div class="card-linha">
                        <p class="card-linha1">Genêro</p>
                        <p class="card-linha2">{{ isset($usuario->genero) ? $usuario->genero : '' }}</p>
                    </div>

                    <div class="btn-area">
                        <a class="butao" href="{{ route('editarDados') }}">Editar Informações</a>

                    </div>
                </div>
            </div>
        </main>
        <footer>

            <form action="{{ route('logout') }}" method="get" style="background: transparent;">
                @csrf
                <button type="submit" class="logout">
                    <i id="iconLogout" class="ph ph-sign-out"></i>
                    <h3>Sair da Conta</h3>
                </button>
            </form>

        </footer>
    </div>
</body>

<script>
    const icon = document.getElementById("iconTema");

    // Carrega o tema salvo
    if (localStorage.getItem("theme") === "dark") {
        document.body.classList.add("dark");
        icon.textContent = "clear_day"; // muda para sol
    } else {
        icon.textContent = "bedtime"; // lua
    }

    function alternarTema() {
        document.body.classList.toggle("dark");

        if (document.body.classList.contains("dark")) {
            localStorage.setItem("theme", "dark");
            icon.textContent = "clear_day"; // sol
        } else {
            localStorage.setItem("theme", "light");
            icon.textContent = "bedtime"; // lua
        }
    }
</script>

</html>