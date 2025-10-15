@extends('layouts.app')

@section('title','Crear producto')

@section('content')
<h1 class="h4 mb-3">Crear producto</h1>

<form method="POST" action="{{ route('products.store') }}" class="card card-body">
  @csrf
  <div class="mb-3">
    <label class="form-label">Nombre</label>
    <input type="text" name="name" value="{{ old('name') }}" class="form-control">
    @error('name')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Costo</label>
    <input type="number" step="0.01" name="cost" value="{{ old('cost') }}" class="form-control">
    @error('cost')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>
  <div class="d-flex gap-2">
    <button class="btn btn-primary">Guardar</button>
    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Cancelar</a>
  </div>
</form>
@endsection
