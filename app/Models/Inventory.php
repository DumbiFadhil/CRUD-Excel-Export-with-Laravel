<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $primaryKey = 'id_barang';

    protected $fillable = [
      'id_barang',
      'nama_barang',
      'qty',
      'harga_beli',
      'harga_jual'
  ];

      /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
      'created_at',
      'updated_at',
  ];
}
