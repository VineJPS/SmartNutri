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
            margin-top: 50px;
            background: #E6DCDC;
            padding: 5em;
            margin-bottom: 3rem;
            width: 100%;
            height: 450px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            width: 700px;
            height: 450px;
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

        .card-dados {
            padding: 1em;
        }

        .row {
            width: 100%;
            height: 50px;
            display: flex;
            flex-direction: column;
            gap: 5px;
            margin-bottom: 20px;
        }

        .row-butao {
            margin-top: 30px;
            display: flex;
            gap: 1rem;
            justify-content: space-between;
        }

        .butao1 {
            width: 200px;
            height: 35px;
            border-radius: 5px;
            background: #4CAF50;
            color: #fff;
            cursor: pointer;
        }

         .butaovermeio{
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 200px;
            height: 35px;
            border-radius: 5px;
            background: #E6DCDC;
            color: red;
            border: 1px solid red;
        }
        #genero{
            padding: 10px;
        }
        .input-card {
            line-height: 30px;
            padding: 0.3rem;
            border: 1px solid color: #d9d9d9;
            border-radius: 5px;
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

        @media screen and (max-width:700px ){
            .card{
                width: 90%;
            }
            main{
                padding: 0;
            }
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
                        <h2 class='tituloCampoInfor'>{{ isset($historico->peso) ? $historico->peso : '' }}</h2>
                        <h3 class='subtituloCampoInfor'>Peso</h3>
                    </div>
                    <div class="campoInfor">
                        <h2 class='tituloCampoInfor'>{{ isset($historico->altura) ? $historico->altura : '' }}</h2>
                        <h3 class='subtituloCampoInfor'>Altura</h3>
                    </div>
                    <div class="campoInfor">
                        <h2 class='tituloCampoInfor'>{{ isset($historico->imc) ? $historico->imc : '' }}</h2>
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
                <form class="card-dados" method="POST" action="{{route('editarDados')}}">
                    @csrf
                    <div class="row">
                        <p class="titulo-card-dados">Nome Completo</p>
                        <input type="text" id="name" name="name" placeholder="insira seu nome completo" class="input-card">
                    </div>
                    <div class="row">
                        <p class="titulo-card-dados">E-mail</p>
                        <input type="text" id="email" name="email" placeholder="" class="input-card">
                    </div>
                    <div class="row">
                        <p class="titulo-card-dados">Data de Nascimento</p>
                        <input type="date" id="dataNasc" name="dataNasc" placeholder="data" class="input-card">
                    </div>
                    <div class="row">
                        <p class="titulo-card-dados">Genero</p>
                        <select name="genero" id="genero">
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                        </select>
                    </div>

                    <div class="row-butao">
                        <input type="submit" id="butao" class="butao1" value="Salvar">
                        <a href="{{ route('perfil') }}" class="butaovermeio">Cancelar</a>

                    </div>
                </form>

            </div>
        </main>
    </div>
</body>

<<<<<<< HEAD
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
=======
</html>
>>>>>>> 4acfda87ee6e3813ce61114ab0cf8c5b470a5fc8
