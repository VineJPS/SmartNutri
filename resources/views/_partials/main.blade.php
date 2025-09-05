
<header>
    <h1><a href="{{ route('index') }}">SmartNutri</a></h1>

    <div class="perfil-1">
        <a href="{{ route('login') }}"><button>Login</button></a>
        <a href="{{ route('cadastro') }}" class="cadastro"><button>Cadastre-se</button></a>
    </div>
</header>

@yield('conteudo')

<footer>
    <h1>SmartNutri</h1>
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

    .perfil-1{
      display: flex;
      gap: 1rem;
      align-items: center;
    }
    .perfil-1 button{
      background: transparent;
      color: #4CAF50;
      border: 3px solid #4CAF50;
      border-radius: 200px;
      width: auto;
      padding: 0 1.5rem;
      height: 50px;
      font-size: 16px;
      font-weight: 500;
      display: flex;
      align-items: center;
      cursor: pointer;
      transition: 0.4s;
    }
    .perfil-1 button:hover{
      color: #FFFFFF;
      background: #4CAF50;
      transform: scale(1.1);
    }
    .cadastro button{
      background: #4CAF50;
      color: #FFFFFF;
    }
    .cadastro button:hover{
      background: #FFF;
      color: #4CAF50;
      transform: scale(1.1);
    }

    footer{
        margin-top: 2rem;
      width: 100%;
      background: #333333;
      padding: 2rem;
      color: white;
      text-align: center;
    }


        @media screen and (min-height: 800px){
            footer{
                position: absolute;
                bottom: 0;
                left: 0;
            }
        }
        @media screen and (max-width: 750px){
      .perfil-1 button{
        padding: .5rem;
      }
    }
</style>