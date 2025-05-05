@extends("master")

@section("header")
    <div class="bg-gradient-to-r from-purple-800 to-pink-500 text-white p-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold">MERCH<br>NETIC</h1>
        <nav class="space-x-6 font-semibold">
            <a href="#" class="hover:underline">CLIENTES</a>
            <a href="#" class="hover:underline">VENTA/PROPUESTAS</a>
            <a href="#" class="hover:underline">STOCK</a>
            <a href="#" class="hover:underline">ADMINISTRACIÓN</a>
        </nav>
    </div>
@endsection

@section("content")
    <div class="min-h-screen bg-gradient-to-bl from-purple-200 to-pink-200 flex items-center justify-center">
        <div class="grid grid-cols-2 gap-8 p-10">
            <!-- Clientes -->
            <div class="bg-white/70 rounded-xl shadow-xl p-10 text-center hover:shadow-2xl transition">
                <h4 class="text-2xl font-bold mb-6">Clientes</h4>
                <form action="accederModulo" method="post">
                    @csrf
                    <input type="hidden" name="modulo" value="Clientes">
                    <button type="submit" class="bg-black text-white px-4 py-2 rounded-full">Acceder</button>
                </form>
            </div>
            
            <!-- Venta / propuestas -->
            <div class="bg-white/70 rounded-xl shadow-xl p-10 text-center hover:shadow-2xl transition">
                <h4 class="text-2xl font-bold mb-6">Venta / propuestas</h4>
                <form action="accederModulo" method="post">
                    @csrf
                    <input type="hidden" name="modulo" value="Ventas">
                    <button type="submit" class="bg-black text-white px-4 py-2 rounded-full">Acceder</button>
                </form>
            </div>

            <!-- Administración del sistema -->
            <div class="bg-white/70 rounded-xl shadow-xl p-10 text-center hover:shadow-2xl transition">
                <h4 class="text-2xl font-bold mb-6">Administración del sistema</h4>
                <form action="accederModulo" method="post">
                    @csrf
                    <input type="hidden" name="modulo" value="Administracion">
                    <button type="submit" class="bg-black text-white px-4 py-2 rounded-full">Acceder</button>
                </form>
            </div>

            <!-- Productos / servicios -->
            <div class="bg-white/70 rounded-xl shadow-xl p-10 text-center hover:shadow-2xl transition">
                <h4 class="text-2xl font-bold mb-6">Productos / servicios</h4>
                <form action="accederModulo" method="post">
                    @csrf
                    <input type="hidden" name="modulo" value="Productos">
                    <button type="submit" class="bg-black text-white px-4 py-2 rounded-full">Acceder</button>
                </form>
            </div>
        </div>
    </div>
@endsection