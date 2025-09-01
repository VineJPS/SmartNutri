<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <title>Login</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        html{
            background: #E0F7FA;
        }
        main{

            display: flex;
            justify-content: center;
            align-items:center
        }
        .card-login{
            background: #FFFFFF;
            border-radius: 15px;
            width: 490px;
            max-height: 700px;
        }
        .header{
            background: #4CAF50;
            color: white;
            border-top-right-radius: 15px;
            border-top-left-radius: 15px;
            text-align: center;
            padding: 2rem;
        }
        .header p{
            margin-top: 0.5rem;
        }
        .header h1{
            font-size: 30px;
        }
        form{
            padding: 1rem;
        }
        form h3{
            margin: .5rem 0;
        }
        label{
            border: 1px solid #00000030;
            padding: .1rem 0.7rem;
            border-right: none;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        input[type="email"],input[type="password"],input[type="text"]{
            border: 1px solid #00000030;
            border-left: none;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
        }
        .campos{
            display: flex;
            width: 100%;
        }
        .campos input{
            width: 100%;
            padding: .7rem;
        }
        .button{
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
        }
        input[type="submit"]{
            background: #4CAF50;
            color: white;
            border: none;
            width: 90%;
            margin-top: 1rem;
            padding: 1rem;
            border-radius: 10px;
        }
        .text{
            text-align: center;
            padding: 1rem;
        }
        .text a{
            text-decoration: none;
        }
        @media screen and (max-width:510px ){
            .card-login{
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <main>
        <div class="card-login">
            <div class="header">
                <h1>SmartNutri</h1>
                <p>Cuidando da sua saúde</p>
            </div>

            <form action="">
                <h3>Nome Completo</h3>
                <div class="campos">
                    <label for="nome">
                        <span class="material-symbols-outlined">
                            mail
                        </span>
                    </label>
                    <input type="text" name="nome" id="nome" placeholder="Digite seu nome completo...">
                </div>

                <h3>E-mail</h3>
                <div class="campos">
                    <label for="email">
                        <span class="material-symbols-outlined">
                            mail
                        </span>
                    </label>
                    <input type="email" name="email" id="email" placeholder="Digite seu e-mail...">
                </div>

                <h3>Confirmar e-mail</h3>
                <div class="campos">
                    <label for="confEmail">
                        <span class="material-symbols-outlined">
                            mail
                        </span>
                    </label>
                    <input type="email" name="confEmail" id="confEmail" placeholder="Confirme seu e-mail...">
                </div>

                <h3>Senha</h3>
                <div class="campos">
                    <label for="senha">
                        <span class="material-symbols-outlined">
                            lock
                        </span>
                    </label>
                    <input type="password" name="senha" id="senha" placeholder="Digite sua senha...">
                </div>

                <h3>Confirmar senha</h3>
                <div class="campos">
                    <label for="confSenha">
                        <span class="material-symbols-outlined">
                            lock
                        </span>
                    </label>
                    <input type="password" name="confSenha" id="confSenha" placeholder="Confirme sua senha...">
                </div>

                <div class="button">
                    <input type="submit" value="Cadastre-se">
                </div>

                <div class="text">
                    <p>Já tem uma conta? <a href="{{ route('login') }}">Faça login agora!</a></p>
                </div>
            </form>
        </div>
    </main>
</body>
</html>