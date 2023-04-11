<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameModel extends Model
{
    use HasFactory;
    protected $table = 'game';
    protected $fillable = [
        'kode_game',
        'nama_game',
        'creator_game',
        'harga_game',
        'tahun_rilis'
    ];
}
