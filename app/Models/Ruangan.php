<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ruangan extends Model
{
    use HasFactory;
      protected $filLable = ['id', 'nama_ruangan','nama_pic','jml_komputer','jml_leptop'];
    public $timestamps = true;


    public function m_Barang()
    {
        return $this->hasMany(m_barang::class, 'id_ruangan');
    }

    public function pm_ruangan()
    {
        return $this->hasMany(pm_ruangan::class, 'id_ruangan');
    }
    public function D_Ruangan()
    {
      return $this->hasMany(D_Ruangan::class, 'id_ruangan');
    }
}

