@extends('layouts.app')

@section('title', 'Panel Tiempo Real')

@section('content')
<div class="space-y-6">

  <!-- Encabezado -->
  <div class="mb-6 fade-in">
    <h2 class="text-2xl font-bold text-red-400 mb-2">Panel de Monitoreo en Tiempo Real</h2>
    <p class="text-gray-400">Telemetría y datos de sensores actualizados en vivo</p>
  </div>

  <!-- Tarjetas de Métricas -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    
    <!-- SpO₂ -->
    <div class="card fade-in">
      <div class="p-6 text-center">
        <div class="flex justify-center mb-4">
          <i class="fa-solid fa-heart-pulse text-5xl text-blue-400"></i>
        </div>
        <h3 class="text-sm uppercase text-gray-400 mb-2">Saturación de Oxígeno</h3>
        <p class="text-5xl font-bold text-blue-400 mb-2" id="spo2-value">98</p>
        <span class="text-sm text-gray-500">%</span>
        <div class="mt-4 pt-4 border-t border-gray-700">
          <p class="text-xs text-gray-400">Rango normal: 95-100%</p>
        </div>
      </div>
    </div>

    <!-- Pulso -->
    <div class="card fade-in" style="animation-delay: 0.1s;">
      <div class="p-6 text-center">
        <div class="flex justify-center mb-4">
          <i class="fa-solid fa-heartbeat text-5xl text-green-400 animate-pulse"></i>
        </div>
        <h3 class="text-sm uppercase text-gray-400 mb-2">Frecuencia Cardíaca</h3>
        <p class="text-5xl font-bold text-green-400 mb-2" id="pulse-value">72</p>
        <span class="text-sm text-gray-500">bpm</span>
        <div class="mt-4 pt-4 border-t border-gray-700">
          <p class="text-xs text-gray-400">Rango normal: 60-100 bpm</p>
        </div>
      </div>
    </div>

    <!-- Temperatura -->
    <div class="card fade-in" style="animation-delay: 0.2s;">
      <div class="p-6 text-center">
        <div class="flex justify-center mb-4">
          <i class="fa-solid fa-temperature-half text-5xl text-red-400"></i>
        </div>
        <h3 class="text-sm uppercase text-gray-400 mb-2">Temperatura Corporal</h3>
        <p class="text-5xl font-bold text-red-400 mb-2" id="temp-value">36.5</p>
        <span class="text-sm text-gray-500">°C</span>
        <div class="mt-4 pt-4 border-t border-gray-700">
          <p class="text-xs text-gray-400">Rango normal: 36.1-37.2°C</p>
        </div>
      </div>
    </div>

  </div>

  <!-- Gráfica de Histórico (Placeholder) -->
  <div class="card fade-in" style="animation-delay: 0.3s;">
    <div class="p-6">
      <h3 class="text-lg font-semibold mb-4 text-cyan-300">
        <i class="fa-solid fa-chart-line mr-2"></i>Histórico de Telemetría
      </h3>
      <div class="bg-slate-800 rounded-lg p-8 text-center">
        <i class="fa-solid fa-chart-area text-6xl text-gray-600 mb-4"></i>
        <p class="text-gray-400">Gráfica de datos históricos (próximamente)</p>
        <p class="text-xs text-gray-500 mt-2">Integración con Chart.js o similar</p>
      </div>
    </div>
  </div>

  <!-- Estado de Sensores -->
  <div class="card fade-in" style="animation-delay: 0.4s;">
    <div class="p-6">
      <h3 class="text-lg font-semibold mb-4 text-cyan-300">
        <i class="fa-solid fa-plug mr-2"></i>Estado de Sensores
      </h3>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        
        <div class="bg-slate-800 rounded-lg p-4 flex items-center justify-between">
          <div>
            <p class="text-sm text-gray-400">Sensor SPO2-01</p>
            <p class="text-xs text-green-400 mt-1">● Conectado</p>
          </div>
          <i class="fa-solid fa-check-circle text-2xl text-green-400"></i>
        </div>

        <div class="bg-slate-800 rounded-lg p-4 flex items-center justify-between">
          <div>
            <p class="text-sm text-gray-400">Sensor PULSE-01</p>
            <p class="text-xs text-green-400 mt-1">● Conectado</p>
          </div>
          <i class="fa-solid fa-check-circle text-2xl text-green-400"></i>
        </div>

        <div class="bg-slate-800 rounded-lg p-4 flex items-center justify-between">
          <div>
            <p class="text-sm text-gray-400">Sensor TEMP-01</p>
            <p class="text-xs text-green-400 mt-1">● Conectado</p>
          </div>
          <i class="fa-solid fa-check-circle text-2xl text-green-400"></i>
        </div>

      </div>
    </div>
  </div>

  <!-- Botón de actualización -->
  <div class="text-center fade-in" style="animation-delay: 0.5s;">
    <button onclick="refreshData()" class="btn btn-primary">
      <i class="fa-solid fa-rotate mr-2"></i>Actualizar datos
    </button>
  </div>

</div>

@push('scripts')
<script>
  // Simulación de actualización de datos en tiempo real
  function refreshData() {
    // SpO₂: 95-100%
    const spo2 = Math.floor(Math.random() * 6) + 95;
    document.getElementById('spo2-value').textContent = spo2;

    // Pulso: 60-100 bpm
    const pulse = Math.floor(Math.random() * 41) + 60;
    document.getElementById('pulse-value').textContent = pulse;

    // Temperatura: 36.0-37.5°C
    const temp = (Math.random() * 1.5 + 36).toFixed(1);
    document.getElementById('temp-value').textContent = temp;

    // Animación de actualización
    ['spo2-value', 'pulse-value', 'temp-value'].forEach(id => {
      const el = document.getElementById(id);
      el.classList.add('scale-110', 'text-yellow-400');
      setTimeout(() => {
        el.classList.remove('scale-110', 'text-yellow-400');
      }, 300);
    });
  }

  // Auto-refresh cada 5 segundos (opcional)
  // setInterval(refreshData, 5000);
</script>
@endpush

@push('css')
<style>
  .card {
    transition: all 0.3s ease;
  }

  @keyframes pulse {
    0%, 100% {
      opacity: 1;
    }
    50% {
      opacity: 0.7;
    }
  }

  .animate-pulse {
    animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
  }
</style>
@endpush
@endsection