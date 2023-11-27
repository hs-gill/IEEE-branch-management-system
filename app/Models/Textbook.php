<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Textbook extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Get the users that has this Textbook in the cart.
     */
    public function orders(): BelongsToMany {
        return $this->belongsToMany(Order::class)->withTimestamps();
    }

    /**
     * Get the state of the textbook.
     */
    public function textbookState(): BelongsTo {
        return $this->belongsTo(TextbookState::class);
    }

    /**
     * Get the users that has this Textbook in the cart.
     */
    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class, 'cart_textbook');
    }
}
