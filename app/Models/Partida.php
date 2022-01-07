<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'quant', 'esporte', 'data', 'local', 'hora', 'link'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'Partida'; 

    public function historico()
    {
        return $this->hasOne(Historico::class);
    }
}
