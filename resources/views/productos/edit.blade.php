<!DOCTYPE html>
<html>
<head>
    <title>Editar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="float-start">
                <h2>Editar Producto</h2>
            </div>
            <div class="float-end">
                <a class="btn btn-primary" href="{{ route('productos.index') }}">Atrás</a>
            </div>
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

    <form action="{{ route('productos.update',$producto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <!-- Nombre -->
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="nombre" value="{{ $producto->nombre }}" class="form-control" placeholder="Nombre">
                </div>
            </div>

            <!-- Descripción -->
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Descripción:</strong>
                    <textarea class="form-control" name="descripcion" placeholder="Descripción">{{ $producto->descripcion }}</textarea>
                </div>
            </div>

            <!-- Precio -->
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Precio:</strong>
                    <input type="number" name="precio" value="{{ $producto->precio }}" class="form-control" placeholder="Precio" step="0.01">
                </div>
            </div>

            <!-- Stock -->
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Stock:</strong>
                    <input type="number" name="stock" value="{{ $producto->stock }}" class="form-control" placeholder="Stock">
                </div>
            </div>

            <!-- Categoría -->
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Categoría ID:</strong>
                    <input type="number" name="categoria_id" value="{{ $producto->categoria_id }}" class="form-control" placeholder="Categoría ID">
                </div>
            </div>

            <!-- Código de Barras -->
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Código de Barras:</strong>
                    <input type="text" name="codigo_barras" value="{{ $producto->codigo_barras }}" class="form-control" placeholder="Código de Barras">
                </div>
            </div>

            <!-- Imagen -->
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Imagen:</strong><br>
                    @if ($producto->imagen)
                        <img src="{{ asset('storage/'.$producto->imagen) }}" alt="Imagen actual" width="100" class="mb-2"><br>
                    @endif
                    <input type="file" name="imagen" class="form-control">
                </div>
            </div>

            <!-- Activo -->
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Activo:</strong>
                    <select name="activo" class="form-control">
                        <option value="1" {{ $producto->activo ? 'selected' : '' }}>Sí</option>
                        <option value="0" {{ !$producto->activo ? 'selected' : '' }}>No</option>
                    </select>
                </div>
            </div>

            <!-- Botón -->
            <div class="col-12 text-center mt-3">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>
