<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watch extends Model
{
    protected $fillable = ['name', 'watch_image', 'available_quantity', 'published_on', 'description', 'price'];

    /**
     * @return BelongsToMany
     */
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'watches_genres');
    }

    /**
     * @return BelongsToMany
     */
    public function wishLists()
    {
        return $this->belongsToMany(WishList::class, 'watches_wish_lists');
    }

    /**
     * @return HasMany
     */
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    /**
     * @return BeLongsToMany
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_details');
    }

    /**
     * @return BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'watches_users');
    }

    /**
     * @return BelongsToMany
     */
    public function cartItems()
    {
        return $this->belongsToMany(CartItem::class, 'watches_cart_items');
    }
}