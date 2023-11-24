<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'quantity',
        'unit_price',
        'client_id'
    ];
    public function client(): BelongsTo
    {
        return $this->belongsto(Client::class);
    }
}
