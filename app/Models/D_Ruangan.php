<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class D_Ruangan extends Model
{
    use HasFactory;
    protected $fillable = ['id','id_ruangan','id_barang'];
    public $timestamps = true;

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'id_ruangan');
    }
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}


