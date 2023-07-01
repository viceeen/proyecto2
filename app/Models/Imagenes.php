<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagenes extends Model
{
    use HasFactory;
    protected $table = 'imagenes';
    protected $primaryKey = 'id';
    protected $KeyType = 'integer';
    
    public function cuenta():BelongsTo{
        return $this->belongsTo(Cuentas::class);
    }
}
