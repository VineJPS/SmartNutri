<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <script src="https://unpkg.com/@phosphor-icons/web" defer></script>

    <style>
        /*Header*/
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
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
        .card-header{
            width: 100%;
            height: 40px;
            border-bottom:2px solid green;
            display: flex;
            gap: 1em;
            align-items: center;
            margin-bottom: 20px;
        }
        #usericon{
            font-size: 30px;
            color: #4CAF50;
        }
        .titulo-card{
            color: #4CAF50;
            font-size: 20px;
        }
        .card-linha{
            display: flex;
            justify-content: space-between;
            height: 50px;
        }
        .card-linha1{
            color: #757575;
        }
        .btn-area{
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .btn{
            width: 250px;
            height: 50px;
            background: #fff;
            border: 2px solid #4CAF50;
            color: #4CAF50;
            margin-top: 25px;
        }

        /*Footer*/
        footer{
            color: red;
            display: flex;
            width: 100%;
            height: 100px;
            justify-content: center;
            align-items: center;
            gap: 1em;
            padding: 3em;
        }
        #iconLogout{
            font-size: 20px;
        }
        /*Responsivo*/
        /*header */
        @media screen and (max-width: 600px) {
            .infos {
                gap: 3em
            }

        }
        .seta{
            color: white;
            text-decoration: none
        }

        form{
            display: flex;
        }

        form button{
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
                        src="data:image/jpeg;base64,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"
                        alt="">
                </div>
                <h2>Ace Rosquinha</h2>
                <h3>ace.rosquinha@sifudeu.com</h3>

                <div class="infos">
                    <div class="campoInfor">
                        <h2 class='tituloCampoInfor'>63KG</h2>
                        <h3 class='subtituloCampoInfor'>Peso</h3>
                    </div>
                    <div class="campoInfor">
                        <h2 class='tituloCampoInfor'>7 palmos</h2>
                        <h3 class='subtituloCampoInfor'>Altura</h3>
                    </div>
                    <div class="campoInfor">
                        <h2 class='tituloCampoInfor'>24,9</h2>
                        <h3 class='subtituloCampoInfor'>IMC</h2>
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
                        <p class="card-linha2">Ace Rosquinha</p>
                    </div>
                    <div class="card-linha">
                        <p class="card-linha1">E-mail</p>
                        <p class="card-linha2">ace.rosquinha@sifudeu.com</p>
                    </div>
                    <div class="card-linha">
                        <p class="card-linha1">Data de Nascimento</p>
                        <p class="card-linha2">01/01/2024</p>
                    </div>
                    <div class="card-linha">
                        <p class="card-linha1">Genêro</p>
                        <p class="card-linha2">Rosquinha</p>
                    </div>

                    <div class="btn-area">
                        <input id="btn" class="btn" type="submit" value="Editar Informações">
                    </div>
                </div>
            </div>
        </main>
        <footer>

            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit">
                    <i id="iconLogout" class="ph ph-sign-out"></i>
                    <h3 class="logout">Sair da Conta</h3>
                </button>
            </form>
            
        </footer>
    </div>
</body>

</html>