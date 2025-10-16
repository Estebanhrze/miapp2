{{-- resources/views/products/index.blade.php --}}
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

{{-- Filtro simple: buscar + orden por costo --}}
<form method="GET" action="{{ route('products.index') }}" class="card card-body mb-3">
  <div class="row g-2 align-items-end">
    <div class="col-md-6 col-lg-5">
      <label class="form-label mb-1">Buscar</label>
      <input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Código o nombre">
      {{-- Permite enviar con Enter aunque no haya botón visible --}}
      <button type="submit" class="visually-hidden">Buscar</button>
    </div>

    <div class="col-md-3 col-lg-2">
      <label class="form-label mb-1">Orden por Costo</label>
      <select name="orden_dir" class="form-select" onchange="this.form.submit()">
        <option value="asc"  {{ request('orden_dir','asc')==='asc'?'selected':'' }}>Ascendente</option>
        <option value="desc" {{ request('orden_dir')==='desc'?'selected':'' }}>Descendente</option>
      </select>
      <input type="hidden" name="orden_campo" value="costo">
    </div>
  </div>
</form>

{{-- Tabla de productos --}}
<div class="table-responsive">
  <table class="table table-striped align-middle">
    <thead class="table-dark">
      <tr>
        <th>#</th>
        <th>Código</th>
        <th>Nombre</th>
        <th class="text-end">Costo</th>
        <th class="text-end">Stock</th>
        <th>Creado</th>
        <th class="text-center">Acciones</th>
      </tr>
    </thead>
    <tbody>
    @forelse($products as $p)
      <tr>
        <td>{{ $p->id }}</td>
        <td>{{ $p->codigo }}</td>
        <td>{{ $p->nombre }}</td>
        <td class="text-end">${{ number_format((float)$p->costo, 2) }}</td>
        <td class="text-end">{{ $p->stock }}</td>
        <td>{{ $p->created_at?->format('Y-m-d H:i') }}</td>
        <td class="text-center">
          <a href="{{ route('products.edit', $p) }}" class="btn btn-sm btn-warning">Editar</a>
          <form action="{{ route('products.destroy', $p) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar?')">
            @csrf @method('DELETE')
            <button class="btn btn-sm btn-danger">Eliminar</button>
          </form>
        </td>
      </tr>
    @empty
      <tr><td colspan="7" class="text-center">Sin registros</td></tr>
    @endforelse
    </tbody>
  </table>
</div>

{{ $products->withQueryString()->links() }}
@endsection
