<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class Post extends Model
{
    use HasFactory;

    /**
     * Class Post
     * @property int    $user_id
     *
     * @property string $title
     * @property string $content
     *
     * @property bool   $published
     * @property Carbon $published_at
     */

    protected $fillable = [
        'user_id',

        'title',
        'content',

        'published',
        'published_at',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'published' => 'boolean',
        'published_at' => 'datetime',
    ];

    protected $attributes = [
        'published' => false,
        'published_at' => null,
    ];

    public function isPublished(): bool
    {
        return ($this->published && $this->published_at);
    }

    public static function postSearch($query, $validated): void
    {
        $query->where(function ($query) use ($validated) {
            $query
                ->whereLike('title', "%{$validated['search']}%")
                ->orWhereLike('content', "%{$validated['search']}%");
        });
    }

}
