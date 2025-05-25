@extends("master")

@section("header")
    @if ($estat)
        <div class="alert alert-success text-center" role="alert">
            <p class="text-center">Producte afegit correctament</p>
        </div>
    @endif
    <div class="text-center my-4">
        <h1 class="display-4">AFEGIR PRODUCTE</h1>
    </div>
@endsection

@section("content")
    <div class="container my-5">
        <div class="card shadow">
            <div class="card-body">
                <form action="/productesServeis" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" id="nom" name="first-name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcio" class="form-label">Descripcio</label>
                        <input type="text" id="descripcio" name="description" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="preu" class="form-label">Preu</label>
                        <input type="text" id="preu" name="price" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" id="stock" name="stock" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="dataEntrada" class="form-label">Data d'entrada</label>
                        <input type="date" id="dataEntrada" name="entry_date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="provider" class="form-label">Proveïdor</label>
                        <input type="text" id="provider" name="provider" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Afegir Producte</button>
                    <a href="/productesServeis" class="btn btn-primary">
                        Sortir
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection