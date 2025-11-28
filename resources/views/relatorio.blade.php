@extends('app')

@section('title', 'Relatorio Semanal')

@section('css')
    @include('_partials.dark')
<style>

    html{
        scrollbar-width: none;
    }

    body{
        background-color: #f4f4f4;
        scrollbar-width: none;
    }

   main{
        display: flex;
        justify-content: center;
        align-content: center;
    }
    
    .principal .card{
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

    .principal .card-header{
        display: flex;
        flex-direction: column;
        height: 23%;
        justify-content: center;
        align-items: center;
        row-gap: 2.2em;
    }

    .principal .card-header .item{
        display: flex;
        width: 88%;
        justify-content: baseline;
    }

    .principal .card-header h2{
        font-size: 2.3em;
        color: #4CAF50;
        margin-top: .2em;
    }

    .principal .card-header p{
        font-size: 1.4em;
    }

    .principal .card-line{
        display: flex;
        justify-content: center;
        align-content: center;
        margin-bottom: 4.2%;
    }

    .principal hr{
        width: 92%;
        border-color: #4CAF50;
    }

    .principal .card-body{
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        /* row-gap: em; */
    }

    .principal .row1{
        display: flex;
        justify-content: start;
        align-items: center;
        height: fit-content;
        column-gap: 2.8em;
        width: 88%;
        /* margin-top: 1.1em; */
    }

    .principal .row1 .item{
        display: flex;
        align-items: center;
        width: max-content;
        height: 100%;
        column-gap: 1em;
    }

    .principal .row1 .item input{
        height: 4.5em;
        width: 22em;
        border-radius: 8px;
        border: 1px solid #c4c4c4;
        padding-inline: 1.1em;
        background-color: #f4f4f4;
    }

    .principal .row1 .item input[type="date"]::-webkit-datetime-edit {
        font-size: 1.25em;
        padding: 0;
        font-weight: 500;
        color: #646464;
    }

    .principal .row1 .item input[type="date"]::-webkit-calendar-picker-indicator {
        font-size: 1.2em;
        filter: invert(0.3);
        cursor: pointer;
    }

    .principal .row1 button{
        display: flex;
        align-items: center;
        width: 12em;
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

    .principal .a{
        display: flex;
        width: 13em;
        height: 100%;
    }

    .principal .row1 .itemLimpar0{
        width: 30%;
        height: 100%;
        display: flex;
        align-items: center;
    }

    .principal .row1 .itemLimpar1{
        background-color: #ffffff;
        color: #4CAF50;
        width: 30%;
        height: 100%;
        display: flex;
        align-items: center;
        border: 1.7px solid #4CAF50;
    }

    .principal .itemLimpar1 svg{
        fill: #4CAF50;
    }

    .principal .row1 .itemFiltrar1{
        border: 1.7px solid #4CAF50;
        background-color: #ffffff;
        color: #4CAF50;
    }

    .principal .row1 button:hover{
        transform: scale(1.02);
        cursor: pointer;
        transition: 0.3s;
    }

    .principal .row2{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 88%; 
        flex: 1;
    }

    .principal .table{
        display: flex;
        flex-direction: column;
        width: 100%;
        height: 530px;
        border: 1px solid #ddd;
        border-radius: 25px;
        margin-bottom: 2em;
        overflow: hidden; /* Adicione esta linha */
    }

    /* Container para manter o mesmo design do seu card */
    .table-container {
        width: 100%;
        height: 530px;
        border: 1px solid #ddd;
        border-radius: 25px;
        overflow: hidden;
        background: white;
    }

    /* A tabela em si */
    .tabela-relatorios {
        width: 100%;
        border-collapse: collapse;
        font-size: 1.1em;
    }

    /* Cabeçalho — exatamente como o seu .table-header */
    .tabela-relatorios thead tr {
        background-color: #4CAF50;
        color: white;
        height: 15%;
    }

    .tabela-relatorios thead th {
        text-align: center;
        padding: 0.8em;
        font-weight: bold;
        border-bottom: 1px solid #ddd;
    }

    /* Linhas */
    .tabela-relatorios tbody tr {
        height: 4.5em;
        border-bottom: 1px solid #ddd;
    }

    /* Células */
    .tabela-relatorios tbody td {
        text-align: center;
        padding: 0 0.5em;
    }

    /* Rolagem SÓ no corpo */
    .table-container tbody {
        display: block;
        height: 455px;
        overflow-y: auto;

        scrollbar-width: thin;
        scrollbar-color: #4CAF50 #f4f4f4;
        scroll-behavior: smooth;
    }

    /* Tamanho fixo do header */
    .table-container thead, 
    .table-container thead tr {
        display: table;
        width: 100%;
        table-layout: fixed;
    }

    /* As colunas do tbody seguem o mesmo layout */
    .table-container tbody tr {
        display: table;
        width: 100%;
        table-layout: fixed;
    }

    /* Mensagem "vazio" */
    .sem-registros {
        padding: 2em;
        font-size: 1.2em;
        color: #555;
    }


    .principal .table-header{
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
        padding-right: .7em;
    }

    .principal .item-maior{
        display: flex;
        justify-content: start;
        align-items: center;
        width: 42%;
        padding-left: .5em;
    }

    .principal .item-fim{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 12%;
    }

    /* .espaco{
        
    } */

    .principal .table-header .item{
        display: flex;
        justify-content: center;
        align-items: center;
        flex: 1;
    }

    .principal .table-body{
        flex: 1;
        border-bottom-left-radius: 25px;
        border-bottom-right-radius: 25px;
        overflow-y: auto;
        scrollbar-width: thin;
        scrollbar-color: #4CAF50 #f4f4f4;
        scrollbar-gutter: stable;
        scroll-behavior: smooth;
    }

    .principal .row{
        display: flex;
        flex-direction: row;
        align-items: center;
        width: 100%;
        height: 4.5em;
        border-bottom: 1px solid #ddd;
    }

    .principal .table-cell, .table-cell-hora, .table-cell-maior, .table-cell-acoes{
        height: 100%;
    }
    
    .principal .table-cell{
        display: flex;
        justify-content: center;
        align-items: center;
        flex: 1;
    }

    .principal .table-cell-maior{
        display: flex;
        justify-content: start;
        align-items: center;
        width: 42%;
        padding-left: .5em;
    }

    .principal .table-cell-acoes{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 12%;
        column-gap: .6em;
    }

    .principal .table-body button{
        border-radius: 40px;
        background: none;
        border: none;
        cursor: pointer;
        font-size: 1em;
    }

    /* Sumindo com o form */
    .principal .card form {
        all: unset;
        display: contents;
    }

    .principal{
        all: unset;
        display: contents;
    }

</style>

<style>
    .modal {
        display: none;
        position: fixed;
        z-index: 10000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.7);
        overflow-y: auto; /* Permite scroll apenas no modal se necessário */
        scrollbar-width: none;
    }

    .modal-content {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        min-height: 100%;
        padding: 20px;
        box-sizing: border-box;
    }

</style>

<style>
    .modal form{
        flex: 1;
        display: flex;
        justify-content: center;
        align-content: center;
    }

    .modal .card{
        display: flex;
        flex-direction: column;
        margin-top: 4%;
        margin-bottom: 3%;
        background-color: white;
        width: 80vw;
        min-height: 900px;
        border-radius: 20px;
        border: 1px solid #dddbdbff;
    }

    /* .card-body, .card-footer, .card-header{
        //
    } */


    /* card cabeçalho */
    .modal .card-header{
        display: flex;
        flex-direction: column;
        height: 27%;
        justify-content: center;
        align-items: center;
        row-gap: 2.4em;
    }

    .modal .card-header .item{
        display: flex;
        width: 88%;
        justify-content: baseline;
    }

    .modal .card-header h2{
        font-size: 2.6em;
        color: #4CAF50;
    }

    .modal .card-header p{
        font-size: 1.4em;
    }

    .modal .card-line{
        height: fit-content;
        display: flex;
        justify-content: center;
        align-content: center;
        margin-bottom: 3.5%;
        margin-top: 0.5%;
    }

    .modal hr{
        width: 92%;
        border-color: #4CAF50;
    }

    /* corpo do card */
    .modal .card-body{
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        row-gap: 1.4em;
    }

    .modal .row1, .row2{
        width: 87%;
        flex: 1;
        display: flex;
        flex-direction: row; 
        justify-content: center;
        column-gap: 5.3em;
    }

    .modal .card-body .item{
        display: flex;
        width: 87%;
        flex-direction: column;
        flex: 1;
        row-gap: .9em;
    }

    .modal .card-body label{
        margin-left: .4em;
        font-weight: 600;
        font-size: 1.6em;
        letter-spacing: .03em;
    }

    .modal .item input{
        height: 4.2em;
        width: 100%;
        border-radius: .6em;
        border: 2px rgb(207, 207, 207) solid;
        padding-inline: 1.2em;
        background-color: rgb(243, 243, 243);
        color: rgb(62, 62, 62);
        font-weight: 400;
    }

    .modal .item input::placeholder{
        font-weight: 600;
        font-size: 1.2em;
    }

    .modal .item input[type="date"], input[type="time"]{
        font-weight: 600;
        color: rgb(105, 105, 105);
    }

    .modal .item input[type="time"]::-webkit-calendar-picker-indicator {
        transform: scale(1.4); /* Aumenta 150% */
        padding: 5px; /* Espaço ao redor */
        cursor: pointer;
    }

    .modal .item input[type="date"]::-webkit-calendar-picker-indicator {
        transform: scale(1.3); /* Aumenta 150% */
        padding: 5px;
        cursor: pointer;
    }

    /* card footer, botão unico */
    .modal .card-footer{
        height: 22%;
        display: flex;
        justify-content: center;
        align-content: start;
    }

    .modal .button{
        height: 66%;
        width: 32%;
        display: flex;
        justify-content: center;
        align-items: end;
        column-gap: 1.5em;
    }

    .modal .button .concluir{
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

    .modal .discard {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 2.6em;
        width: 2.6em;
        font-size: 25px;
        background-color: #ffffff;
        border: 1.5px #ae5b4c solid;
        border-radius: 8px;
        transition: 0.7s;
    }

    .discard svg{
        display: flex;
        align-items: center;
        justify-content: center;
        fill: #ae5b4c;
    }

    .modal .button button:hover{
        transform: scale(1.12);
        transition: 0.5s;
        cursor: pointer;
    }

    /* TESTE DE TOOLTIP -> ANTI BURRO */
    /* .tooltip {
        position: relative;
        display: flex;
        cursor: help;
    }

    .tooltip .tooltip-text {
        font-size: .5em;
        visibility: hidden;
        width: max-content;
        background-color: #ffffff(95.8);
        color: #4CAF50;
        text-align: center;
        border-radius: 6px;
        position: absolute;
        z-index: 1;
        bottom: 95%;
        left: 70%;
        border: #4CAF50 1px solid;
        transform: translateX(-50%);
        opacity: 0;
        transition: opacity 0.3s;
    }

    .tooltip:hover .tooltip-text {
        visibility: visible;
        opacity: 1;
    }

    .tooltip-icon {
        margin-left: 5px;
    }

    .tooltip-icon svg{
        display: flex;
        justify-content: center;
        align-items: center;
    } */

     @media screen and (max-width:850px){
        .principal .card-header .item {
            justify-content: center;
            align-items: center;
        }
        .principal .card-header h2 {
            font-size: 1.7em;
            text-align: center
        }
        .principal .card-header p {
            font-size: 1.3em;
            text-align: justify;
        }
        .principal .row1{
            flex-direction: column;
            gap: 1rem;
        }
        .principal .row1 .item input {
            width: 275px;
        }
        .principal .row1 button {
            padding: 0.5rem;
        }
        .principal .table-header{
            padding: 1rem;
            overflow-x: auto;
            width: auto;
            scrollbar-width: thin;
            scrollbar-color: #4CAF50 #f4f4f4;
            scrollbar-gutter: stable;
            scroll-behavior: smooth;
        }
        .principal .row,.principal .table-header{
            gap: 1rem;
        }
        .principal .table-header h3{
            font-size: 18px;
        }
        .principal .row,.principal .table-cell-acoes {
            padding-left: 1rem;
        }

        .modal .row1,.modal .row2{
            flex-direction: column;
            align-items: center;
            gap: 1rem;
        }
        .modal .card-header h2 {
            font-size: 1.5em;
        }
        .modal .card-header p {
            font-size: 1.2em;
        }

        .modal .card-body label{
            font-size: 1.2em;
        }
        .modal .button{
            padding: 0 1rem;
            gap: 0.5rem;
            margin-top: 2rem;
            width: 100%;
            align-items: center;
            flex-direction: column;
        }
        .modal .button .concluir{
            width: 100%;
            padding: 0.6rem;
        }
        .modal .discard{
            width: 100%;
        }
     }
</style>

@endsection

@section('content')

    <div class="principal">

        <div class="card">
    
            <div class="card-header">
                <div class="item">
                    <h2>Relatorio Semanal</h2>
                </div>
                <div class="item">
                    <p>Veja o seu consumo da semana.</p>
                </div>
                
            </div>
    
            <div class="card-line">
                <hr>
            </div>
    
            <div class="card-body">
    
                <div class="row1">
                    <form action="{{ route('relatorio.filter') }}" method="get">
                        <div class="item">
                            <input type="date" name="data" value="{{ $data ?? date('Y-m-d') }}">
                        </div>
                        <div class="item">
                            <button type="submit">
                                Filtrar
                            </button>
                        </div>
                    </form>
                    <a href="{{ route('relatorio') }}" class="a">
                        <button type="button" class="itemLimpar1">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="M592-481 273-800h487q25 0 36 22t-4 42L592-481ZM791-56 560-287v87q0 17-11.5 28.5T520-160h-80q-17 0-28.5-11.5T400-200v-247L56-791l56-57 736 736-57 56Z"/></svg>
                        </button>
                    </a>
                    </div>
    
                <div class="row2">
                    <div class="table-container">
                        <table class="tabela-relatorios">
                            <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Kcal</th>
                                    <th>Hidratação</th>
                                </tr>
                            </thead>

                            <tbody>
                                @isset($relatorios)
                                    @forelse ($relatorios as $r)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($r['data'])->format('d/m/Y') }}</td>
                                            <td>{{ $r['kcal'] }}</td>
                                            <td>{{ $r['consumido'] }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="sem-registros">
                                                Nenhum registro encontrado.
                                            </td>
                                        </tr>
                                    @endforelse
                                @endisset
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="modalEditar" class="modal" style="display: none;">
        <div class="modal-content" id="conteudoModal">
        </div>
    </div>

    

    <script>
        function abrirModalEditar(alimentoId) {
            document.body.style.overflow = 'hidden';
            document.documentElement.style.overflow = 'hidden'; 

            // Faz requisição AJAX para buscar os dados do alimento
            fetch(`/alimentos/${alimentoId}/editar`)
                .then(response => response.text())
                .then(html => {
                    document.getElementById('conteudoModal').innerHTML = html;
                    document.getElementById('modalEditar').style.display = 'block';
                    
                    
                    // // Adiciona event listener para o botão de fechar DINAMICAMENTE
                    // const closeButton = document.querySelector('.modal .');
                    // if (closeButton) {
                    //     closeButton.onclick = fecharModal;
                    // }
                    
                })
                .catch(error => {
                    console.error('Erro:', error);
                    alert('Erro ao carregar o formulário');
                });
        }

        function fecharModal() {
            document.body.style.overflow = 'auto';
            document.documentElement.style.overflow = 'auto';
            document.getElementById('modalEditar').style.display = 'none';
        }

        // Event listener para fechar clicando fora (funciona sempre)
        window.addEventListener('click', function(event) {
            const modal = document.getElementById('modalEditar');
            if (event.target === modal) {
                fecharModal();
            }
        });

    </script>

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