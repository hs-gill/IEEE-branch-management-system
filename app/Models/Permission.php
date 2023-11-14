<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permission extends Model
{
    use HasFactory;

    /**
     * Get the transactions that the User has made.
     */
    public function permissions(): BelongsToMany {
        return $this->belongsToMany(Permission::class)->withTimestamps();
    }
}
