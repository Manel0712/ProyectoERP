@extends("master")

@section("header")
    <div class="text-center my-4">
        <h1 class="display-4">PRODUCTES/SERVEIS</h1>
    </div>
@endsection

@section("content")
    <div class="container my-5">
        <div class="table-responsive">
            <form action="/productesServeis/create" method="get">
                <div class="text-end mb-3">
                    <button type="submit" class="btn btn-primary">Afegir producte</button>
                </div>
            </form>
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" class="text-center" style="width: 50%;">Nom</th>
                        <th scope="col" class="text-center" style="width: 50%;">Descripcio</th>
                        <th scope="col" class="text-center" style="width: 50%;">Preu</th>
                        <th scope="col" class="text-center" style="width: 50%;">Stock</th>
                        <th scope="col" class="text-center" style="width: 50%;">Data d'entrada</th>
                        <th scope="col" colspan=3 class="text-center" style="width: 50%;">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($productes as $producte)
                        <tr>
                            <td class="text-center">Falta</td>
                            <td class="text-center">{{ $producte["description"] }}</td>
                            <td class="text-center">{{ $producte["price"] }}</td>
                            <td class="text-center">{{ $producte["stock"] }}</td>
                            <td class="text-center">{{ $producte["entry_date"] }}</td>
                            <td class="text-center">
                                <form action="/productesServeis/{{ $producte['id'] }}" method="get">
                                    <button type="submit" class="btn btn-primary">Detall</button>
                                </form>
                            </td>
                            <td class="text-center">
                                <form action="/productesServeis/{{ $producte['id'] }}/edit" method="get">
                                    <button type="submit" class="btn btn-primary">Editar</button>
                                </form>
                            </td>
                            <td class="text-center">
                                <form action="/productesServeis/{{ $producte['id'] }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" onclick="return confirmDelete(this.form)" class="btn btn-primary">Esborrar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">No hi ha productes</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function confirmDelete(form) {
            const confirmed = confirm("Esteu segur que voleu donar de baixa a aquest client?");
            if (confirmed) {
                form.submit();
            } else {
                return false;
            }
        }
    </script>
@endsection