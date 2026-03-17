<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    // Ito ang nagsasabi sa Laravel kung anong columns ang pwedeng i-save
    protected $fillable = [
        'title',
        'author',
        'genre',
        'year_published'
    ];
}