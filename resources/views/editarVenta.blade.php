@extends("master")

@section("header")
    @if ($estat)
        <div class="alert alert-success text-center" role="alert">
            <p class="text-center">Venta editada correctament</p>
        </div>
    @endif
    <div class="text-center my-4">
        <h1 class="display-4">EDITAR USUARI</h1>        
    </div>
@endsection

@section("content")
    <div class="container my-5">
        <div class="card shadow">
            <div class="card-body">
                <form action="/ventas/{{ $venta->id }}" method="POST">
                    @method('PUT')
                    @csrf
                    <label for="client" class="form-label">Client</label>
                    <select id="client" name="client" class="form-control" required>
                        @foreach($clientes as $client)
                            <option value="{{ $client['id'] }}" {{ $client == $venta["cliente"] ? 'selected' : '' }}>{{ $client["first-name"] }}{{" "}}{{ $client["last-name"] }}</option>
                        @endforeach
                    </select>
                    <div class="mb-3">
                        <label for="state" class="form-label">Estat</label>
                        <input type="text" id="state" name="state" class="form-control" required value="{{ $venta['state'] }}">
                    </div>
                    <div class="mb-3">
                        <label for="details" class="form-label">Detalls</label>
                        <input type="text" id="details" name="details" class="form-control" required value="{{ $venta['details'] }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Editar Venta</button>
                    <a href="/ventas" class="btn btn-primary">
                        Sortir
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection