<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'IoT Panel')</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/a2b0b5c6f9.js" crossorigin="anonymous"></script>

  <style>
    body {
      background-color: #0f172a;
      color: #e2e8f0;
      font-family: 'Inter', sans-serif;
      overflow-x: hidden;
    }

    /* Sidebar */
    .sidebar {
      background-color: #1e293b;
      height: 100vh;
      transition: width 0.3s ease;
    }

    .sidebar:hover {
      width: 16rem;
    }

    .sidebar a {
      display: flex;
      align-items: center;
      gap: 1rem;
      padding: 0.9rem 1rem;
      color: #e2e8f0;
      text-decoration: none;
      transition: all 0.2s ease;
    }

    .sidebar a:hover {
      background-color: #334155;
      color: #38bdf8;
      transform: translateX(4px);
    }

    .sidebar i {
      min-width: 1.5rem;
      text-align: center;
    }

    /* Navbar */
    .navbar {
      background-color: #1e293b;
      border-bottom: 1px solid #334155;
      position: sticky;
      top: 0;
      z-index: 50;
    }

    .navbar-link {
      padding: 0.5rem 1rem;
      border-radius: 0.5rem;
      transition: all 0.3s ease;
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
    }

    .navbar-link:hover {
      background-color: #334155;
      color: #38bdf8;
      transform: translateY(-2px);
    }

    /* Tarjetas */
    .card {
      background: #1e293b;
      border: 1px solid #334155;
      border-radius: 1rem;
      transition: all 0.3s ease;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(56, 189, 248, 0.25);
    }

    /* Botones */
    .btn {
      border-radius: 0.5rem;
      font-weight: 600;
      transition: all 0.3s ease;
      padding: 0.5rem 1.2rem;
      display: inline-block;
    }

    .btn-primary { background-color: #0ea5e9; color: #fff; }
    .btn-primary:hover { background-color: #0284c7; transform: scale(1.05); }

    .btn-success { background-color: #22c55e; color: #fff; }
    .btn-success:hover { background-color: #16a34a; transform: scale(1.05); }

    .btn-danger { background-color: #ef4444; color: #fff; }
    .btn-danger:hover { background-color: #dc2626; transform: scale(1.05); }

    /* Fade In */
    .fade-in {
      animation: fadeIn 0.6s ease forwards;
      opacity: 0;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }

  </style>

  @stack('css')
</head>
<body class="flex">

  <!-- Sidebar -->
  <aside class="sidebar w-20 md:w-64 fixed left-0 top-0 flex flex-col justify-between">
    <div>
      <div class="p-4 flex items-center gap-3">
        <i class="fa-solid fa-microchip text-cyan-400 text-2xl"></i>
        <span class="hidden md:block font-semibold text-lg">IoT Panel</span>
      </div>

      <nav class="mt-6">
        <a href="/" class="hover:bg-sky-700"><i class="fa-solid fa-house"></i><span class="hidden md:block">Inicio</span></a>
        <a href="/tabla"><i class="fa-solid fa-table"></i><span class="hidden md:block">Tabla</span></a>
        <a href="/dispositivos"><i class="fa-solid fa-satellite-dish"></i><span class="hidden md:block">Dispositivos</span></a>
        <a href="/panel"><i class="fa-solid fa-chart-line"></i><span class="hidden md:block">Panel tiempo real</span></a>
      </nav>
    </div>

    <div class="text-center text-xs text-gray-500 mb-4">
      <p>Programación Estadística IoT © 2025</p>
    </div>
  </aside>

  <!-- Contenido principal -->
  <div class="flex-1 ml-20 md:ml-64">
    
    <!-- Navbar -->
    <header class="navbar py-4 px-6 flex justify-between items-center shadow">
      <h1 class="text-lg font-semibold tracking-wide text-cyan-400">@yield('title')</h1>
      <div class="flex gap-4">
        <a href="{{ route('stations.index') }}" class="navbar-link hover:text-cyan-400 transition">
          <i class="fa-solid fa-database"></i> Estaciones
        </a>
        <a href="{{ route('sensors.create') }}" class="navbar-link hover:text-cyan-400 transition">
          <i class="fa-solid fa-droplet"></i> Sensores
        </a>
      </div>
    </header>

    <!-- Contenido dinámico -->
    <main class="p-6 fade-in">
      @yield('content')
    </main>

  </div>

  @stack('scripts')
</body>
</html>