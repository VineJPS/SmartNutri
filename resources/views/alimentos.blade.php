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
    header{
      background: #FFF;
      box-shadow: 0px 1px 10px #00000025;
      display: flex;
      padding: .7rem;
      justify-content: space-between;
      align-items: center;
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
    }
    .cadastro button{
      background: #4CAF50;
      color: #FFFFFF;
    }

    main{
        margin: auto;
    }

    .card{
        background-color: white;
        border-radius: 20px;
        height: 200px;
        width: 200px;
    }

    footer{
      margin-top: 2rem;
      background: #333333;
      padding: 4rem;
      color: white;
      text-align: center;
    }
    footer p{
      margin-top: 1rem;
      font-size: 18px;
    }

    @media screen and (max-width: 681px){
      .card{
        width: 75%;
      }
      .perfil-1 button{
        padding: .5rem;
      }
    }
  </style>
</head>
<body>
  <header>
    <h1>
      SmartNutri
    </h1>

    <div class="perfil-1">
      <a href="{{ route('login') }}"><button>Login</button></a>
      <a href="#" class="cadastro"><button>Cadastre-se</button></a>
    </div>
  </header>

  <main>
  
        <div class="card">
            <div class="card-header">
                <h2>

                </h2>
            </div>

            <div class="card-body">
                
            </div>

            <div class="card-footer">

            </div>
        </div>
    
  </main>

  <footer>
    <h1>SmartNutri</h1>
    <p>Acompanhe sua alimentação, calcule suas necessidades nutricionais e mantenha um histórico completo de seus hábitos alimentares.</p>
  </footer>
</body>
</html>