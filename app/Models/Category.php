<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

      // একটি Category-এর অধীনে অনেক Service থাকতে পারে
    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }

    
}