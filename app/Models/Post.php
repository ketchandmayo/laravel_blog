<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
