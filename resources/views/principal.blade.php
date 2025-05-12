@extends("master")

@section("header")
    <header class="bg-gradient-to-r from-purple-900 to-purple-700 text-white px-10 py-6 flex justify-between items-center shadow-md">
        <div class="text-left leading-tight">
            <h1 class="text-3xl font-extrabold tracking-tight">MERCH</h1>
            <h1 class="text-3xl font-extrabold tracking-tight">NETIC</h1>
        </div>
        <nav class="space-x-8 text-lg font-semibold uppercase tracking-wide">
            <a href="#" class="hover:underline">Clientes</a>
            <a href="#" class="hover:underline">Venta/Propuestas</a>
            <a href="#" class="hover:underline">Stock</a>
            <a href="#" class="hover:underline">Administración</a>
        </nav>
    </header>
@endsection

@section("content")
    <main class="min-h-screen bg-gradient-to-br from-purple-200 via-pink-200 to-blue-100 flex items-center justify-center font-sans">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 p-10 max-w-5xl w-full">
            <div class="bg-white/80 backdrop-blur-md rounded-xl p-10 shadow-lg hover:shadow-xl transition text-center">
                <h4 class="text-2xl font-bold mb-6 text-black">Clientes</h4>
                <form action="clients" method="get">
                    @csrf
                    <button type="submit" class="bg-black text-white px-6 py-2 rounded-full text-lg">Acceder</button>
                </form>
            </div>

            <div class="bg-white/80 backdrop-blur-md rounded-xl p-10 shadow-lg hover:shadow-xl transition text-center">
                <h4 class="text-2xl font-bold mb-6 text-black">Venta / propuestas</h4>
                <form action="accederModulo" method="get">
                    @csrf
                    <input type="hidden" name="modulo" value="Ventas">
                    <button type="submit" class="bg-black text-white px-6 py-2 rounded-full text-lg">Acceder</button>
                </form>
            </div>

            <div class="bg-white/80 backdrop-blur-md rounded-xl p-10 shadow-lg hover:shadow-xl transition text-center">
                <h4 class="text-2xl font-bold mb-6 text-black">Administración del sistema</h4>
                <form action="accederModulo" method="get">
                    @csrf
                    <input type="hidden" name="modulo" value="Administracion">
                    <button type="submit" class="bg-black text-white px-6 py-2 rounded-full text-lg">Acceder</button>
                </form>
            </div>

            <div class="bg-white/80 backdrop-blur-md rounded-xl p-10 shadow-lg hover:shadow-xl transition text-center">
                <h4 class="text-2xl font-bold mb-6 text-black">Productos / servicios</h4>
                <form action="productesServeis" method="get">
                    @csrf
                    <button type="submit" class="bg-black text-white px-6 py-2 rounded-full text-lg">Acceder</button>
                </form>
            </div>
        </div>
    </main>
@endsection