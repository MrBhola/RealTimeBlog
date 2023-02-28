<?php

namespace App\Models;

use App\Events\PostCreatedEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class Post extends Model
{
    use HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'title',
        'content',
    ];

    protected $dispatchesEvents = [
        'created' => PostCreatedEvent::class,
    ];

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class, 'post_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'post_id');
    }

    public function auther(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
