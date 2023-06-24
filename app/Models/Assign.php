<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assign extends Model
{
    use HasFactory;

    protected $table = 'assign';

    protected $fillable = [
        'user_id',
        'dokter_id',
    ];
}
