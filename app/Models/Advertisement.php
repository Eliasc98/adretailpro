<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'advertisements';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'image_path',
        'description',
        'link',
        'position',
        'start_date',
        'end_date',
        'is_active',
    ];

    /**
     * Scope a query to only include active advertisements.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true)
                     ->where(function ($query) {
                         $query->whereNull('start_date')
                               ->orWhere('start_date', '<=', now());
                     })
                     ->where(function ($query) {
                         $query->whereNull('end_date')
                               ->orWhere('end_date', '>=', now());
                     });
    }
}
