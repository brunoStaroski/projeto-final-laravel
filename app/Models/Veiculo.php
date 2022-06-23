<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin Builder
 */

class Veiculo extends Model
{
    use HasFactory;

    protected $table = 'veiculos';

    protected $fillable = [
        'id',
        'modelo',
        'marca',
        'valor',
        'updated_at',
        'created_at'
    ];
}
