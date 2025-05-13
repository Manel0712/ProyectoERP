@extends("master")

@section("header")
@endsection

@section("content")
    <div class="container my-5">
        <div class="table-responsive">
            <form action="/clients/create" method="get">
                <div class="text-end mb-3">
                    <button type="submit" class="btn btn-primary">Afegir client</button>
                </div>
            </form>
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" class="text-center" style="width: 50%;">Nom</th>
                        <th scope="col" class="text-center" style="width: 50%;">Cognoms</th>
                        <th scope="col" class="text-center" style="width: 50%;">Email</th>
                        <th scope="col" class="text-center" style="width: 50%;">Phone</th>
                        <th scope="col" class="text-center" style="width: 50%;">Address</th>
                        {{--<th scope="col" class="text-center" style="width: 50%;">TipoCliente</th>--}}
                        <th scope="col" colspan=3 class="text-center" style="width: 50%;">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($clients as $client)
                        <tr>
                            <td class="text-center">{{ $client["first-name"] }}</td>
                            <td class="text-center">{{ $client["last-name"] }}</td>
                            <td class="text-center">{{ $client["email"] }}</td>
                            <td class="text-center">{{ $client["phone"] }}</td>
                            <td class="text-center">{{ $client["address"] }}</td>
                            {{--<td class="text-center">{{ $client["tipoCliente"]["description"] }}</td>--}}
                            <td class="text-center">
                                <form action="/clients/{{ $client['id'] }}" method="get">
                                    <button type="submit" class="btn btn-primary">Detall</button>
                                </form>
                            </td>
                            <td class="text-center">
                                <form action="/clients/{{ $client['id'] }}/edit" method="get">
                                    <button type="submit" class="btn btn-primary">Editar</button>
                                </form>
                            </td>
                            <td class="text-center">
                                <form action="/clients/{{ $client['id'] }}" method="post">
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
            const confirmed = confirm("Esteu segur que voleu donar de baixa a aquest client?");
            if (confirmed) {
                form.submit();
            } else {
                return false;
            }
        }
    </script>
@endsection