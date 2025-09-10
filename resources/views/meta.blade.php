@extends('app')

@section('title', 'Meta')

@section('css')
<style>
    body {
        background-color: #f4f4f4;
    }

    main {
        display: flex;
        justify-content: center;
        align-content: center;
    }
    
    form {
        all: unset;
        display: contents;
    }

    .card {
        display: flex;
        flex-direction: column;
        margin-top: 4%;
        margin-bottom: 3%;
        background-color: white;
        width: 80vw;
        min-height: 425px;
        border-radius: 70px;
        border: 1px solid #dddbdbff;
    }

    .card-header {
        display: flex;
        flex-direction: column;
        height: 30%;
        justify-content: center;
        align-items: center;
        row-gap: 2.4em;
    }

    .card-header .item {
        display: flex;
        width: 88%;
        justify-content: baseline;
    }

    .card-header h2 {
        font-size: 2.6em;
        color: #4CAF50;
    }

    .card-line {
        height: fit-content;
        display: flex;
        justify-content: center;
        align-content: center;
        margin-bottom: 3.5%;
        margin-top: 0.5%;
    }

    hr {
        width: 92%;
        border-color: #4CAF50;
    }

    .card-body {
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        row-gap: 1.4em;
    }

    .card-body .item {
        display: flex;
        width: 87%;
        flex-direction: column;
        flex: 1;
        row-gap: .9em;
    }

    .card-body label {
        margin-left: .4em;
        font-weight: 600;
        font-size: 1.6em;
        letter-spacing: .03em;
    }

    .item input {
        height: 4.2em;
        width: 100%;
        border-radius: .6em;
        border: 2px solid #cfcfcf;
        padding-inline: 1.2em;
        background-color: #f3f3f3;
        color: #3e3e3e;
        font-weight: 400;
    }

    .item input::placeholder {
        font-weight: 600;
        font-size: 1.2em;
    }

    .card-footer {
        height: 25%;
        display: flex;
        justify-content: center;
        align-content: start;
        column-gap: 2em;
    }

    .button {
        height: 66%;
        width: 32%;
        display: flex;
        justify-content: center;
        align-items: end;
    }

    .button button {
        height: 2.6em;
        flex: 1;
        font-size: 25px;
        font-weight: bold;
        border-radius: 8px;
        transition: 0.7s;
    }

    .define{
        background-color: #4CAF50;
        color: white;
        border: none;
    }

    .remove{
        background-color: #ffffff;
        color: #ae5b4c;
        border: 1px solid #ae5b4c;
    }

    .button button:hover {
        transform: scale(1.12);
        transition: 0.5s;
        cursor: pointer;
    }
</style>
@endsection

@section('content')
<div class="card">
    <form action="{{ route('meta.definir') }}" method="post">
            @csrf
        <div class="card-header">
            <div class="item">
                <h2>Definir Meta</h2>
            </div>
        </div>

        <div class="card-line">
            <hr>
        </div>

        <div class="card-body">
            <div class="item">
                <label for="nome">Nova Meta Diária (kcal):</label>
                <input type="text" name="meta" placeholder="Ex: 1000" required>
            </div>
        </div>
        
        <div class="card-footer">
            <div class="button">
                <button type="submit" class="define">Definir</button>
            </div>
    </form>
    <form action="{{ route('meta.remove') }}" method="post">
            @csrf
            <div class="button">
                <button type="submit" class="remove">Remover</button>
            </div>
        </div>
    </form>
</div>
@endsection