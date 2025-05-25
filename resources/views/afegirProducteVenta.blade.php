@extends("master")

@section("header")
    @if ($estat)
        <div class="alert alert-success text-center" role="alert">
            <p class="text-center">Producte afegit correctament a la venta corresponent</p>
        </div>
    @endif
    <div class="text-center my-4">
        <h1 class="display-4">AFEGIR PRODUCTE A VENTA</h1>
    </div>
@endsection

@section("content")
    <div class="container my-5">
        <div class="card shadow">
            <div class="card-body">
                <form action="/añadirDetalleVenta/{{ $DetalleVenta['proposalID'] }}" method="POST">
                    @csrf
                    <div>
                        <label for="product" class="form-label">Producte</label>
                        <select id="product" name="productID" class="form-control" required>
                            @foreach($productos as $producto)
                                <option value="{{ $producto['id'] }}" stock="{{ $producto['stock'] }}">{{ $producto["name"] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="quantity-sold" class="form-label">Quantitat</label>
                        <input type="number" id="quantity-sold" name="quantity-sold" class="form-control" required min="1" max="{{ $productos[0]['stock'] }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Afegir Producte a Venta</button>
                    <a href="/DetalleVenta/{{ $DetalleVenta['proposalID'] }}" class="btn btn-primary">
                        Sortir
                    </a>
                </form>
            </div>
        </div>
    </div>
    <script>
        const select = document.getElementById('product');
        const cantidadInput = document.getElementById('quantity-sold');

        select.addEventListener('change', function () {
            const selectedOption = select.options[select.selectedIndex];
            const stock = selectedOption.getAttribute('stock');

            if (stock) {
                console.log("bien");
                cantidadInput.max = stock;
            } else {
                console.log("mal")
                cantidadInput.removeAttribute('max');
            }
        });
    </script>
@endsection