@extends("master")

@section("header")
@endsection

@section("content")
    <div class="container my-5">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" class="text-center" style="width: 50%;">Nom</th>
                        <th scope="col" class="text-center" style="width: 50%;">Email</th>
                        <th scope="col" colspan=3 class="text-center" style="width: 50%;">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($usuaris as $usuari)
                        <tr>
                            <td class="text-center">{{ $usuari["name"] }}</td>
                            <td class="text-center">{{ $usuari["email"] }}</td>
                            <td class="text-center">
                                <form action="/administracio/{{ $usuari['id'] }}" method="get">
                                    <button type="submit" class="btn btn-primary">Detall</button>
                                </form>
                            </td>
                            <td class="text-center">
                                <form action="/administracio/{{ $usuari['id'] }}/edit" method="get">
                                    <button type="submit" class="btn btn-primary">Editar</button>
                                </form>
                            </td>
                            <td class="text-center">
                                <form action="/administracio/{{ $usuari['id'] }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" onclick="return confirmDelete(this.form)" class="btn btn-primary">Esborrar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">No hi ha clients</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function confirmDelete(form) {
            const confirmed = confirm("Esteu segur que voleu donar de baixa a aquest usuari?");
            if (confirmed) {
                form.submit();
            } else {
                return false;
            }
        }
    </script>
@endsection