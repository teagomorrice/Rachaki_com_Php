<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    use HasFactory;
    protected $fillable = ['partida_id', 'name', 'quant', 'esporte', 'data', 'local', 'hora', 'link'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'Historico'; 

    public function partida()
    {
        return $this->belongTo(Partida::class, 'partida_id', 'id');
    }
}
