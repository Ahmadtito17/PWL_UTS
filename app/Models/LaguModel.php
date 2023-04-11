<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaguModel extends Model
{
    use HasFactory;
    protected $table = 'lagu';
    protected $fillable = [
        'judul',
        'artis',
        'genre',
        'tanggal_rilis'
    ];
}
