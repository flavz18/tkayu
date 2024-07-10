<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'tbl_barang';
    
    protected $fillable = [
        'id_kategori',
        'nama_barang',
        'stok',
        'harga',
        'harga_jual'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';
    protected $hidden = ['created at', 'updated_at'];

}
