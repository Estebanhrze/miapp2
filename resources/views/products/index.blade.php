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

<form method="GET" action="{{ route('products.index') }}" class="card card-body mb-3">
  <div class="row g-2 align-items-end">
    <div class="col-md-4">
      <label class="form-label mb-1">Buscar</label>
      <input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Código o nombre">
    </div>

    <div class="col-md-2">
      <label class="form-label mb-1">Costo</label>
      <div class="input-group">
        <select name="costo_op" class="form-select">
          <option value="">--</option>
          <option value="="  {{ request('costo_op')==='='?'selected':'' }}>=</option>
          <option value=">"  {{ request('costo_op')==='>'?'selected':'' }}>&gt;</option>
          <option value="<"  {{ request('costo_op')==='<'?'selected':'' }}>&lt;</option>
        </select>
        <input type="number" step="0.01" name="costo" value="{{ request('costo') }}" class="form-control">
      </div>
    </div>

    <div class="col-md-2">
      <label class="form-label mb-1">Stock</label>
      <div class="input-group">
        <select name="stock_op" class="form-select">
          <option value="">--</option>
          <option value="="  {{ request('stock_op')==='='?'selected':'' }}>=</option>
          <option value=">"  {{ request('stock_op')==='>'?'selected':'' }}>&gt;</option>
          <option value="<"  {{ request('stock_op')==='<'?'selected':'' }}>&lt;</option>
        </select>
        <input type="number" step="1" name="stock" value="{{ request('stock') }}" class="form-control">
      </div>
    </div>

    <div class="col-md-2">
      <label class="form-label mb-1">Orden</label>
      <div class="input-group">
        
        <select name="orden_dir" class="form-select">
          <option value="asc"  {{ request('orden_dir','asc')==='asc'?'selected':'' }}>Asc</option>
          <option value="desc" {{ request('orden_dir')==='desc'?'selected':'' }}>Desc</option>
        </select>
      </div>
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
        <th>Código</th>
        <th>Nombre</th>
        <th>Costo</th>
        <th>Stock</th>
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
        <td>{{ number_format((float)$p->costo, 2) }}</td>
        <td>{{ $p->stock }}</td>
        <td>{{ $p->created_at?->format('Y-m-d H:i') }}</td>
        <td class="text-center">
          <a href="{{ route('products.edit', $p) }}" class="btn btn-sm btn-warning">Editar</a>
          <form action="{{ route('products.destroy', $p) }}" method="POST" class="d-inline">
            @csrf @method('DELETE')
            <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar?')">Eliminar</button>
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
