<!doctype html>
<html lang="en" x-data="{ open: true }" class="h-full">
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
        <style>
            body, html {
                margin: 0;
                height: 100%;
                font-family: sans-serif;
            }

            .topbar {
                height: 60px;
                background: linear-gradient(to right, #6a11cb, #2575fc);
                color: white;
                display: flex;
                align-items: center;
                padding: 0 20px;
                font-size: 20px;
                font-weight: bold;
            }

            .layout {
                display: flex;
                min-height: 100vh;
            }

            .sidebar {
                width: 250px;
                background-color: #2c2c2c;
                color: white;
                padding: 20px;
                transition: all 0.3s ease;
                overflow-y: auto;
                height: 100vh;
                min-height: 100vh;
                position: fixed; /* Fija la barra lateral */
                top: 0;
                left: 0;
                z-index: 1000;
            }

            .sidebar.hidden {
                width: 0;
                padding: 0;
                overflow: hidden;
            }

            .menu-list {
                list-style: none;
                padding: 0;
                margin: 0;
            }

            .menu-title {
                font-size: 1.2rem;
                font-weight: bold;
                margin: 1rem 0 0.5rem;
                color: #f3f3f3;
                border-bottom: 1px solid #444;
                padding-bottom: 0.5rem;
            }

            .menu-link {
                display: block;
                color: #ddd;
                text-decoration: none;
                padding: 0.5rem 0;
                transition: color 0.3s ease, background-color 0.3s ease;
            }

            .menu-link:hover {
                color: white;
                background-color: #444;
                border-radius: 5px;
                padding-left: 10px;
            }

            .content {
                flex-grow: 1;
                background-color: white;
                padding: 20px;
                margin-left: 250px; /* Deja espacio para la sidebar fija */
                transition: all 0.3s ease;
            }

            .toggle-btn {
                background-color: #6b46c1;
                color: white;
                border: none;
                padding: 10px 15px;
                font-size: 18px;
                cursor: pointer;
                border-radius: 5px;
                transition: background-color 0.3s ease;
            }

            .toggle-btn:hover {
                background-color: #5a3aa1;
            }

            #menu {
                display: flex;
                align-items: center;
                justify-content: space-between;
                background: linear-gradient(to right, #6b46c1, #ed64a6);
                color: white;
                padding: 1.5rem 2rem;
            }

            h1 {
                font-size: 2rem;
                font-weight: bold;
                line-height: 1.2;
                margin: 0;
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
                justify-content: center; / Centra horizontalmente /
                align-items: center; / Centra verticalmente /
            }

            .grid {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 2rem; 
            }

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
    </head>

    <body>
        <div id="menu" class="bg-gradient-to-r from-purple-800 to-pink-500 text-white p-6 flex items-center">
            <button class="toggle-btn mr-1" onclick="toggleSidebar()">☰</button>
            <a href="dashboard" class="text-decoration-none">
                <h1 class="text-1 font-bold leading-tight text-white">
                    MERCH<br>NETIC
                </h1>
            </a>
            <nav class="ml-auto space-x-6 font-semibold">
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
        <div class="layout">
            <div id="sidebar" class="sidebar">
                <ul class="menu-list">
                    <li class="menu-title">Dashboard</li>
                    <li><a href="dashboard" class="menu-link">Inicio</a></li>
                    <li class="menu-title">Clientes</li>
                    <li><a href="clients" class="menu-link">Ver clientes</a></li>
                    <li><a href="clients/create" class="menu-link">Añadir clientes</a></li>
                    <li class="menu-title">Ventas/Propuestas</li>
                    <li><a href="#" class="menu-link">Ver ventas</a></li>
                    <li><a href="#" class="menu-link">Añadir ventas</a></li>
                    <li class="menu-title">Productos</li>
                    <li><a href="productesServeis" class="menu-link">Ver productos</a></li>
                    <li><a href="productesServeis/create" class="menu-link">Añadir productos</a></li>
                    <li class="menu-title">Administración</li>
                    <li><a href="/administracio" class="menu-link">Ver administración</a></li>
                    <li><a href="/administracio/create" class="menu-link">Añadir administración</a></li>
                </ul>
            </div>
            <div class="content">
                @yield("content")
            </div>
        </div>
        </main>
        <footer>
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
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
        <script>
            function toggleSidebar() {
                const sidebar = document.getElementById('sidebar');
                sidebar.classList.toggle('hidden');
            }
        </script>
    </body>
</html>
