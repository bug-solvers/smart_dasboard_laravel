<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    const PATH = 'images/setting';

    public static $types = ['text', 'image', 'textarea'];
    public static $keys = [
    'about' => 'textarea',
    'terms' => 'textarea',
    'privacy' => 'textarea',
    'logo' => 'file',
    'phone' => 'text',
    'whatsapp' => 'text',
    'email' => 'text',
    'facebook' => 'text',
    'twitter' => 'text',
    'instagram' => 'text',
    'telegram' => 'text',
    'address' => 'textarea',
    'google_plus' => 'text',
    'youtube' => 'text',
    'map' => 'text'
    ];
    protected $fillable = [
        'type',
        'value',
        'key',
    ];
}
