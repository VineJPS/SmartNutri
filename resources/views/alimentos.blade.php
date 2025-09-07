@extends('app')

@section('title', 'Registro de Alimentos')

@section('css')

<style>
    body{
        background-color: #f4f4f4;
    }

    main{
        display: flex;
        justify-content: center;
        align-content: center;
    }
    
    form{
        flex: 1;
        display: flex;
        justify-content: center;
        align-content: center;
    }

    .card{
        display: flex;
        flex-direction: column;
        margin-top: 4%;
        margin-bottom: 3%;
        background-color: white;
        width: 80vw;
        min-height: 900px;
        border-radius: 70px;
        border: 1px solid dddbdbff;
    }

    /* .card-body, .card-footer, .card-header{
        //
    } */


    /* card cabeçalho */
    .card-header{
        display: flex;
        flex-direction: column;
        height: 27%;
        justify-content: center;
        align-items: center;
        row-gap: 2.4em;
    }

    .card-header .item{
        display: flex;
        width: 90%;
        justify-content: baseline;
    }

    .card-header h2{
        font-size: 2.6em;
        color: #4CAF50;
    }

    .card-header p{
        font-size: 1.5em;
    }

    .card-line{
        height: fit-content;
        display: flex;
        justify-content: center;
        align-content: center;
        margin-bottom: 3.5%;
        margin-top: 0.5%;
    }

    hr{
        width: 90%;
        border-color: #4CAF50;
    }

    /* corpo do card */
    .card-body{
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        row-gap: 1.4em;
    }

    .row1, .row2{
        width: 87%;
        flex: 1;
        display: flex;
        flex-direction: row; 
        justify-content: center;
        column-gap: 5.3em;
    }

    .card-body .item{
        display: flex;
        width: 87%;
        flex-direction: column;
        flex: 1;
        row-gap: .9em;
    }

    .card-body label{
        margin-left: .4em;
        font-weight: 600;
        font-size: 1.6em;
        letter-spacing: .03em;
    }

    .item input{
        height: 4.2em;
        width: 100%;
        border-radius: .6em;
        border: 2px rgb(207, 207, 207) solid;
        padding-inline: 1.2em;
        background-color: rgb(243, 243, 243);
        color: rgb(62, 62, 62);
        font-weight: 400;
    }

    .item input::placeholder{
        font-weight: 600;
        font-size: 1.2em;
    }

    .item input[type="date"], input[type="time"]{
        font-weight: 600;
        color: rgb(105, 105, 105);
    }

    .item input[type="time"]::-webkit-calendar-picker-indicator {
        transform: scale(1.4); /* Aumenta 150% */
        padding: 5px; /* Espaço ao redor */
        cursor: pointer;
    }

    .item input[type="date"]::-webkit-calendar-picker-indicator {
        transform: scale(1.3); /* Aumenta 150% */
        padding: 5px;
        cursor: pointer;
    }

    /* card footer, botão unico */
    .card-footer{
        height: 22%;
        display: flex;
        justify-content: center;
        align-content: start;
    }

    .button{
        height: 66%;
        width: 32%;
        display: flex;
        justify-content: center;
        align-items: end;
    }

    .button button{
        height: 2.6em;
        flex: 1;
        font-size: 25px;
        background-color: #4CAF50;
        color: white;
        font-weight: bold;
        border: none;
        border-radius: 8px;
        transition: 0.7s;
    }

    .button button:hover{
        transform: scale(1.12);
        transition: 0.5s;
        cursor: pointer;
    }


</style>

@endsection

@section('content')

<form action="alimentos" method="get">
    <div class="card">

        <div class="card-header">
            <div class="item">
                <h2>Registro de Alimentos</h2>
            </div>
            <div class="item">
                <p>Registre os alimentos consumidos durante o dia.</p>
            </div>
            
        </div>

        <div class="card-line">
            <hr>
        </div>

        <div class="card-body">

            <div class="row1">
                <div class="item">
                    <label for="data"><span class="data">Data:</span></label>
                    <input type="date" name="data" placeholder="25.08.2025" required>
                </div>
                <div class="item">
                    <label for="hora"><span class="hora">Hora:</span></label>
                    <input type="time" name="time" placeholder="12:32" required>
                </div>
            </div>
            
            <div class="row2">
                <div class="item">
                    <label for="kcal"><span class="kcal">Calorias por (100g):</span></label>
                    <input type="decimal" name="kcal" placeholder="Exemplo: 20 - 20 calorias a cada 100 gramas" required>
                </div>
                <div class="item">
                    <label for="gramas"><span class="gramas">Quantidade (g):</span></label>
                    <input type="decimal" name="gramas" placeholder="Quantas gramas foram consumidas do alimento" required>
                </div>
            </div>

            <div class="item">
                <label for="nome"><span class="nome">Alimentos:</span></label>
                <input type="decimal" name="nome" placeholder="Quantas gramas foram consumidas do alimento" required>
            </div>

        </div>

        <div class="card-footer">
            <div class="button">
                <button type="submit">Adicionar Alimento</button>
            </div>
        </div>

    </div>
</form>

@endsection


