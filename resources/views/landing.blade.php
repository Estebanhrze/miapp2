@extends('layouts.app')

@section('title','STOQ | Gestión Inteligente de Inventario')

@section('content')

  {{-- Hero --}}
  <section class="bg-gradient-to-b from-white to-indigo-50 rounded-b-3xl">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 py-20 flex flex-col lg:flex-row items-center gap-10">
      <div class="flex-1">
        <h1 class="text-5xl md:text-6xl font-extrabold text-gray-900 leading-tight mb-5">
          Controla tu <span class="text-indigo-600">Inventario</span> con Precisión
        </h1>
        <p class="text-gray-600 text-lg mb-8 max-w-lg">
          STOQ es una plataforma para pequeñas y medianas empresas que desean optimizar
          el control de existencias, automatizar movimientos y tomar decisiones con datos reales.
        </p>
        <div class="flex gap-3">
          <a href="{{ route('register') }}" class="bg-indigo-600 text-white font-semibold px-6 py-3 rounded-full shadow-md hover:bg-indigo-500 transition">
            Probar gratis
          </a>
          <a href="{{ route('solutions') }}" class="font-semibold px-6 py-3 rounded-full border border-gray-300 hover:border-indigo-400 hover:text-indigo-600 transition">
            Ver soluciones
          </a>
        </div>
      </div>

      <div class="flex-1">
        <div class="bg-white shadow-xl rounded-3xl p-6">
          <img src="https://images.unsplash.com/photo-1557825835-70d97c4aa567?q=80&w=1200&auto=format&fit=crop"
               alt="Panel de control de inventario" class="rounded-2xl">
        </div>
      </div>
    </div>
  </section>

  {{-- Beneficios resumen --}}
  <section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
      <h2 class="text-3xl font-bold mb-10 text-gray-900">¿Por qué STOQ?</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-lg transition">
          <h3 class="text-xl font-bold mb-2">Stock en tiempo real</h3>
          <p class="text-gray-600">Registra entradas y salidas con un clic y visualiza existencias actualizadas.</p>
        </div>
        <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-lg transition">
          <h3 class="text-xl font-bold mb-2">Reportes inteligentes</h3>
          <p class="text-gray-600">Analiza rotación, costos y alertas de quiebre para comprar mejor.</p>
        </div>
        <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-lg transition">
          <h3 class="text-xl font-bold mb-2">Listo para crecer</h3>
          <p class="text-gray-600">Multiusuario, roles y API para integrarte con ventas y facturación.</p>
        </div>
      </div>
    </div>
  </section>
@endsection
