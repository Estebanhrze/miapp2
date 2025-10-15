<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['codigo','nombre','costo','stock'];

    public function scopeCosto(Builder $q, ?string $op, $valor): Builder {
        if ($op && $valor !== null && $valor !== '') return $q->where('costo', $op, $valor);
        return $q;
    }

    public function scopeStock(Builder $q, ?string $op, $valor): Builder {
        if ($op && $valor !== null && $valor !== '') return $q->where('stock', $op, $valor);
        return $q;
    }

    public function scopeOrden(Builder $q, ?string $campo, ?string $dir = 'asc'): Builder {
        $campo = in_array($campo, ['nombre','codigo']) ? $campo : 'nombre';
        $dir   = in_array($dir, ['asc','desc']) ? $dir : 'asc';
        return $q->orderBy($campo, $dir)->orderBy('id','asc');
    }
}
