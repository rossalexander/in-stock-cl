<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin Eloquent
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function inStock()
    {
        return $this->stock()
            ->where('in_stock', true)
            ->exists();
    }

    public function stock(): HasMany
    {
        return $this->hasMany(Stock::class);
    }
}
