@extends("master")

@section("header")
    <h1>TODOMERCH</h1>
@endsection

@section("content")
    forelse($modulos in $modulo)
        <div
            class="card text-white bg-primary"
        >
            <img class="card-img-top" src="holder.js/100px180/" alt="Title" />
            <div class="card-body">
                <h4 class="card-title">{{ $modulo->nombre }}</h4>
                <p class="card-text">{{ $modulo->descripcion }}</p>
                @if ($modulo->estado=="")
                    <form action="descargarModulo" method="get">
                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            Descargar
                        </button>
                    </form>
                @elseif ($modulo->estado=="No activo")
                    <form action="activarModulo" method="get">
                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            Activar
                        </button>
                    </form>
                    <form action="desinstalarModulo" method="get">
                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            Desinstalar
                        </button>
                    </form>
                @elseif ($modulo->estado=="Activo")
                    <form action="desactivarModulo" method="get">
                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            Desactivar
                        </button>
                    </form>
                    <form action="accederModulo" method="post">
                        <input class="d-none" name="modulo" value="{{ $modulo->nombre }}">
                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            Acceder
                        </button>
                    </form>
                @endif
            </div>
        </div>
    @empty
        <p>No hay modulos disponibles<br/>Si crees que se trata de un error contacta con el administrador</p>
    @endforelse
@endsection