{{-- resources/views/products/create.blade.php --}}
@extends('layouts.app')

@section('title','Crear producto')

@section('content')
<h1 class="h4 mb-3">Crear producto</h1>

{{-- Muestra errores generales --}}
@if ($errors->any())
  <div class="alert alert-danger">
    <ul class="m-0">
      @foreach ($errors->all() as $e)
        <li>{{ $e }}</li>
      @endforeach
    </ul>
  </div>
@endif

<form method="POST" action="{{ route('products.store') }}" class="card card-body">
  @csrf

  <div class="mb-3">
    <label class="form-label">Código</label>
    <input class="form-control" name="codigo" value="{{ old('codigo') }}">
  </div>

  <div class="mb-3">
    <label class="form-label">Nombre</label>
    <input class="form-control" name="nombre" value="{{ old('nombre') }}">
  </div>

  <div class="mb-3">
    <label class="form-label">Costo</label>
    <input class="form-control" type="number" step="0.01" name="costo" value="{{ old('costo') }}">
  </div>

  <div class="mb-3">
    <label class="form-label">Stock</label>
    <input class="form-control" type="number" step="1" name="stock" value="{{ old('stock') }}">
  </div>

  <div class="d-flex gap-2">
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Cancelar</a>
  </div>
</form>
@endsection
