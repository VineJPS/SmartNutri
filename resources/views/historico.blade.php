@extends('app')

@section('title', 'Histórico de Alimentos')

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
    
    .card{
        display: flex;
        flex-direction: column;
        margin-top: 4%;
        margin-bottom: 3%;
        background-color: white;
        width: 80vw;
        min-height: 1000px;
        border-radius: 70px;
        border: 1px solid dddbdbff;
    }

    .card-header{
        display: flex;
        flex-direction: column;
        height: 23%;
        justify-content: center;
        align-items: center;
        row-gap: 2.2em;
    }

    .card-header .item{
        display: flex;
        width: 88%;
        justify-content: baseline;
    }

    .card-header h2{
        font-size: 2.3em;
        color: #4CAF50;
        margin-top: .2em;
    }

    .card-header p{
        font-size: 1.4em;
    }

    .card-line{
        display: flex;
        justify-content: center;
        align-content: center;
        margin-bottom: 4.2%;
    }

    hr{
        width: 92%;
        border-color: #4CAF50;
    }

    .card-body{
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        /* row-gap: em; */
    }

    .row1{
        display: flex;
        justify-content: start;
        align-items: center;
        height: fit-content;
        column-gap: 3em;
        width: 88%;
        /* margin-top: 1.1em; */
    }

    .row1 .item{
        display: flex;
        align-items: center;
        width: fit-content;
        height: 100%;
    }

    .row1 .item input{
        height: 4.5em;
        width: 22em;
        border-radius: 8px;
        border: 1px solid #c4c4c4;
        padding-inline: 1.1em;
        background-color: #f4f4f4;
    }

    .row1 .item input[type="date"]::-webkit-datetime-edit {
        font-size: 1.25em;
        padding: 0;
        font-weight: 500;
        color: #646464;
    }

    .row1 .item input[type="date"]::-webkit-calendar-picker-indicator {
        font-size: 1.2em;
        filter: invert(0.3);
        cursor: pointer;
    }

    .row1 button{
        display: flex;
        align-items: center;
        width: 9em;
        height: 100%;
        transition: 0.3s;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 1.14em;
        font-weight: 700;
        cursor: pointer;
        justify-content: center;
        letter-spacing: .5px
    }

    .row1 button:hover{
        transform: scale(1.02);
        cursor: pointer;
        transition: 0.3s;
    }

    .row2{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 88%; 
        flex: 1;
    }

    .table{
        display: flex;
        flex-direction: column;
        width: 100%;
        height: 78%;
        border: 1px solid #ddd;
        border-radius: 25px;
        margin-bottom: 2em;
        overflow: hidden; /* Adicione esta linha */
    }

    .table-header{
        display: flex;
        flex-direction: row;
        align-items: center;
        width: 100%;
        height: 15%;
        border-bottom: 1px solid #ddd;
        background-color: #4CAF50;
        color: white;
        font-weight: bold;
        font-size: 1.1em;
    }

    .item-maior{
        display: flex;
        justify-content: start;
        align-items: center;
        width: 40%;
    }

    .item-fim{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 12%;
    }

    .table-header .item{
        display: flex;
        justify-content: center;
        align-items: center;
        flex: 1;
    }

    .table-body{
        flex: 1;
        overflow-y: auto;
    }

    .row{
        display: flex;
        flex-direction: row;
        align-items: center;
        width: 100%;
        height: 4.5em;
        border-bottom: 1px solid #ddd;
    }

    .table-cell, .table-cell-hora, .table-cell-maior, .table-cell-acoes{
        height: 100%;
    }
    
    .table-cell{
        display: flex;
        justify-content: center;
        align-items: center;
        flex: 1;
    }

    .table-cell-maior{
        display: flex;
        justify-content: start;
        align-items: center;
        width: 40%;
    }

    .table-cell-acoes{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 12%;
        column-gap: .6em;
    }

    .table-body button{
        border-radius: 40px;
        background: none;
        border: none;
        cursor: pointer;
        font-size: 1em;
    }

    /* Sumindo com o form */
    form {
        all: unset;
        display: contents
    }

</style>

@endsection

@section('content')

    <div class="card">

        <div class="card-header">
            <div class="item">
                <h2>Histórico de Alimentação</h2>
            </div>
            <div class="item">
                <p>Veja o histórico de alimentos consumidos.</p>
            </div>
            
        </div>

        <div class="card-line">
            <hr>
        </div>

        <div class="card-body">

            <div class="row1">
                    <form action="{{ route('historico.filter') }}" method="get">
                    <div class="item">
                        <input type="date" name="data" value="{{ $data ?? date('Y-m-d') }}">
                    </div>
                    <div class="item">
                        <button type="submit">
                            Filtrar
                        </button>
                    </div>
                </form>
                </div>

            <div class="row2">
                
                <div class="table">
                    <div class="table-header">
                        <div class="item">
                            <h3>Hora</h3>
                        </div>
                        <div class="item-maior">
                            <h3>Nome</h3>
                        </div>
                        <div class="item">
                            <h3>Gramas</h3>
                        </div>
                        <div class="item">
                            <h3>Kcal</h3>
                        </div>
                        <div class="item-fim">
                            <h3>Ações</h3>
                        </div>
                    </div>
                    <div class="table-body">

                        @isset($alimentos)
                            @foreach ($alimentos as $alimento)
                                <div class="row">
                                    <div class="table-cell">{{ $alimento->hora }}</div>
                                    <div class="table-cell-maior">{{ $alimento->nome }}</div>
                                    <div class="table-cell">{{ $alimento->gramas }}</div>
                                    <div class="table-cell">{{ $alimento->kcal }}</div>
                                    <div class="table-cell-acoes">
                                        <form action="{{ route('alimentos.edit', $alimento->id) }}" method="get">
                                            @csrf
                                            <button type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#4caf50" viewBox="0 0 256 256"><path d="M227.32,73.37,182.63,28.69a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H216a8,8,0,0,0,0-16H115.32l112-112A16,16,0,0,0,227.32,73.37ZM192,108.69,147.32,64l24-24L216,84.69Z"></path></svg>
                                            </button>
                                        </form>
                                        <form action="{{ route('historico.delete', $alimento->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#ae5b4c" viewBox="0 0 256 256"><path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM112,168a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm0-120H96V40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8Z"></path></svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        @endisset
                    </div>
                </div>

            </div>

        </div>

    </div>

@endsection