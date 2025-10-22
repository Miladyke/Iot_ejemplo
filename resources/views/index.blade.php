<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel IoT</title>

    <!-- Fuente moderna -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="background-overlay"></div>

    <header class="hero-header">
        <img src="{{ asset('assets/icono_iot.png') }}" alt="Logo IoT" class="hero-logo">
        <h1>Panel IoT</h1>
        <p>Monitoreo inteligente de estaciones, sensores y métricas en tiempo real</p>
    </header>

    <nav class="navbar">
        <ul>
            <li><a href="/">Inicio</a></li>
            <li><a href="{{ route('stations.index') }}">Estaciones</a></li>
            <li><a href="{{ route('sensors.index') }}">Sensores</a></li>
            <li><a href="#">Configuración</a></li>
        </ul>
    </nav>

    <section class="modules">
        <h2>Módulos del sistema</h2>

        <div class="cards">
            <div class="card">
                <img src="{{ asset('assets/icono_iot.png') }}" alt="Gestión de registros">
                <h3>Gestión de registros</h3>
                <p>Administre actores, pacientes o dispositivos de manera centralizada.</p>
                <button class="btn-primary">Entrar</button>
            </div>

            <div class="card">
                <img src="{{ asset('assets/icono_iot.png') }}" alt="Dispositivos IoT">
                <h3>Dispositivos IoT</h3>
                <p>Registre y gestione dispositivos ESP32/SIM7670G, asignación y estado.</p>
                <a href="{{ route('sensors.index') }}" class="btn-secondary">Entrar</a>
            </div>

            <div class="card">
                <img src="{{ asset('assets/icono_iot.png') }}" alt="Panel tiempo real">
                <h3>Panel tiempo real</h3>
                <p>Visualice gráficas de telemetría en tiempo real (SpO₂, pulso, temperatura).</p>
                <a href="{{ route('stations.index') }}" class="btn-tertiary">Entrar</a>
            </div>
        </div>
    </section>

    <footer>
        <p>© {{ date('Y') }} Panel IoT — Desarrollado para monitoreo inteligente</p>
    </footer>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
