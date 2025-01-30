<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;

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
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'image_path',
        'link',
        'position',
        'start_date',
        'end_date',
        'is_active',
        'user_id'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'is_active' => 'boolean'
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

    /**
     * Get the user who created the advertisement.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
