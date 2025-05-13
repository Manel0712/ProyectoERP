@extends("master")

@section("header")
@endsection

@section("content")
    <div class="container my-5">
        <div class="table-responsive">
            <div class="text-center mb-4">
                <h2 class="text-3xl font-bold text-purple-800">Clientes</h2>
            </div>
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" class="text-center" style="width: 20%;">Nom</th>
                        <th scope="col" class="text-center" style="width: 20%;">Cognoms</th>
                        <th scope="col" class="text-center" style="width: 2 0%;">Email</th>
                        <th scope="col" class="text-center" style="width: 20%;">Phone</th>
                        <th scope="col" class="text-center" style="width: 20%;">Address</th>
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
                            <td class="text-center">
                                <form action="/clients/{{ $client['id'] }}" method="get">
                                    <button type="submit" class="btn btn-info text-white rounded-full px-4 py-2">Detall</button>
                                </form>
                            </td>
                            <td class="text-center">
                                <form action="/clients/{{ $client['id'] }}/edit" method="get">
                                    <button type="submit" class="btn btn-warning text-white rounded-full px-4 py-2">Editar</button>
                                </form>
                            </td>
                            <td class="text-center">
                                <form action="/clients/{{ $client['id'] }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" onclick="return confirmDelete(this.form)" class="btn btn-danger text-white rounded-full px-4 py-2">Esborrar</button>
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

    <style>
        /* Botón estilizado */
        .btn {
            font-size: 1rem;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-info {
            background-color: #4a90e2;
        }

        .btn-info:hover {
            background-color: #357ab8;
        }

        .btn-warning {
            background-color: #f5a623;
        }

        .btn-warning:hover {
            background-color: #d4881c;
        }

        .btn-danger {
            background-color: #d0021b;
        }

        .btn-danger:hover {
            background-color: #a80116;
        }

        .rounded-full {
            border-radius: 50px;
        }

        .px-4 {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .py-2 {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }
    </style>
@endsection