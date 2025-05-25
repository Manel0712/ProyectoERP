@extends("master")

@section("header")
    @if ($estat)
        <div class="alert alert-success text-center" role="alert">
            <p class="text-center">Client afegit correctament</p>
        </div>
    @endif
    <div class="text-center my-4">
        <h1 class="display-4">AFEGIR CLIENT</h1>
    </div>
@endsection

@section("content")
    <div class="container my-5">
        <div class="card shadow">
            <div class="card-body">
                <form action="/clients" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" id="nom" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="cognoms" class="form-label">Cognoms</label>
                        <input type="text" id="cognoms" name="cognoms" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Numero de telefon</label>
                        <input type="text" id="phone" name="phone" class="form-control" pattern="^\+?[0-9\s\-\(\)]{7,20}$" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Adreça</label>
                        <input type="text" id="address" name="address" class="form-control" required>
                    </div>
                    <div>
                        <label for="type" class="form-label">Tipus de client</label>
                        <select id="type" name="type" class="form-control" required>
                            @foreach($tipos as $tipo)
                                <option value="{{ $tipo['id'] }}">{{ $tipo["description"] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Afegir Client</button>
                    <a href="/clients" class="btn btn-primary">
                        Sortir
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection