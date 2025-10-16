@extends('layouts.app')

@section('title','STOQ | Gestión Inteligente de Inventario')

@section('content')

  {{-- Hero --}}
  <section id="home" class="bg-gradient-to-b from-white to-indigo-50 rounded-b-3xl">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 py-16 flex flex-col lg:flex-row items-center gap-10">
      <!-- Texto -->
      <div class="flex-1">
        <h1 class="text-4xl md:text-6xl font-extrabold text-gray-900 leading-tight mb-4">
          Controla tu<br><span class="text-indigo-600">Inventario</span> con Precisión
        </h1>
        <p class="text-gray-600 mb-6 max-w-md">
          En <strong>STOQ</strong> te ayudamos a automatizar la gestión de tus productos, optimizar el control de existencias
          y mejorar la eficiencia de tu negocio. Gestiona tus entradas, salidas y reportes desde un solo lugar.
        </p>
        <a href="#about" class="inline-block bg-indigo-600 text-white font-semibold px-6 py-3 rounded-full shadow-md hover:bg-indigo-500 transition">
          Más información
        </a>
      </div>

      <!-- Imagen -->
      <div class="flex-1">
        <div class="bg-white shadow-xl rounded-3xl p-6">
          <img src="https://images.unsplash.com/photo-1557825835-70d97c4aa567?q=80&w=1200&auto=format&fit=crop"
               alt="Panel de control de inventario digital" class="rounded-2xl">
        </div>
      </div>
    </div>
  </section>

  {{-- Sección About --}}
  <section id="about" class="py-20">
    <div class="max-w-6xl mx-auto px-6">
      <h2 class="text-3xl font-bold mb-4">Sobre Nosotros</h2>
      <p class="text-gray-600">
        Somos un equipo dedicado al desarrollo de soluciones tecnológicas enfocadas en la optimización del inventario
        y la gestión empresarial. Nuestro objetivo es ofrecer herramientas intuitivas que faciliten la toma de decisiones,
        reduzcan pérdidas y aumenten la rentabilidad de tu negocio.
      </p>
      <p class="text-gray-600 mt-4">
        Con <strong>STOQ</strong>, tendrás control total sobre tu stock, visualización de productos en tiempo real y reportes
        automatizados que impulsan la eficiencia y el crecimiento.
      </p>
    </div>
  </section>

  {{-- Sección Work --}}
  <section id="work" class="py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6">
      <h2 class="text-3xl font-bold mb-4">Nuestros Servicios</h2>
      <p class="text-gray-600 mb-6">
        Ofrecemos un conjunto de herramientas diseñadas para cubrir todas las necesidades de gestión de inventario:
      </p>

      <ul class="text-gray-600 space-y-3 list-disc list-inside">
        <li><strong>Control de productos:</strong> Registro detallado de entradas, salidas y existencias en tiempo real.</li>
        <li><strong>Alertas automáticas:</strong> Notificaciones de stock mínimo o productos agotados.</li>
        <li><strong>Reportes inteligentes:</strong> Estadísticas de movimientos, ventas y rotación de productos.</li>
        <li><strong>Gestión multiusuario:</strong> Asigna roles y permisos para tu equipo con acceso seguro.</li>
        <li><strong>Integraciones externas:</strong> Conexión con sistemas de ventas, facturación y comercio electrónico.</li>
      </ul>
    </div>
  </section>

  {{-- Sección Info --}}
  <section id="info" class="py-20">
    <div class="max-w-6xl mx-auto px-6">
      <h2 class="text-3xl font-bold mb-4">Contáctanos</h2>
      <p class="text-gray-600 mb-4">
        ¿Tienes preguntas o deseas una demostración personalizada? Nuestro equipo estará encantado de atenderte y
        mostrarte cómo <strong>STOQ</strong> puede transformar la forma en que administras tu inventario.
      </p>
      <p class="text-gray-600 mb-6">
        Escríbenos a <a href="mailto:contacto@stoq.com" class="text-indigo-600 hover:underline">contacto@stoq.com</a> o completa el formulario de contacto
        en nuestra página principal. ¡Estamos listos para ayudarte a crecer!
      </p>
      <a href="#home" class="inline-block bg-indigo-600 text-white font-semibold px-6 py-3 rounded-full shadow-md hover:bg-indigo-500 transition">
        Volver al inicio
      </a>
    </div>
  </section>

@endsection
