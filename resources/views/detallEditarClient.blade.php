@extends("master")

@section("header")
    @if ($estat)
        <div class="alert alert-success text-center" role="alert">
            <p class="text-center">Client editat correctament</p>
        </div>
    @endif
    <div class="text-center my-4">
        @if ($editar)
            <h1 class="display-4">EDITAR CLIENT</h1>
        @else
            <h1 class="display-4">DETALL CLIENT</h1>
        @endif
    </div>
@endsection

@section("content")
    <div class="container my-5">
        <div class="card shadow">
            <div class="card-body">
                <form action="/clients" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" id="nom" name="first-name" class="form-control" required @if (!$editar) readonly @endif value="{{ $client['first-name'] }}">
                    </div>
                    <div class="mb-3">
                        <label for="cognoms" class="form-label">Cognoms</label>
                        <input type="text" id="cognoms" name="last-name" class="form-control" required @if (!$editar) readonly @endif value="{{ $client['last-name'] }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" required @if (!$editar) readonly @endif value="{{ $client['email'] }}">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" id="phone" name="phone" class="form-control" pattern="^\+?[0-9\s\-\(\)]{7,20}$" required @if (!$editar) readonly @endif value="{{ $client['phone'] }}">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" id="address" name="address" class="form-control" required @if (!$editar) readonly @endif value="{{ $client['address'] }}">
                    </div>
                    {{--<select name="pais" required @if (!$editar) readonly @endif>
                        @foreach($tipos as $tipo)
                            <option value="{{ $tipo['id'] }}" {{ $tipo == $client["tipoCliente"]["description"] ? 'selected' : '' }}>{{ $tipo["description"] }}</option>
                        @endforeach
                    </select>--}}
                    @if ($editar)
                        <button type="submit" class="btn btn-primary">Editar Client</button>
                    @endif
                    <a href="/clients" class="btn btn-primary">
                        Sortir
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection