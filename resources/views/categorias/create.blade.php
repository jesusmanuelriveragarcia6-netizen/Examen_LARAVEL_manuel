<!DOCTYPE html>
<html>
<head>
    <title>Crear Categoría</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Nueva Categoría</h2>
        <a class="btn btn-primary" href="{{ route('categorias.index') }}">⬅ Volver</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>¡Ups!</strong> Hay errores en el formulario.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label><strong>Nombre:</strong></label>
            <input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre" required>
        </div>

        <div class="mb-3">
            <label><strong>Descripción:</strong></label>
            <textarea name="descripcion" class="form-control" placeholder="Ingrese una descripción"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
</body>
</html>
