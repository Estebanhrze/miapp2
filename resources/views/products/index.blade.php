@extends('layouts.app')

@section('title','Productos')

@section('content')
@if(session('ok'))
  <div class="alert alert-success">{{ session('ok') }}</div>
@endif

<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h4 m-0">Productos</h1>
  <a href="{{ route('products.create') }}" class="btn btn-primary">Agregar</a>
</div>

<form method="GET" action="{{ route('products.index') }}" class="card card-body mb-3">
  <div class="row g-2 align-items-end">
    <div class="col-md-4">
      <label class="form-label mb-1">Buscar</label>
      <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Nombre">
    </div>
    <div class="col-md-2">
      <button class="btn btn-outline-secondary w-100">Filtrar</button>
    </div>
  </div>
</form>

<div class="table-responsive">
  <table class="table table-striped align-middle">
    <thead class="table-dark">
      <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>Costo</th>
        <th>Creado</th>
        <th class="text-center">Acciones</th>
      </tr>
    </thead>
    <tbody>
    @forelse($products as $p)
      <tr>
        <td>{{ $p->id }}</td>
        <td>{{ $p->name }}</td>
        <td>{{ $p->cost }}</td>
        <td>{{ $p->created_at?->format('Y-m-d H:i') }}</td>
        <td class="text-center">
          <a href="{{ route('products.edit', $p) }}" class="btn btn-sm btn-warning">Editar</a>
          <form action="{{ route('products.destroy', $p) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar?')">Eliminar</button>
          </form>
        </td>
      </tr>
    @empty
      <tr><td colspan="5" class="text-center">Sin registros</td></tr>
    @endforelse
    </tbody>
  </table>
</div>

{{ $products->withQueryString()->links() }}
@endsection
