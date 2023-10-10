<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Reply extends Model
{
    use HasFactory;

    /**
     * Get the post that owns the reply.
     */
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
