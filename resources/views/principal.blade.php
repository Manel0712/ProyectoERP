@extends("master")

@section("header")
@endsection

@section("content")
    <div class="min-h-screen bg-gradient-to-bl from-purple-200 to-pink-200 flex items-start justify-end p-10">
        <div class="grid grid-cols-2 gap-8 w-full max-w-4x1">
            <!-- Clientes -->
            <div id="opcion" class="bg-white/70 rounded-xl shadow-xl p-10 text-center hover:shadow-2xl transition">
                <h4 class="text-2xl font-bold mb-6">Clientes</h4>
                <form action="clients" method="get">
                    @csrf
                    <button type="submit" class="bg-black text-white px-4 py-2 rounded-full">Acceder</button>
                </form>
            </div>

            <!-- Venta / propuestas -->
            <div id="opcion" class="bg-white/70 rounded-xl shadow-xl p-10 text-center hover:shadow-2xl transition">
                <h4 class="text-2xl font-bold mb-6">Venta / propuestas</h4>
                <form action="accederModulo" method="post">
                    @csrf
                    <input type="hidden" name="modulo" value="Ventas">
                    <button type="submit" class="bg-black text-white px-4 py-2 rounded-full">Acceder</button>
                </form>
            </div>

            <!-- Administración del sistema -->
            <div id="opcion" class="bg-white/70 rounded-xl shadow-xl p-10 text-center hover:shadow-2xl transition">
                <h4 class="text-2xl font-bold mb-6">Administración del sistema</h4>
                <form action="accederModulo" method="post">
                    @csrf
                    <input type="hidden" name="modulo" value="Administracion">
                    <button type="submit" class="bg-black text-white px-4 py-2 rounded-full">Acceder</button>
                </form>
            </div>

            <!-- Productos / servicios -->
            <div id="opcion" class="bg-white/70 rounded-xl shadow-xl p-10 text-center hover:shadow-2xl transition">
                <h4 class="text-2xl font-bold mb-6">Productos / servicios</h4>
                <form action="productesServeis" method="get">
                    @csrf
                    <button type="submit" class="bg-black text-white px-4 py-2 rounded-full">Acceder</button>
                </form>
            </div>
        </div>
    </div>


    <style>
        /* Estilo del encabezado */
        #menu{
            background: linear-gradient(to right, #6b46c1, #ed64a6);
            color: white;
            padding: 1.5rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        h1 {
            font-size: 2rem;
            font-weight: bold;
            line-height: 1.2;
        
        }

        nav {
            display: flex;
            gap: 1.5rem;
            font-weight: 600;
            font-size: 0.9rem;
        }

        nav a {
            color: white;
            text-decoration: none;
            transition: text-decoration 0.3s ease;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .min-h-screen {
            display: flex;
            justify-content: center; /* Centra horizontalmente */
            align-items: center; /* Centra verticalmente */
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem; 
        }

        /* Opciones */
        #opcion {
            background: rgba(255, 255, 255, 0.7);
            border-radius: 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 2.5rem;
            text-align: center;
            margin-top: 3rem;
            transition: transform 0.5s ease;
            transition: box-shadow 0.5s ease;
            width: 80%;
        }

        #opcion:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            transform: translateY(-5px);

        }

    </style>
@endsection()