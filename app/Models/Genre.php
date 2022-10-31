<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];

    /**
     * @return BeLongsToMany
     */
    public function watches()
    {
        return $this->belongsToMany(Watch::class, 'watches_genres');
    }
}