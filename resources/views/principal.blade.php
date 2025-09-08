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
      height: 160px;
      margin-top: 2rem;
      padding: 2rem;
      border-radius: 10px;
      cursor: pointer;
      color: black;
      transition: 0.4s;
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

      <a href="{{ route('perfil') }}" class="perfil">
        <span class="material-symbols-outlined">
            person
        </span>
      </a>
  </header>

  <main>
    <div class="texto">
      <h1>SmartNutri</h1>
    </div>

    <div class="cards">

      <div class="card caloria" style="width: 95%; height: auto; cursor: default;">
        <div class="card-titulo">
          <div class="icon">
            <span class="material-symbols-outlined">
              target
            </span>
          </div>
          <div class="nome-card">
            <h1 style="font-size: 20px;">Sua Meta de Calorias</h1>
          </div>
        </div>
        <div class="corpo-card" style="margin: 10px 0; border-radius: 20px;background: #C8E6C9; height: 160px; display: flex; align-items: center; justify-content: center; flex-direction: column;">
          <p style="font-size: 20px;">
            Meta diária
          </p>
          <h2 style="font-size: 40px; color: #388E3C;">2000 Kcal</h2>
        </div>
        <div class="linha">
          <div class="progresso"></div>
        </div>
        <div class="consul">
          <p>Consumido: 750kcal</p>
          <p>Restante: 1250kcal</p>
        </div>
      </div>

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

      <div class="card">
        <div class="card-titulo">
          <div class="icon">
            <span class="material-symbols-outlined">
              target
            </span>
          </div>
          <div class="nome-card">
            <h1>Meta de Calorias</h1>
          </div>
        </div>
        <div class="corpo-card">
          <p>
            Altera sua meta de calorias.
          </p>
        </div>
      </div>

    </div>
  </main>

  <footer>
    <h1>SmartNutri</h1>
  </footer> 

</body>
</html>
