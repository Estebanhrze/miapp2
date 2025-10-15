<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $q = Product::query();

        if ($request->filled('q')) {
            $term = $request->string('q');
            $q->where(function ($qq) use ($term) {
                $qq->where('nombre', 'like', "%{$term}%")
                   ->orWhere('codigo', 'like', "%{$term}%");
            });
        }

        $q->costo($request->input('costo_op'), $request->input('costo'));
        $q->stock($request->input('stock_op'), $request->input('stock'));
        $q->orden($request->input('orden_campo'), $request->input('orden_dir'));

        $products = $q->paginate(10)->withQueryString();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'codigo' => ['required','string','max:50','unique:products,codigo'],
            'nombre' => ['required','string','max:255'],
            'costo'  => ['required','numeric','min:0'],
            'stock'  => ['required','integer','min:0'],
        ]);

        Product::create($data);

        return redirect()->route('products.index')->with('ok', 'Creado');
    }

    public function edit(Product $product)
    {
        return view('products.edit', ['p' => $product]);
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'codigo' => ['required','string','max:50', Rule::unique('products','codigo')->ignore($product->id)],
            'nombre' => ['required','string','max:255'],
            'costo'  => ['required','numeric','min:0'],
            'stock'  => ['required','integer','min:0'],
        ]);

        $product->update($data);

        return redirect()->route('products.index')->with('ok', 'Actualizado');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('ok', 'Eliminado');
    }
}
