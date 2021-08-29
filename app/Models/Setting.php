<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $tabel = 'settings';

    protected $guarded = [];

    protected $casts = ['site_social' => 'array'];
}
