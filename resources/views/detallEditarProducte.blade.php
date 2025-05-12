@extends("master")

@section("header")
    @if ($estat)
        <div class="alert alert-success text-center" role="alert">
            <p class="text-center">Producte afegit correctament</p>
        </div>
    @endif
    <div class="text-center my-4">
        @if ($editar)
            <h1 class="display-4">EDITAR PRODUCTE</h1>
        @else
            <h1 class="display-4">DETALL PRODUCTE</h1>
        @endif
    </div>
@endsection

@section("content")
    <div class="container my-5">
        <div class="card shadow">
            <div class="card-body">
                <form action="/productesServeis" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" id="nom" name="first-name" class="form-control" required @if (!$editar) readonly @endif value="{{ $producte['name'] }}">
                    </div>
                    <div class="mb-3">
                        <label for="descripcio" class="form-label">Descripcio</label>
                        <input type="text" id="descripcio" name="description" class="form-control" required @if (!$editar) readonly @endif value="{{ $producte['description'] }}">
                    </div>
                    <div class="mb-3">
                        <label for="preu" class="form-label">Preu</label>
                        <input type="text" id="preu" name="price" class="form-control" required @if (!$editar) readonly @endif value="{{ $producte['price'] }}">
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" id="stock" name="stock" class="form-control" required @if (!$editar) readonly @endif value="{{ $producte['stock'] }}">
                    </div>
                    <div class="mb-3">
                        <label for="dataEntrada" class="form-label">Data d'entrada</label>
                        <input type="date" id="dataEntrada" name="entry_date" class="form-control" required @if (!$editar) readonly @endif value="{{ $producte['entry_date'] }}">
                    </div>
                    @if ($editar)
                        <button type="submit" class="btn btn-primary">Editar Producte</button>
                    @endif
                    <a href="/productesServeis" class="btn btn-primary">
                        Sortir
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection