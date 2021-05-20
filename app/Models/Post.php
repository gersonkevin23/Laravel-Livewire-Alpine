<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Tags\HasTags;

class Post extends Model
{
    use HasTags;
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pair()
    {
        return $this->belongsTo(Pair::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(UserPostsSubscriptions::class);
    }

    public function scopeActive($query)
    {
        return $query->whereIn('status', ['Active']);
    }

    public function scopeClosed($query)
    {
        return $query->whereIn('status', ['Closed Manually', 'Closed Target Reached']);
    }

    public function scopeCancelled($query)
    {
        return $query->whereIn('status', ['Cancelled']);
    }

    public function scopeTrending($query)
    {
        return $query->with('comments')->get()->sortByDesc(function ($q) {
            return $q->comments->count();
        })->take(5);
    }

    public function scopeSearch($query, $term)
    {
        return $query->whereHas('pair', function ($q) use ($term) {
            $q->where('name', 'like', '%' . $term . '%');
        });
    }

}
