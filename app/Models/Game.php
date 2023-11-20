<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;


    protected $fillable = ['judul', 'publisher', 'deskripsi', 'tahun_rilis'];
}
