<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Advertisement extends Model
{
    use HasFactory, SoftDeletes;

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
        'user_id',  // Add user_id to track who created the ad
        'category',
        'priority'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $dates = [
        'start_date', 
        'end_date',
        'deleted_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean'
    ];

    /**
     * Get the user that owns the advertisement.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

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
     * Scope a query to only include advertisements for the given seller.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $userId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeForSeller($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    /**
     * Get the URL of the advertisement image.
     *
     * @return string|null
     */
    public function getImageUrlAttribute()
    {
        return $this->image_path ? Storage::url($this->image_path) : null;
    }

    /**
     * Get the status of the advertisement.
     *
     * @return string
     */
    public function getStatusAttribute()
    {
        if (!$this->is_active) return 'Inactive';
        
        $now = now();
        if ($this->start_date && $now < $this->start_date) return 'Pending';
        if ($this->end_date && $now > $this->end_date) return 'Expired';
        
        return 'Active';
    }

    /**
     * Get the formatted start date of the advertisement.
     *
     * @return string
     */
    public function getFormattedStartDateAttribute()
    {
        return $this->start_date ? $this->start_date->format('F d, Y') : 'Not Set';
    }

    /**
     * Get the formatted end date of the advertisement.
     *
     * @return string
     */
    public function getFormattedEndDateAttribute()
    {
        return $this->end_date ? $this->end_date->format('F d, Y') : 'Not Set';
    }
}
