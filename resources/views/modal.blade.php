


<form action="{{ route('alimentos.update', $alimento->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="card">

        <div class="card-header">
            <div class="item">
                <h2>Editar</h2>
            </div>        
            <div class="item">
                <p>Edite o registro de consumo deste alimento.</p>
            </div>
        </div>

        <div class="card-line">
            <hr>
        </div>

        <div class="card-body">

            <div class="row1">
                <div class="item">
                    <label for="data"><span class="data">Data:</span></label>
                    <input type="date" name="data" value="{{ $alimento->data->format('Y-m-d') }}" required>
                </div>
                <div class="item">
                    <label for="hora"><span class="hora">Hora:</span></label>
                    <input type="time" name="hora" value="{{ $alimento->hora }}" required>
                </div>
            </div>
            
            <div class="row2">
                <div class="item">
                    <label for="kcal">
                        <span class="kcal">Proporção Kcal/100g:</span>
                        {{-- <span class="tooltip-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#4CAF50" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm-4,48a12,12,0,1,1-12,12A12,12,0,0,1,124,72Zm12,112a16,16,0,0,1-16-16V128a8,8,0,0,1,0-16,16,16,0,0,1,16,16v40a8,8,0,0,1,0,16Z"></path></svg></span>
                        <span class="tooltip-text">"Quantidade de calorias a cada 100g do alimento."</span> --}}
                    </label>
                    <input type="number" step="0.001" name="kcal" value="{{ $kcalPor100g }}"required>
                </div>
                <div class="item">
                    <label for="gramas"><span class="gramas">Quantidade (g):</span></label>
                    <input type="number" step="0.001" name="gramas" value="{{ $alimento->gramas }}" required>
                </div>
            </div>

            <div class="item">
                <label for="nome"><span class="nome">Alimentos:</span></label>
                <input type="text" name="nome" value="{{ $alimento->nome }}" required>
            </div>

        </div>
        

        <div class="card-footer">
            <div class="button">
                <button type="submit" class="concluir">Concluir Edição</button>
                <button type="button" class="discard" onclick="fecharModal()">
                    <svg xmlns="http://www.w3.org/2000/svg" height="32px" viewBox="0 -960 960 960" width="32px" fill="#FFFFFF"><path d="M520-40v-240l-84-80-40 176-276-56 16-80 192 40 64-324-72 28v136h-80v-188l158-68q35-15 51.5-19.5T480-720q21 0 39 11t29 29l40 64q26 42 70.5 69T760-520v80q-66 0-123.5-27.5T540-540l-24 120 84 80v300h-80Zm20-700q-33 0-56.5-23.5T460-820q0-33 23.5-56.5T540-900q33 0 56.5 23.5T620-820q0 33-23.5 56.5T540-740Z"/></svg>
                </button>
            </div>
        </div>

    </div>
</form>

<script>
function fecharModal() {
    document.getElementById('modalEditar').style.display = 'none';
}
</script>
