<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone_number',
        'project_id',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsto(User::class);
    }
    public function project(): BelongsTo
    {
        return $this->belongsto(Project::class);
    }
    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
