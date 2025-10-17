<!DOCTYPE html>
<html>
<head>
    <title>Crear Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <div class="row mb-3">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <h2>Crear Nuevo Producto</h2>
            <a class="btn btn-secondary" href="{{ route('productos.index') }}">Atrás</a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>¡Ups!</strong> Hay algunos problemas con tu entrada.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label"><strong>Nombre:</strong></label>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre del producto" required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label"><strong>Categoría:</strong></label>
                <select name="categoria_id" class="form-control" required>
                    <option value="">-- Seleccionar Categoría --</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-12 mb-3">
                <label class="form-label"><strong>Descripción:</strong></label>
                <textarea class="form-control" name="descripcion" placeholder="Descripción del producto"></textarea>
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label"><strong>Precio:</strong></label>
                <input type="number" name="precio" class="form-control" placeholder="0.00" step="0.01" required>
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label"><strong>Stock:</strong></label>
                <input type="number" name="stock" class="form-control" placeholder="Cantidad disponible" required>
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label"><strong>Código de Barras:</strong></label>
                <input type="text" name="codigo_barras" class="form-control" placeholder="Ej: ABC123XYZ" required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label"><strong>Imagen (opcional):</strong></label>
                <input type="file" name="imagen" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label"><strong>Activo:</strong></label>
                <select name="activo" class="form-control">
                    <option value="1" selected>Activo</option>
                    <option value="0">Inactivo</option>
                </select>
            </div>

            <div class="col-12 text-center mt-3">
                <button type="submit" class="btn btn-primary px-4">Guardar Producto</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>
