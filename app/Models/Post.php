<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reply;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the reply.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the replies for the forum post.
     */
    public function replies(): HasMany
    {
        return $this->hasMany(Reply::class);
    }
}
