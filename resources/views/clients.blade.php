@extends("master")

@section("header")
    <div id="menu" class="bg-gradient-to-r from-purple-800 to-pink-500 text-white p-6 flex justify-between items-center">
        <h1 class="text-3xl font-bold">CLIENTS</h1>
        <nav class="space-x-6 font-semibold">
            <a href="/clients/create" class="btn-afegir">Afegir Client</a>
        </nav>
    </div>
@endsection

@section("content")
    <div class="container my-5">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered shadow-lg">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" class="text-center">Nom</th>
                        <th scope="col" class="text-center">Cognoms</th>
                        <th scope="col" class="text-center">Email</th>
                        <th scope="col" class="text-center">Phone</th>
                        <th scope="col" class="text-center">Address</th>
                        <th scope="col" colspan="3" class="text-center">Options</th>
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
                                    <button type="submit" class="btn btn-info text-white">Detall</button>
                                </form>
                            </td>
                            <td class="text-center">
                                <form action="/clients/{{ $client['id'] }}/edit" method="get">
                                    <button type="submit" class="btn btn-warning text-white">Editar</button>
                                </form>
                            </td>
                            <td class="text-center">
                                <form action="/clients/{{ $client['id'] }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" onclick="return confirmDelete(this.form)" class="btn btn-danger">Esborrar</button>
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
            return confirm("Esteu segur que voleu donar de baixa a aquest client?");
        }
    </script>

    <style>
        /* Header styles */
        #menu {
            background: linear-gradient(to right, #6b46c1, #ed64a6);
            color: white;
            padding: 1.5rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Table styles */
        .table {
            border-collapse: separate;
            border-spacing: 0;
            border-radius: 10px;
            overflow: hidden;
        }

        .table thead {
            background-color: #6b46c1;
            color: white;
        }

        .table-hover tbody tr:hover {
            background-color: #f3e8ff;
        }

        .btn {
            border-radius: 20px;
            padding: 0.5rem 1rem;
        }

        .btn-info {
            background-color: #4a90e2;
        }

        .btn-warning {
            background-color: #f5a623;
        }

        .btn-danger {
            background-color: #d0021b;
        }

        .btn-afegir {
            background-color:rgb(251, 251, 251);
            color: black;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            text-decoration: none;
        }

        .btn-afegir:hover {
            background-color: #f3e8ff;
            color: #6b46c1;
        }
    </style>
@endsection