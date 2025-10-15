{{-- resources/views/products/edit.blade.php --}}
@extends('layouts.app')

@section('title','Editar producto')

@section('content')
<h1 class="h4 mb-3">Editar producto</h1>

@if ($errors->any())
  <div class="alert alert-danger">
    <ul class="m-0">
      @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
    </ul>
  </div>
@endif

<form method="POST" action="{{ route('products.update', $p) }}" class="card card-body">
  @csrf
  @method('PUT')

  <div class="row g-3">
    <div class="col-md-4">
      <label class="form-label">Código</label>
      <input class="form-control" name="codigo" value="{{ old('codigo', $p->codigo) }}">
      @error('codigo')<div class="text-danger small">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-8">
      <label class="form-label">Nombre</label>
      <input class="form-control" name="nombre" value="{{ old('nombre', $p->nombre) }}">
      @error('nombre')<div class="text-danger small">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-4">
      <label class="form-label">Costo</label>
      <input class="form-control" type="number" step="0.01" name="costo" value="{{ old('costo', $p->costo) }}">
      @error('costo')<div class="text-danger small">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-4">
      <label class="form-label">Stock</label>
      <input class="form-control" type="number" step="1" name="stock" value="{{ old('stock', $p->stock) }}">
      @error('stock')<div class="text-danger small">{{ $message }}</div>@enderror
    </div>
  </div>

  <div class="d-flex gap-2 mt-3">
    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Volver</a>
  </div>
</form>
@endsection
