@extends("master")

@section("header")
    @if ($estat)
        <div class="alert alert-success text-center" role="alert">
            <p class="text-center">Venta afegida correctament</p>
        </div>
    @endif
    <div class="text-center my-4">
        <h1 class="display-4">AFEGIR VENTA</h1>
    </div>
@endsection

@section("content")
    <div class="container my-5">
        <div class="card shadow">
            <div class="card-body">
                <form action="/ventas" method="POST">
                    @csrf
                    <div>
                        <label for="client" class="form-label">Client</label>
                        <select id="client" name="client" class="form-control" required>
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente['id'] }}">{{ $cliente["first-name"] }}{{" "}}{{ $cliente["last-name"] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="state" class="form-label">Estat</label>
                        <input type="text" id="state" name="state" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="details" class="form-label">Detalls</label>
                        <input type="text" id="details" name="details" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Afegir Venta</button>
                    <a href="/clients" class="btn btn-primary">
                        Sortir
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection