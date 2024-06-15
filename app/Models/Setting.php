<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    const PATH = 'images/setting';
    protected $fillable = [
        'type',
        'value',
        'key',
    ];
}
