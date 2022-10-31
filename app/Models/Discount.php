<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = ['name', 'value', 'start_date', 'end_date', 'quantity', 'description'];

    /**
     * @return BelongsToMany
     */
    public function watches()
    {
        return $this->belongsToMany(Watch::class, 'watches_discounts', 'discount_id', 'watch_id');
    }

    /**
     * @return HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    /**
     * @return BeLongsToManyny
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'users_discounts', 'discount_id', 'user_id');
    }
}