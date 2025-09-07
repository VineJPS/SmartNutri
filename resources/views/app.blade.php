<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SmartNutri')</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <style>
        *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        a{
        text-decoration: none;
        color: white;
        }

        html,body{
            height: 100%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body{
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main{
            flex: 1;
        }

    /* Header */
        header{
            background: #FFF;
            box-shadow: 0px 1px 10px #00000025;
            display: flex;
            padding: .9rem;
            justify-content: space-between;
            align-items: center;
            color: #4CAF50;
        }

        header a{
            color: #4CAF50;
        }

        header .perfil{
            background: #4CAF50;
            width: 35px;
            height: 35px;
            border-radius: 100px;
            color: white;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: 0.4s;
        }

        header .perfil:hover{
            transform: scale(1.3);
        }

        header .seta{
            display: flex;
            color: #4CAF50;
            transition: 0.4s;
            align-content: center;
        }

        header .seta:hover{
            transform: scale(1.3);
        }

        /* footer */
        footer{
            margin-top: 2rem;
            width: 100%;
            background: #333333;
            padding: 2rem;
            color: white !important;
            text-align: center;
            transition: 0.4s;
        }

        .smart:active{
            color: orange;
        }
        
        .nutri:active{
            color: #659bffff;
        }


            @media screen and (min-height: 800px){
                footer{
                    position: absolute;
                    bottom: 0;
                    left: 0;
                }
            }
    </style>

    @yield('css')
</head>
   
<body>
    @include('_partials.header')

    <main>
        @yield('content')
    </main>

    @include('_partials.footer')
</body>
</html>