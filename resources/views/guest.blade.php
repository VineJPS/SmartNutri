<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

  <title>SmartNutri</title>
  <style>
    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    a{
      text-decoration: none;
      color: white;
    }
    body{
      background: #33333305;
    }

    html,body{
        height: 100%;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .texto{
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      padding: 2rem;
      margin-top: 1rem;
    }

    .texto h1{
      color: #4CAF50;
    }

    .texto p{
      margin-top: 1rem;
      max-width: 600px;
      text-align: center;
    }

    .cards{
      display: flex;
      justify-content: space-around;
      align-items: center;
      flex-wrap: wrap;
      width: 100%;
    }
    .card{
      background: #FFFFFF;
      border: 1px solid #dddbdbff;
      width: 45%;
      height: 180px;
      margin-top: 2rem;
      padding: 2rem;
      border-radius: 10px;
      cursor: pointer;
      color: black;
      transition: 0.4s;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }
    .card:hover{
      transform: scale(1.05);
    }
    .caloria:hover{
      transform: scale(1.01);
    }
    .card-titulo{
      color: #4CAF50;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.3rem;
    }
    .icon span{
      font-size: 28px;
    }
    .icon{
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .nome-card h1{
      font-size: 24px;
    }
    .corpo-card p{
      text-align: center;
      margin-top: 1rem;
      font-size: 18px;
      color: #00000099;
    }

    @media screen and (max-width: 750px){
      .card{
        width: 75%;
        height: auto;
      }
      .perfil-1 button{
        padding: .5rem;
      }
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


    header .perfil:hover{
        transform: scale(1.3);
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

    .caloria>.card-titulo{
      justify-content: start;
    }
    .consul{
      display: flex;
      justify-content: space-between;
    }
    .linha{
      background: #E0E0E0;
      width: 100%;
      height: 18px;
      border-radius: 15px;
      margin-bottom: 1rem;
    }
    .progresso{
      background: green;
      height: 18px;
      width: 30%;
      border-radius: 15px;
    }
  </style>
</head>
<body>

  <header>
      <h1><a href="{{ route('index') }}">SmartNutri</a></h1>

      <div class="perfil-1">
          <a href="{{ route('login') }}"><button>Login</button></a>
          <a href="{{ route('cadastro') }}" class="cadastro"><button>Cadastre-se</button></a>
      </div>
  </header>

<main>
    <div class="texto">
      <h1>SmartNutri</h1>
    </div>

    <div class="cards">

      <a class="card" href="{{ route('alimentos') }}">
        <div class="card-titulo">
          <div class="icon">
          <span class="material-symbols-outlined">
            restaurant
          </span>
          </div>
          <div class="nome-card">
            <h1>Registro de Alimentos</h1>
          </div>
        </div>
        <div class="corpo-card">
          <p>
            Adicione os alimentos consumidos durante o dia com data e hora específicas.
          </p>
        </div>
      </a>

      <a class="card" href="{{ route('historico') }}">
        <div class="card-titulo">
          <div class="icon">
            <span class="material-symbols-outlined">history</span>
          </div>
          <div class="nome-card">
            <h1>Histórico Completo</h1>
          </div>
        </div>
        <div class="corpo-card">
          <p>
            Visualize seu histórico alimentar de dias atuais e anteriores.
          </p>
        </div>
      </a>
      
      <a class="card" href="{{ route('calc') }}">
        <div class="card-titulo">
          <div class="icon">
            <span class="material-symbols-outlined">
              calculate
            </span>
          </div>
          <div class="nome-card">
            <h1>Calculadora Nutricional</h1>
          </div>
        </div>
        <div class="corpo-card">
          <p>
            Calcule suas necessidades de calorias e água baseadas em seu perfil.
          </p>
        </div>
      </a>

      <div class="card" style="cursor: default; opacity: 0;">

      </div>

    </div>
  </main>

  <footer>
    <h1>SmartNutri</h1>
  </footer> 

</body>
</html>