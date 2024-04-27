<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ecu extends Model
{
    use HasFactory;

    protected $fillable = [
        'dump_id',
        'ecu',
        'attribute',
        'value'
    ];
}
