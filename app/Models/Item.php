<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasFactory;

    protected $table = 'items';

    protected $fillable = ['name', 'image', 'subcategory_id', 'description', 'price', 'quantity_type_id', 'quantity'];

    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function quantity_type(): BelongsTo
    {
        return $this->belongsTo(Quantity_type::class);
    }
}
