<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'image',
        'short_description',
        'long_description',
        'features',
        'is_active',
    ];

    protected $casts = [
        'features' => 'array', // Otomatis mengubah JSON string menjadi Array PHP
        'is_active' => 'boolean',
    ];

    /**
     * Relasi: Banyak Produk dimiliki oleh Satu Kategori
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relasi Many-to-Many: Produk bisa ada di banyak Portofolio
     */
    public function portfolios(): BelongsToMany
    {
        return $this->belongsToMany(Portfolio::class);
    }
}
