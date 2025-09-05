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

    .texto{
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      padding: 4rem;
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
  </style>
</head>
<body>
@extends('_partials/main')

@section('conteudo')
  <main>
    <div class="texto">
      <h1>SmartNutri</h1>
      <p>
        Acompanhe sua alimentação, calcule suas necessidades nutricionais e mantenha um histórico completo de seus hábitos alimentares.
      </p>
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

      <a class="card">
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
      
      <a class="card">
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

      <div class="card" style="opacity: 0%;"></div>

    </div>
  </main>
</body>
</html>
@endsection