@extends('layouts.app')

@section('title', 'Registrar Sensor')

@section('content')
<div class="max-w-3xl mx-auto">

  <!-- Encabezado -->
  <div class="mb-8 fade-in">
    <div class="flex items-center justify-between">
      <div>
        <h2 class="text-2xl font-bold text-cyan-400 mb-2">
          <i class="fa-solid fa-microchip mr-2"></i>Registrar Nuevo Sensor
        </h2>
        <p class="text-gray-400">Ingresa la información del sensor</p>
      </div>
      <a href="{{ route('sensors.index') }}" class="btn btn-primary">
        <i class="fa-solid fa-arrow-left mr-2"></i>Volver
      </a>
    </div>
  </div>

  <!-- Mensajes de error -->
  @if ($errors->any())
    <div class="bg-red-900 border border-red-700 text-red-200 px-4 py-3 rounded-lg mb-6 fade-in">
      <p class="font-semibold mb-2"><i class="fa-solid fa-exclamation-circle mr-2"></i>Errores en el formulario:</p>
      <ul class="list-disc list-inside text-sm">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <!-- Formulario -->
  <div class="card fade-in" style="animation-delay: 0.1s;">
    <div class="p-8">
      
      <form action="{{ route('sensors.store') }}" method="POST">
        @csrf

        <!-- Nombre del Sensor -->
        <div class="mb-6">
          <label for="name" class="block text-sm font-semibold text-gray-300 mb-2">
            <i class="fa-solid fa-tag mr-1"></i>Nombre del Sensor *
          </label>
          <input 
            type="text" 
            id="name" 
            name="name" 
            value="{{ old('name') }}"
            class="w-full px-4 py-3 bg-slate-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent text-white placeholder-gray-500" 
            placeholder="Ej: Sensor de Temperatura Ambiente"
            required
          >
          @error('name')
            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- Código del Sensor -->
        <div class="mb-6">
          <label for="code" class="block text-sm font-semibold text-gray-300 mb-2">
            <i class="fa-solid fa-barcode mr-1"></i>Código Único *
          </label>
          <input 
            type="text" 
            id="code" 
            name="code" 
            value="{{ old('code') }}"
            class="w-full px-4 py-3 bg-slate-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent text-white placeholder-gray-500" 
            placeholder="Ej: SENS-001 o DHT22-A1"
            required
          >
          <p class="text-xs text-gray-500 mt-1">Este código debe ser único en el sistema</p>
          @error('code')
            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- Abreviatura -->
        <div class="mb-6">
          <label for="abbrev" class="block text-sm font-semibold text-gray-300 mb-2">
            <i class="fa-solid fa-font mr-1"></i>Abreviatura (opcional)
          </label>
          <input 
            type="text" 
            id="abbrev" 
            name="abbrev" 
            value="{{ old('abbrev') }}"
            maxlength="20"
            class="w-full px-4 py-3 bg-slate-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent text-white placeholder-gray-500" 
            placeholder="Ej: TEMP-A1 (máx 20 caracteres)"
          >
          @error('abbrev')
            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- Departamento -->
        <div class="mb-6">
          <label for="id_department" class="block text-sm font-semibold text-gray-300 mb-2">
            <i class="fa-solid fa-building mr-1"></i>Departamento *
          </label>
          <select 
            id="id_department" 
            name="id_department" 
            class="w-full px-4 py-3 bg-slate-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent text-white"
            required
          >
            <option value="">Selecciona un departamento</option>
            @if(isset($departments) && $departments->count() > 0)
              @foreach($departments as $department)
                <option value="{{ $department->id }}" {{ old('id_department') == $department->id ? 'selected' : '' }}>
                  {{ $department->name }}
                </option>
              @endforeach
            @else
              <option value="" disabled>No hay departamentos disponibles</option>
            @endif
          </select>
          @error('id_department')
            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- Estado -->
        <div class="mb-8">
          <label class="block text-sm font-semibold text-gray-300 mb-3">
            <i class="fa-solid fa-toggle-on mr-1"></i>Estado del Sensor
          </label>
          <div class="flex gap-6">
            <label class="flex items-center cursor-pointer">
              <input 
                type="radio" 
                name="status" 
                value="1" 
                {{ old('status', '1') == '1' ? 'checked' : '' }}
                class="mr-2 w-4 h-4 text-cyan-600 bg-slate-800 border-gray-700 focus:ring-cyan-500"
              >
              <span class="text-gray-300">
                <i class="fa-solid fa-check-circle text-green-400 mr-1"></i>Activo
              </span>
            </label>
            <label class="flex items-center cursor-pointer">
              <input 
                type="radio" 
                name="status" 
                value="0" 
                {{ old('status') == '0' ? 'checked' : '' }}
                class="mr-2 w-4 h-4 text-cyan-600 bg-slate-800 border-gray-700 focus:ring-cyan-500"
              >
              <span class="text-gray-300">
                <i class="fa-solid fa-times-circle text-red-400 mr-1"></i>Inactivo
              </span>
            </label>
          </div>
          @error('status')
            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- Botones -->
        <div class="flex gap-4 justify-end">
          <a href="{{ route('sensors.index') }}" class="btn bg-gray-600 hover:bg-gray-700 text-white">
            <i class="fa-solid fa-times mr-2"></i>Cancelar
          </a>
          <button type="submit" class="btn btn-success">
            <i class="fa-solid fa-save mr-2"></i>Guardar Sensor
          </button>
        </div>

      </form>

    </div>
  </div>

  <!-- Información adicional -->
  <div class="mt-6 p-4 bg-slate-800 rounded-lg border border-cyan-900 fade-in" style="animation-delay: 0.2s;">
    <p class="text-xs text-gray-400">
      <i class="fa-solid fa-info-circle mr-2 text-cyan-400"></i>
      Los campos marcados con <span class="text-red-400">*</span> son obligatorios. 
      El código del sensor debe ser único en todo el sistema.
    </p>
  </div>

</div>

@push('css')
<style>
  input:focus, select:focus {
    outline: none;
  }

  input[type="radio"]:checked {
    background-color: #06b6d4;
    border-color: #06b6d4;
  }
</style>
@endpush
@endsection