<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['codigo','nombre','costo','stock'];

    // Asegura tipos al hidratar (no afecta al ORDER BY en DB)
    protected $casts = [
        'costo' => 'decimal:2',
        'stock' => 'integer',
    ];

    public function scopeCosto(Builder $q, ?string $op, $valor): Builder
    {
        if ($op && $valor !== null && $valor !== '') {
            return $q->where('costo', $op, $valor);
        }
        return $q;
    }

    public function scopeStock(Builder $q, ?string $op, $valor): Builder
    {
        if ($op && $valor !== null && $valor !== '') {
            return $q->where('stock', $op, $valor);
        }
        return $q;
    }

    public function scopeOrden(Builder $q, ?string $campo, ?string $dir = 'asc'): Builder
    {
        // Campos permitidos para ordenar
        $permitidos = ['id','codigo','nombre','costo','stock','created_at'];

        // Defaults
        $campo = in_array($campo, $permitidos, true) ? $campo : 'costo';
        $dir   = ($dir === 'desc') ? 'desc' : 'asc';

        // Si la columna costo estuviera como VARCHAR en la BD, CAST asegura orden numerico correcto.
        if ($campo === 'costo') {
            return $q->orderByRaw("CAST(costo AS DECIMAL(18,2)) {$dir}")
                     ->orderBy('id', 'asc'); // desempate estable
        }

        return $q->orderBy($campo, $dir)->orderBy('id','asc');
    }
}
