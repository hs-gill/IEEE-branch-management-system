<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * Get the users that have the role.
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    /**
     * Get the transactions that the User has made.
     */
    public function permissions(): BelongsToMany {
        return $this->belongsToMany(Permission::class)->withTimestamps();
    }

    /**
     * Get the permissions included in the role.
     */
    public function permissions(): BelongsToMany {
        return $this->belongsToMany(Permission::class);
    }
}
