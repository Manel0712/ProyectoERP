@extends("master")

@section("header")
    @if ($estat)
        <div class="alert alert-success text-center" role="alert">
            <p class="text-center">Usuari editat correctament</p>
        </div>
    @endif
    <div class="text-center my-4">
        @if ($editar)
            <h1 class="display-4">EDITAR USUARI</h1>
        @else
            <h1 class="display-4">DETALL USUARI</h1>
        @endif
    </div>
@endsection

@section("content")
    <div class="container my-5">
        <div class="card shadow">
            <div class="card-body">
                <form action="/administracio/{{ $usuari->id }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" id="nom" name="name" class="form-control" required @if (!$editar) readonly @endif value="{{ $usuari['name'] }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" required @if (!$editar) readonly @endif value="{{ $usuari['email'] }}">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control" @if (!$editar) readonly @endif>
                    </div>
                    @if ($editar)
                        <button type="submit" class="btn btn-primary">Editar Usuari</button>
                    @endif
                    <a href="/administracio" class="btn btn-primary">
                        Sortir
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection