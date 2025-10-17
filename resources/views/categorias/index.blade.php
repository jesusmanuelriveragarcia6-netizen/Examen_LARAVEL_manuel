<!DOCTYPE html>
<html>
<head>
    <title>Listado de Categorías</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Lista de Categorías</h2>
        <a class="btn btn-success" href="{{ route('categorias.create') }}">➕ Nueva Categoría</a>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
    @endif

    <table class="table table-bordered text-center align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th width="180px">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->nombre }}</td>
                    <td>{{ $categoria->descripcion ?? 'Sin descripción' }}</td>
                    <td>
                        <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST">
                            <a class="btn btn-primary btn-sm" href="{{ route('categorias.edit', $categoria->id) }}">Editar</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Deseas eliminar esta categoría?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">No hay categorías registradas</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
