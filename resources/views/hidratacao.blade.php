@extends('app')

@section('title', 'Meta')

@section('css')
    @include('_partials.dark')
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
    body{
        background: #33333305;
    }

    main{
        display: flex;
        align-items: center;
        flex-direction: column;
    }

    .card{
        background: #FFFFFF;
        border: 1px solid #dddbdbff;
        width: 85%;
        margin-top: 2rem;
        padding: 2rem;
        border-radius: 10px;
        color: black;
        transition: 0.4s;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .card-header,.card-body,.card-button{
        width: 100%;
    }
    .card-header h1{
        color: #4CAF50;
        padding: 1rem 0.4rem;
    }
    hr{
        border-color: #4CAF50;
        margin-bottom: 1rem;
    }
    .asterisco{
        color: red;
        margin-left: -.5rem;
    }

    .card-body{
        padding: 2rem 0;
    }

    input[type="text"]{
        width: 100%;
        height: 50px;
        border: 1px solid #00000030;
        margin: 1rem 0;
        text-align: center;
        font-size: 24px;
        border-radius: 10px;
    }

    .card-button{
        display: flex;
        justify-content: space-between;
    }
    .card-button button{
        width: 48%;
        padding: 1rem;
        cursor: pointer;
        border-radius: 10px;
        font-size: 25px;
        transition: 0.4s;
    }

    .save{
        background: #4CAF50;
        color: white;
        border: 1px solid #00000040;
    }

    .cancel{
        width: 100% !important;
        color: #F44336;
        border: 1px solid #F44336;
        background: transparent;
    }

    .save:hover{
        color: #4CAF50;
        background: white;
    }

    .cancel:hover{
        color: white;
        background: #F44336;
    }
    .button-cancel{
        width: 48%;
        transition: 0.4s;
    }

    @media screen and (max-width: 525px){
        .card-button{
            flex-direction: column;
            gap: 1rem;
        }
        .card-button button,.button-cancel{
            width: 100%;
        }
        .card-header h1{
            font-size: 24px;
        }
    }

    .buttons{
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        padding-top: 1rem;
        color: white;
    }

    .buttons .more,.buttons .less{
        background-color: #3498DB;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: .75rem;
        border-radius: 100px;
    }
    .buttons .less{
        width: 48px;
        height: 48px;
    }
    .linha{
        background: #E0E0E0;
        width: 100%;
        height: 18px;
        border-radius: 15px;
        margin-bottom: 1rem;
    }
    .progresso{
        background: #3498DB;
        height: 18px;
        border-radius: 15px;
    }
  </style>
@endsection

@section('content')

      <div class="card caloria" style="width: 85%; height: auto; cursor: default;">
        <div class="card-titulo" style="width: 100%; color: #3498DB; display: flex; align-items: center;">
          <div class="icon">
            <span class="material-symbols-outlined">
            water_drop
            </span>
          </div>
          <div class="nome-card">
            <h1 style="font-size: 20px; color: #3498DB;">Controle de Hidratação</h1>
          </div>
        </div>
        <div class="corpo-card metadiaria" style="width: 100%; margin: 10px 0; border-radius: 20px;background: #3498DB50; height: 160px; display: flex; align-items: center; justify-content: center; flex-direction: column;">
          <p style="font-size: 20px;">
            Meta diária
          </p>
          <h2 style="font-size: 40px; color: #3498DB;">0L / 2L</h2>
        </div>
        <div class="linha">
          <div class="progresso" style="width: 10%"></div>
        </div>
        <div class="consul" style="display: flex; align-items: center; justify-content: space-between; width: 100%;">
          <p>Continue se Hidratando</p>
          <p>Restante: 3L</p>
        </div>
        <div class="buttons">
            <div class="more">
                <span class="material-symbols-outlined">
                    add
                </span>
            </div>
            <div class="less">
                <p style="font-size: 48px;">-</p>
            </div>
        </div>
      </div>

<form class="card" action="{{ route('meta.definir') }}" method="post">
    @csrf
        <div class="card-header">
            <h1>Definir Meta de Hidratação</h1>
            <hr/>
        </div>
        <div class="card-body">
            <div class="title"><span class="asterisco">*</span> Meta de Água (litros):</div>
            <input type="text" name="meta" id="meta" value="2000">
        </div>
        <div class="card-button">
            <button class="save" type="submit">Salvar Meta</button>
        </form>

        <form class="button-cancel" action="{{ route('meta.remove') }}" method="post">
            @csrf
            <button class="cancel" type="submit">Remover</button>
        </div>
</form>
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
