<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategoryBarang extends Model
{ 
    use HasFactory;
    protected $table = 'kategori_barang';
    public $incrementing = false;
    public $datetime = false;
    protected $guarded = [];
}
