@extends("master")

@section("header")
    @if ($estat)
        <div class="alert alert-success text-center" role="alert">
            <p class="text-center">Usuari afegit correctament</p>
        </div>
    @endif
    <div class="text-center my-4">
        <h1 class="display-4">AFEGIR USUARI</h1>
    </div>
@endsection

@section("content")
    <div class="container my-5">
        <div class="card shadow">
            <div class="card-body">
                <form action="/administracio" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" id="nom" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class=" btn btn-gray">Afegir Usuari</button>
                    <a href="/administracio" class="btn btn-gray">
                        Sortir
                    </a>
                </form>
            </div>
        </div>
    </div>
     <style>
        .btn-gray {
            background-color: #6c757d;
            color: #fff;
            border: none;
            font-weight: bold;
            border-radius: 50px;
            padding: 0.5rem 1.5rem;
            transition: background 0.3s, color 0.3s;
            margin-right: 0.5rem;
        }
        .btn-gray:hover, .btn-gray:focus {
            background-color: #495057;
            color: #fff;
        }
    </style>
@endsection