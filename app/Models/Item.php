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
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'description', 'image_path', 'item_category_id'
    ];

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
