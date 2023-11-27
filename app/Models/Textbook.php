<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Textbook extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Get the users that has this Item in the cart.
     */
    public function orders(): BelongsToMany {
        return $this->belongsToMany(Order::class)->withTimestamps();
    }

    /**
     * Get the users that has this Item in the cart.
     */
    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class, 'cart_textbook')->withTimestamps();
    }
}
