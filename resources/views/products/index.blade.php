@extends('layouts.admin')

@section('title','Productos')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Productos</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Agregar</a>
  </div>

  {{-- Filtros --}}
  <form method="GET" action="{{ route('products.index') }}" class="row g-3 align-items-end mb-4">
    <div class="col-md-6">
      <label class="form-label">Buscar</label>
      <input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Código o nombre">
    </div>
    <div class="col-md-3">
      <label class="form-label">Orden por Costo</label>
      <select name="order" class="form-select">
        <option value="asc"  @selected(request('order')==='asc')>Ascendente</option>
        <option value="desc" @selected(request('order')==='desc')>Descendente</option>
      </select>
    </div>
    <div class="col-md-3">
      <button class="btn btn-outline-secondary w-100">Filtrar</button>
    </div>
  </form>

  {{-- Tabla --}}
  <table class="table table-striped align-middle">
    <thead class="table-dark">
      <tr>
        <th>#</th>
        <th>Código</th>
        <th>Nombre</th>
        <th>Costo</th>
        <th>Stock</th>
        <th>Creado</th>
        <th class="text-end">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @forelse($products as $product)
        <tr>
          <td>{{ $product->id }}</td>
          <td>{{ $product->codigo }}</td>
          <td>{{ $product->nombre }}</td>
          <td>${{ number_format($product->costo, 2) }}</td>
          <td>{{ $product->stock }}</td>
          <td>{{ optional($product->created_at)->format('Y-m-d H:i') }}</td>
          <td class="text-end">
            <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">Editar</a>
            <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
              @csrf @method('DELETE')
              <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este producto?')">Eliminar</button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td colspan="7" class="text-center text-muted">Sin registros</td></tr>
      @endforelse
    </tbody>
  </table>

  {{ $products->links() }}
@endsection
