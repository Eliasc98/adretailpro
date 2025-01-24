<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogPost extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'blog_posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'content',
        'excerpt',
        'meta_title',
        'meta_description',
        'status',
        'published_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'published_at' => 'datetime',
    ];

    /**
     * Scope a query to only include published blog posts.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    /**
     * Accessor for the excerpt.
     * If an excerpt is not provided, generate it from the content.
     *
     * @return string
     */
    public function getExcerptAttribute()
    {
        return $this->attributes['excerpt'] ?: \Str::limit(strip_tags($this->content), 150);
    }

    /**
     * Mutator to automatically generate a slug when saving the blog post.
     *
     * @param string $value
     * @return void
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = \Str::slug($value);
    }

    /**
     * Check if the blog post is published.
     *
     * @return bool
     */
    public function isPublished()
    {
        return $this->status === 'published';
    }
}
