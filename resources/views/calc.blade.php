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

    main{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .calc,.calcResul{
        margin-top: 2rem;
        background: #fff;
        border: 1px solid #dddbdbff;
        width: 85%;
        border-radius: 15px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 1rem;
    }
    .calc{
        align-items: center;

    }
    .header{
        display: flex;
        gap: 1rem;
        flex-direction: column;
        text-align: center;
        padding: 1rem;
    }
    .header h1{
        color: #4CAF50;
    }

    hr{
        width: 95%;
        border-color: #4CAF50;
    }

    .body{
        padding: 1rem 0;
        width: 40%;
    }
    input,select{
        width: 100%;
        padding: 0.4rem;
        margin: 1rem 0;
        height: 40px;
        border-radius: 10px;
        background: #D1C1C120;
        border: 1px solid #00000030;
    }
    option{
        background: #D1C1C150;
        border: 1px solid #00000030;
    }

    input[type="submit"]{
        background-color: #4CAF50;
        color: #fff;
        border: 1px solid #00000030;
        font-weight: bold;
        font-size: 16px;
        cursor: pointer;
        transition: 0.4s;
    }
    input[type="submit"]:hover{
        background-color: #00000015;
        color: #4CAF50;
    }

    .resul{
        display: flex;
        align-items: center;
        justify-content: space-evenly;
    }
    .calcResul h2{
        padding-bottom: 1rem; 
        color: #4CAF50;
        text-align: center;

    }

    .imc,.calorias{
        display: flex;
        flex-direction: column;
        gap: 0.3rem;
    }

    .valores{
        color: #4CAF50;
    }


    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }


    input[type=number] {
    -moz-appearance: textfield;
    }

    @media screen and (max-width: 681px) {
        .body{
            width: 100%;
        }
    }


  </style>
</head>
<body>
@extends('_partials/header')

@section('conteudo')
  <main>
    <div class="calc">
        <div class="header">
            <h1>Calculadora Nutricional</h1>
            <p>Calcule suas necessidades de calorias, águas e índice corporal</p>
        </div>
            <hr/>
        <form class="body">
            <h2>Peso (kg):</h2>
            <input type="number" placeholder="Ex: 65" min="1" max="3">
            
            <h2>Gênero:</h2>
            <select id="genero">
                <option name="feminino" id="feminino">Feminino</option>
                <option name="masculino" id="masculino">Masculino</option>
            </select>

            <h2>Altura (cm):</h2>
            <input type="number" placeholder="Ex: 180" min="1" max="999">

            <h2>Idade:</h2>
            <input type="number" placeholder="Ex: 25" min="1" max="99">
<br/>
            <input type="submit" value="Calcular">
        </form>

        
    </div>

    <div class="calcResul">
        <h2>Seus Resultado</h2>
        <div class="resul">
            <div class="imc">
                <h4>Índice de Massa Corporal (IMC)</h4>
                <h4><span class="valores">24.6</span> Classificação: Peso Normal</h4>
            </div>
            <div class="calorias">
                <h4>Caloria Recomendada por Dia</h4>
                <h4 class="valores">4500</h4>
            </div>
        </div>
    </div>
  </main>
</body>
</html>
@endsection