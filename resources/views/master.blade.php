<!doctype html>
<html lang="en">
    <head>
        <title>TodoMerch</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    </head>

    <body>
    <div id="menu" class="bg-gradient-to-r from-purple-800 to-pink-500 text-white p-6 flex justify-between items-center">
 
        <a href="dashboard" class="text-decoration-none">
            <h1 class="text-3xl font-bold leading-tight text-white">
            MERCH<br>NETIC
            </h1>
        </a>

        <nav class="space-x-6 font-semibold">
            <a href="clients" class="hover:underline">CLIENTES</a>
            <a href="#" class="hover:underline">VENTA/PROPUESTAS</a>
            <a href="productesServeis" class="hover:underline">PRODUCTES</a>
            <a href="#" class="hover:underline">ADMINISTRACIÓN</a>
        </nav>
    </div>
        <header>
            @yield("header")
        </header>
        <main>
            @yield("content")
        </main>
        <footer>
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
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
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.6/holder.min.js"></script>
    </body>


</html>
