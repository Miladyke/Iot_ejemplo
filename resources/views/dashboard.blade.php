@extends('layouts.app')

@section('title', 'Panel de Control IoT')

@section('content')
<div class="space-y-8">

  <!-- Encabezado -->
  <div class="text-center mb-8 fade-in">
    <h1 class="text-3xl font-bold text-cyan-300 mb-2">Panel de Control IoT</h1>
    <p class="text-sm text-gray-400">Monitoreo en tiempo real de sensores y dispositivos conectados</p>
  </div>

  <!-- Estadísticas -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="stat-card fade-in">
      <h2 class="text-sm uppercase text-gray-400 mb-2">Sensores en línea</h2>
      <p class="text-4xl font-bold text-cyan-400">3</p>
    </div>

    <div class="stat-card fade-in" style="animation-delay: 0.1s;">
      <h2 class="text-sm uppercase text-gray-400 mb-2">Última sincronización</h2>
      <p class="text-2xl font-semibold text-sky-400">Hace 2 min</p>
    </div>

    <div class="stat-card fade-in" style="animation-delay: 0.2s;">
      <h2 class="text-sm uppercase text-gray-400 mb-2">Base de datos</h2>
      <p class="text-2xl font-semibold text-teal-400">MySQL</p>
    </div>
  </div>

  <!-- Módulos -->
  <div class="fade-in" style="animation-delay: 0.3s;">
    <h3 class="text-lg font-semibold mt-8 mb-4 text-cyan-300">Módulos</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

      <!-- Sensores de Humedad -->
      <div class="module-card hover:scale-[1.03] transition-transform duration-300">
        <div class="image-container">
          <img src="{{ asset('images/registros-bg.jpg') }}" alt="Sensores de Humedad" class="image-bg">
        </div>
        <div class="module-content">
          <i class="fa-solid fa-droplet text-3xl text-cyan-400 mb-3"></i>
          <h4 class="text-lg font-semibold mb-2 text-white">Gestion de registros</h4>
          <p class="text-sm text-gray-400 mb-4">Visualiza y administra sensores de humedad y temperatura.</p>
          <a href="{{ route('sensors.index') }}" class="module-btn bg-cyan-500 hover:bg-cyan-600">Entrar</a>
        </div>
      </div>

      <!-- Estaciones IoT -->
      <div class="module-card hover:scale-[1.03] transition-transform duration-300">
        <div class="image-container">
          <img src="{{ asset('images/iot-bg.jpg') }}" alt="Estaciones IoT" class="image-bg">
        </div>
        <div class="module-content">
          <i class="fa-solid fa-satellite-dish text-3xl text-green-400 mb-3"></i>
          <h4 class="text-lg font-semibold mb-2 text-white">Dispositivos IoT</h4>
          <p class="text-sm text-gray-400 mb-4">Registra y administra estaciones ESP32/SIM7670.</p>
          <a href="{{ route('stations.index') }}" class="module-btn bg-green-500 hover:bg-green-600">Entrar</a>
        </div>
      </div>

      <!-- Panel tiempo real -->
      <div class="module-card hover:scale-[1.03] transition-transform duration-300">
        <div class="image-container">
          <img src="{{ asset('images/panel-bg.jpg') }}" alt="Panel tiempo real" class="image-bg">
        </div>
        <div class="module-content">
          <i class="fa-solid fa-chart-line text-3xl text-red-400 mb-3"></i>
          <h4 class="text-lg font-semibold mb-2 text-white">Panel tiempo real</h4>
          <p class="text-sm text-gray-400 mb-4">Gráficas de telemetría (SpO₂, pulso, temperatura).</p>
          <a href="{{ route('panel') }}" class="module-btn bg-red-500 hover:bg-red-600">Entrar</a>
        </div>
      </div>

    </div>
  </div>
</div>

@push('css')
<style>
  .stat-card {
    background-color: rgba(30, 41, 59, 0.9);
    border-radius: 1rem;
    padding: 1.5rem;
    box-shadow: 0 4px 15px rgba(0, 255, 255, 0.05);
    backdrop-filter: blur(6px);
  }

  .module-card {
    background-color: rgba(30, 41, 59, 0.85);
    border-radius: 1rem;
    overflow: hidden;
    box-shadow: 0 4px 25px rgba(0, 255, 255, 0.08);
    backdrop-filter: blur(10px);
    display: flex;
    flex-direction: column;
  }

  .image-container {
    height: 130px;
    overflow: hidden;
    position: relative;
  }

  .image-bg {
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: 0.6;
    transition: transform 0.5s ease;
  }

  .module-card:hover .image-bg {
    transform: scale(1.1);
    opacity: 0.8;
  }

  .module-content {
    padding: 1.5rem;
    text-align: center;
  }

  .module-btn {
    display: inline-block;
    color: #fff;
    font-weight: 500;
    padding: 0.5rem 1.5rem;
    border-radius: 0.5rem;
    transition: background 0.3s ease, transform 0.2s ease;
  }

  .module-btn:hover {
    transform: translateY(-2px);
  }

  .fade-in {
    opacity: 0;
    animation: fadeInUp 0.6s forwards;
  }

  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translateY(20px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
</style>
@endpush
@endsection