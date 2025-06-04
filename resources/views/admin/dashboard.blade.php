<x-app-layout>
    <x-slot name="title">Panel de Administración</x-slot>

    <div class="admin-container">
        <h1 class="admin-title">Panel de Administración</h1>

        <div class="admin-summary">
            <div class="summary-card">
                <h2 class="summary-title">Usuarios registrados</h2>
                <p class="summary-count">{{ $usersCount }}</p>
            </div>

            <div class="summary-card">
                <h2 class="summary-title">Motos publicadas</h2>
                <p class="summary-count">{{ $motosCount }}</p>
            </div>
        </div>

        {{-- Formulario de búsqueda --}}
        <form method="GET" action="{{ route('admin.dashboard') }}" class="search-form">
            <input
                type="text"
                name="search"
                value="{{ old('search', $search) }}"
                placeholder="Buscar moto por año, fabricante o modelo"
                class="search-input"
            />
            <button type="submit" class="search-button">Buscar</button>
        </form>

        <h2 class="moto-section-title">Últimas motos</h2>
        <table class="moto-table">
            <thead>
                <tr>
                    <th class="table-header">Título</th>
                    <th class="table-header">Usuario</th>
                    <th class="table-header">Fecha</th>
                    <th class="table-header">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($motos as $moto)
                    <tr class="moto-row">
                        <td class="table-cell">{{ $moto->getTitle() }}</td>
                        <td class="table-cell">{{ $moto->owner->name }}</td>
                        <td class="table-cell">{{ $moto->created_at->format('d/m/Y') }}</td>
                        <td class="table-cell actions-cell">
                            <form method="POST" action="{{ route('admin.destroy', $moto) }}" class="delete-form" onsubmit="return confirm('¿Seguro que quieres eliminar esta moto?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="table-cell text-center">No se encontraron motos.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="pagination-container">
        {{$motos->onEachSide(1)->appends(request()->query())->links('pagination')}}
        </div>
    </div>
</x-app-layout>
