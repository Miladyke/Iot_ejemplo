@extends('layouts.app')

@section('title', 'Gestión de Sensores')

@section('content')
<div class="space-y-6">

  <!-- Mensajes de éxito -->
  @if(session('success'))
    <div class="bg-green-900 border border-green-700 text-green-200 px-4 py-3 rounded-lg fade-in">
      <i class="fa-solid fa-check-circle mr-2"></i>{{ session('success') }}
    </div>
  @endif

  <!-- Encabezado con botón de agregar -->
  <div class="flex justify-between items-center mb-8 fade-in">
    <div>
      <h2 class="text-2xl font-bold text-cyan-400 mb-2">
        <i class="fa-solid fa-microchip mr-2"></i>Gestión de Sensores
      </h2>
      <p class="text-gray-400">Administra todos los sensores registrados en el sistema</p>
    </div>
    <a href="{{ route('sensors.create') }}" class="btn btn-success">
      <i class="fa-solid fa-plus mr-2"></i>Nuevo Sensor
    </a>
  </div>

  <!-- Estadísticas rápidas -->
  <div class="grid grid-cols-1 md:grid-cols-4 gap-6 fade-in" style="animation-delay: 0.1s;">
    
    <div class="card p-6">
      <div class="flex items-center justify-between">
        <div>
          <p class="text-sm text-gray-400 mb-1">Total Sensores</p>
          <p class="text-3xl font-bold text-cyan-400">{{ $sensors->count() ?? 0 }}</p>
        </div>
        <i class="fa-solid fa-microchip text-4xl text-cyan-400 opacity-20"></i>
      </div>
    </div>

    <div class="card p-6">
      <div class="flex items-center justify-between">
        <div>
          <p class="text-sm text-gray-400 mb-1">Activos</p>
          <p class="text-3xl font-bold text-green-400">{{ $sensors->where('status', true)->count() ?? 0 }}</p>
        </div>
        <i class="fa-solid fa-circle-check text-4xl text-green-400 opacity-20"></i>
      </div>
    </div>

    <div class="card p-6">
      <div class="flex items-center justify-between">
        <div>
          <p class="text-sm text-gray-400 mb-1">Inactivos</p>
          <p class="text-3xl font-bold text-red-400">{{ $sensors->where('status', false)->count() ?? 0 }}</p>
        </div>
        <i class="fa-solid fa-circle-xmark text-4xl text-red-400 opacity-20"></i>
      </div>
    </div>

    <div class="card p-6">
      <div class="flex items-center justify-between">
        <div>
          <p class="text-sm text-gray-400 mb-1">Departamentos</p>
          <p class="text-3xl font-bold text-blue-400">{{ $sensors->unique('id_department')->count() ?? 0 }}</p>
        </div>
        <i class="fa-solid fa-building text-4xl text-blue-400 opacity-20"></i>
      </div>
    </div>

  </div>

  <!-- Tabla de sensores -->
  <div class="card fade-in" style="animation-delay: 0.2s;">
    <div class="p-6">
      
      <!-- Buscador y filtros -->
      <div class="mb-6 flex gap-4">
        <div class="flex-1">
          <input 
            type="text" 
            id="searchInput"
            placeholder="Buscar por nombre o código..." 
            class="w-full px-4 py-2 bg-slate-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-cyan-500 text-white placeholder-gray-500"
          >
        </div>
        <select id="filterStatus" class="px-4 py-2 bg-slate-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-cyan-500 text-white">
          <option value="">Todos los estados</option>
          <option value="1">Activos</option>
          <option value="0">Inactivos</option>
        </select>
      </div>

      <!-- Tabla -->
      <div class="overflow-x-auto">
        <table class="w-full" id="sensorsTable">
          <thead>
            <tr class="border-b border-gray-700">
              <th class="text-left py-4 px-4 text-sm font-semibold text-gray-300">ID</th>
              <th class="text-left py-4 px-4 text-sm font-semibold text-gray-300">Código</th>
              <th class="text-left py-4 px-4 text-sm font-semibold text-gray-300">Nombre</th>
              <th class="text-left py-4 px-4 text-sm font-semibold text-gray-300">Abreviatura</th>
              <th class="text-left py-4 px-4 text-sm font-semibold text-gray-300">Departamento</th>
              <th class="text-left py-4 px-4 text-sm font-semibold text-gray-300">Estado</th>
              <th class="text-left py-4 px-4 text-sm font-semibold text-gray-300">Fecha Creación</th>
              <th class="text-left py-4 px-4 text-sm font-semibold text-gray-300">Acciones</th>
            </tr>
          </thead>
          <tbody>
            
            @forelse($sensors as $sensor)
            <tr class="border-b border-gray-800 hover:bg-slate-800 transition">
              <td class="py-4 px-4 text-sm font-mono">{{ $sensor->id }}</td>
              <td class="py-4 px-4">
                <span class="px-3 py-1 bg-slate-700 rounded-md text-xs font-mono text-cyan-300">
                  {{ $sensor->code }}
                </span>
              </td>
              <td class="py-4 px-4">
                <div class="flex items-center gap-2">
                  <i class="fa-solid fa-microchip text-cyan-400"></i>
                  <span class="font-semibold">{{ $sensor->name }}</span>
                </div>
              </td>
              <td class="py-4 px-4 text-sm text-gray-400">
                {{ $sensor->abbrev ?? '-' }}
              </td>
              <td class="py-4 px-4 text-sm text-gray-400">
                <i class="fa-solid fa-building text-blue-400 mr-1"></i>
                {{ $sensor->department->name ?? 'Sin departamento' }}
              </td>
              <td class="py-4 px-4">
                @if($sensor->status)
                  <span class="px-3 py-1 bg-green-900 text-green-300 rounded-full text-xs font-semibold">
                    <i class="fa-solid fa-circle text-xs mr-1"></i>Activo
                  </span>
                @else
                  <span class="px-3 py-1 bg-red-900 text-red-300 rounded-full text-xs font-semibold">
                    <i class="fa-solid fa-circle text-xs mr-1"></i>Inactivo
                  </span>
                @endif
              </td>
              <td class="py-4 px-4 text-sm text-gray-400">
                {{ $sensor->created_at->format('d/m/Y') }}
              </td>
              <td class="py-4 px-4">
                <div class="flex gap-2">
                  <a href="{{ route('sensors.show', $sensor->id) }}" class="text-blue-400 hover:text-blue-300" title="Ver detalles">
                    <i class="fa-solid fa-eye"></i>
                  </a>
                  <a href="{{ route('sensors.edit', $sensor->id) }}" class="text-yellow-400 hover:text-yellow-300" title="Editar">
                    <i class="fa-solid fa-edit"></i>
                  </a>
                  <form action="{{ route('sensors.destroy', $sensor->id) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de eliminar este sensor?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-400 hover:text-red-300" title="Eliminar">
                      <i class="fa-solid fa-trash"></i>
                    </button>
                  </form>
                </div>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="8" class="py-12 text-center text-gray-500">
                <i class="fa-solid fa-inbox text-5xl mb-4 opacity-20"></i>
                <p class="text-lg mb-2">No hay sensores registrados</p>
                <a href="{{ route('sensors.create') }}" class="text-cyan-400 hover:text-cyan-300">
                  <i class="fa-solid fa-plus mr-1"></i>Agregar el primer sensor
                </a>
              </td>
            </tr>
            @endforelse

          </tbody>
        </table>
      </div>

      <!-- Paginación -->
      @if(method_exists($sensors, 'hasPages') && $sensors->hasPages())
      <div class="mt-6">
        {{ $sensors->links() }}
      </div>
      @endif

    </div>
  </div>

</div>

@push('scripts')
<script>
  // Búsqueda en tiempo real
  document.getElementById('searchInput').addEventListener('keyup', function(e) {
    const searchTerm = e.target.value.toLowerCase();
    const rows = document.querySelectorAll('#sensorsTable tbody tr');
    
    rows.forEach(row => {
      const text = row.textContent.toLowerCase();
      row.style.display = text.includes(searchTerm) ? '' : 'none';
    });
  });

  // Filtro por estado
  document.getElementById('filterStatus').addEventListener('change', function(e) {
    const filterValue = e.target.value;
    const rows = document.querySelectorAll('#sensorsTable tbody tr');
    
    rows.forEach(row => {
      if (filterValue === '') {
        row.style.display = '';
      } else {
        const statusCell = row.querySelector('td:nth-child(6)');
        const isActive = statusCell.textContent.includes('Activo');
        const shouldShow = (filterValue === '1' && isActive) || (filterValue === '0' && !isActive);
        row.style.display = shouldShow ? '' : 'none';
      }
    });
  });
</script>
@endpush

@push('css')
<style>
  table button, table a {
    padding: 0.5rem;
    transition: all 0.2s ease;
  }

  table button:hover, table a:hover {
    transform: scale(1.2);
  }
</style>
@endpush
@endsection