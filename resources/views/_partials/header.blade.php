
<header>
    <a href="{{ route('index') }}" class="seta">
        <span class="material-symbols-outlined">
            arrow_back
        </span>
    </a>

    <h1><a href="{{ route('index') }}">SmartNutri</a></h1>

    <a href="{{ route('perfil') }}" class="perfil">
        <span class="material-symbols-outlined">
            person
        </span>
    </a>
</header>

@yield('conteudo')

<footer>
    <h1><span class="smart">Smart<span class="nutri">Nutri</span></span></h1>
</footer>

<style>
    html,body{
        height: 100%;
    }
    header{
      background: #FFF;
      box-shadow: 0px 1px 10px #00000025;
      display: flex;
      padding: .7rem;
      justify-content: space-between;
      align-items: center;
      color: #4CAF50;
    }
    header a{
        color: #4CAF50;
    }

    .perfil{
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
    .perfil:hover{
        transform: scale(1.3);
    }


    footer{
        margin-top: 2rem;
      width: 100%;
      background: #333333;
      padding: 2rem;
      color: white;
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

        .seta{
            color: #4CAF50;
            transition: 0.4s;
        }
        .seta:hover{
        transform: scale(1.3);
        }
</style>