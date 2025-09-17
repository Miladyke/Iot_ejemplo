@extends('layout.app')
@section('title', 'Inicio')
@section('content')

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel IoT</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container-fluid">
      <!-- Logo -->
      <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="https://via.placeholder.com/30" alt="Logo" class="me-2">
        <span class="fw-bold">IOT</span>
      </a>
      <!-- Menú -->
      <div class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="#">Inicio</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Tabla</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Formulario</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Encabezado Panel -->
  <div class="container mt-4">
    <div class="p-4 bg-white shadow-sm rounded">
      <div class="mb-2 text-muted small">
        ESP32 - LTE (SIM7670G) • PostgreSQL • Panel demo • Formulario & Tabla
      </div>
      <h3 class="fw-bold">Panel IoT — Monitoreo & Registros</h3>
      <p class="text-muted">
        Captura datos (contactos/actores del proyecto), visualízalos en tabla y prepara el entorno para conectar SENSORES de dispositivos IoT.
      </p>
      <div class="d-flex gap-2">
        <a href="#" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Registrar dato</a>
        <a href="#" class="btn btn-outline-secondary">Ver tabla</a>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</body>
</html>


<div class="container mt-4">
  <!-- Barra de Módulos -->
  <div class="card shadow-sm">
    <div class="card-header bg-light">
      <h5 class="mb-0">Módulos</h5>
    </div>
    <div class="card-body">
      <div class="row text-center">
        
        <!-- Tarjeta 1 -->
        <div class="col-md-4 mb-3">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <div class="mb-2">
                <i class="bi bi-journal-text fs-1 text-primary"></i>
              </div>
              <h5 class="card-title">Gestión de registros</h5>
              <p class="card-text">Crea y lista registros (base para actores, pacientes o dispositivos).</p>
              <a href="#" class="btn btn-outline-primary btn-sm">Entrar</a>
            </div>
          </div>
        </div>

        <!-- Tarjeta 2 -->
        <div class="col-md-4 mb-3">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <div class="mb-2">
                <i class="bi bi-cpu fs-1 text-success"></i>
              </div>
              <h5 class="card-title">Dispositivos IoT</h5>
              <p class="card-text">Registro de dispositivos ESP32/SIM7670G, asignación y estado.</p>
              <a href="#" class="btn btn-outline-success btn-sm">Entrar</a>
            </div>
          </div>
        </div>

        <!-- Tarjeta 3 -->
        <div class="col-md-4 mb-3">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <div class="mb-2">
                <i class="bi bi-graph-up-arrow fs-1 text-danger"></i>
              </div>
              <h5 class="card-title">Graficas</h5>
              <p class="card-text">Gráficas de telemetría (SpO₂, pulso, temperatura) con WebSockets.</p>
              <a href="#" class="btn btn-outline-danger btn-sm">Entrar</a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>



@endsection