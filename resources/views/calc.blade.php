@extends('app')

@section('title', 'Calculadora')

@section('css')
    @include('_partials.dark')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        a {
            text-decoration: none;
            color: white;
        }

        body {
            background: #33333305;
        }

        main {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .calc,
        .calcResul {
            margin-top: 2rem;
            background: #fff;
            border: 1px solid #dddbdbff;
            width: 85%;
            border-radius: 15px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 1rem 2rem;
        }

        .calc {
            align-items: center;

        }

        .header {
            display: flex;
            gap: 1rem;
            flex-direction: column;
            text-align: center;
            padding: 1rem;
        }

        .header h1 {
            color: #4CAF50;
        }

        hr {
            width: 95%;
            border-color: #4CAF50;
        }

        .body {
            padding: 1rem 0;
            width: 40%;
        }

        input,
        select {
            width: 100%;
            padding: 0.4rem;
            margin: 1rem 0;
            height: 40px;
            border-radius: 10px;
            background: #D1C1C120;
            border: 1px solid #00000030;
        }

        input {
            padding: 1rem;
        }

        option {
            background: #D1C1C150;
            border: 1px solid #00000030;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: 1px solid #00000030;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            transition: 0.4s;
            padding: 0.4rem;
        }

        input[type="submit"]:hover {
            background-color: #00000015;
            color: #4CAF50;
        }

        .resul {
            display: flex;
            align-items: center;
            justify-content: space-around;
        }

        .calcResul h3 {
            padding-bottom: 1rem;
            color: #4CAF50;
            text-align: center;
            padding-left: 25px;
        }

        .imc,
        .calorias,
        .agua {
            display: flex;
            flex-direction: column;
            gap: 0.3rem;
            text-align: center;
        }

        .valores {
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

        .ti{
            text-align: center;
            color: #4CAF50;
            margin-top: 3em;
            margin-bottom: 3em;
        }

        @media screen and (max-width: 870px) {
            .body {
                width: 100%;
            }

            .resul {
                flex-direction: column;
                gap: 2rem;
            }

            h3,
            h4 {
                font-size: 14px;
            }

            .header h1 {
                font-size: 20px;
            }
        }
    </style>
@endsection

@section('content')
    <div class="calc">
        <div class="header">
            <h1>Calculadora Nutricional</h1>
            <p>Calcule suas necessidades de calorias, águas e índice corporal</p>
        </div>
        <hr />
        <form class="body" method="POST" action="{{ route('calc.calcular') }}">
            @csrf
            <h3>Peso (kg):</h3>
            <input type="number" name="peso" placeholder="Ex: 65" min="1" max="400" required>

            <h3>Gênero:</h3>
            <select id="genero">
                <option name="feminino" id="feminino">Feminino</option>
                <option name="masculino" id="masculino">Masculino</option>
            </select>

            <h3>Altura (cm):</h3>
            <input type="number" name="altura" placeholder="Ex: 180" min="1" max="999" required>

            <h3>Idade:</h3>
            <input type="number" name="idade" placeholder="Ex: 25" min="1" max="99" required>
            <br />
            <input type="submit" value="Calcular">
        </form>


    </div>
    <h3 class="ti">Seus Resultado</h3>
    @if(isset($historico) && $historico->count() > 0)
    @foreach($historico as $resultado)
        <div class="calcResul">
            <div class="resul">
                <div class="imc">
                    <h4>Índice de Massa Corporal (IMC)</h4>
                    <h4>
                        <span class="valores">{{ number_format($resultado->imc, 1) }}</span>
                    </h4> 
                </div>
                <div class="calorias">
                    <h4>Caloria Recomendada por Dia</h4>
                    <h4 class="valores">{{ round($resultado->calorias) }} kcal</h4>
                </div>
                <div class="agua">
                    <h4>Água Recomendada por Dia</h4>
                    <h4 class="valores">{{ round( $resultado->agua) }} ml</h4>
                </div>
            </div>
        </div>
        @endforeach    
    @endif
<script>
    const icon = document.getElementById("iconTema");

    // Carrega o tema salvo
    if (localStorage.getItem("theme") === "dark") {
        document.body.classList.add("dark");
        icon.textContent = "clear_day"; // muda para sol
    } else {
        icon.textContent = "bedtime"; // lua
    }

    function alternarTema() {
        document.body.classList.toggle("dark");

        if (document.body.classList.contains("dark")) {
            localStorage.setItem("theme", "dark");
            icon.textContent = "clear_day"; // sol
        } else {
            localStorage.setItem("theme", "light");
            icon.textContent = "bedtime"; // lua
        }
    }
</script>


@endsection
