<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Get the transactions that correspond to the Item.
     */
    public function transactions(): HasMany {
        return $this->hasMany(Transaction::class);
    }

    /**
     * Get the category that correspond to the item.
     */
    public function itemCategory(): BelongsTo {
        return $this->belongsTo(ItemCategory::class);
    }
}
