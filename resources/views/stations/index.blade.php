@extends('layouts.app')

@section('title', 'Panel IoT')

@section('content')
<div class="text-center mb-12">
    <img src="{{ asset('assets/icono_iot.png') }}" alt="Logo IoT" class="mx-auto w-20 mb-4 drop-shadow-lg">
    <h1 class="text-4xl font-bold text-cyan-400 mb-2">Panel IoT</h1>
    <p class="text-gray-400">Monitoreo inteligente de estaciones, sensores y métricas en tiempo real</p>
</div>

<h2 class="text-2xl font-semibold text-cyan-300 mb-6 text-center">Módulos del sistema</h2>

<div class="grid grid-cols-1 md:grid-cols-3 gap-10 px-6">
    <!-- Gestión de registros -->
    <div class="card p-8 text-center flex flex-col items-center justify-between">
        <img src="{{ asset('assets/icono_iot.png') }}" alt="Gestión de registros" class="mx-auto w-16 mb-5">
        <div>
            <h3 class="text-xl font-semibold text-cyan-400 mb-2">Gestión de registros</h3>
            <p class="text-gray-400 mb-4">Administre actores, pacientes o dispositivos de manera centralizada.</p>
        </div>
        <a href="#" class="btn btn-primary">Entrar</a>
    </div>

    <!-- Dispositivos IoT -->
    <div class="card p-8 text-center flex flex-col items-center justify-between">
        <img src="{{ asset('assets/icono_iot.png') }}" alt="Dispositivos IoT" class="mx-auto w-16 mb-5">
        <div>
            <h3 class="text-xl font-semibold text-cyan-400 mb-2">Dispositivos IoT</h3>
            <p class="text-gray-400 mb-4">Registre y gestione dispositivos ESP32/SIM7670G, asignación y estado.</p>
        </div>
        <a href="{{ url('/stations') }}" class="btn btn-success">Entrar</a>
    </div>

    <!-- Panel de sensores -->
    <div class="card p-8 text-center flex flex-col items-center justify-between">
        <img src="{{ asset('assets/icono_iot.png') }}" alt="Panel tiempo real" class="mx-auto w-16 mb-5">
        <div>
            <h3 class="text-xl font-semibold text-cyan-400 mb-2">Panel de sensores</h3>
            <p class="text-gray-400 mb-4">Visualice y registre sensores, graficando métricas en tiempo real.</p>
        </div>
        <a href="{{ url('/sensors') }}" class="btn btn-danger">Entrar</a>
    </div>
</div>

<div class="mt-16 text-center text-gray-500 text-sm">
    <p>© {{ date('Y') }} Panel IoT — Desarrollado para monitoreo inteligente</p>
</div>
@endsection
