<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class identitas_app extends Model
{
    use HasFactory;

    protected $table = 'identitas_app';
    public $incrementing = false;
    public $datetime = false;
    protected $guarded = [];    

}
