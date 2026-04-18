<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'client_name',
        'image',
        'description',
        'project_date',
    ];

    protected $casts = [
        'project_date' => 'date', // Otomatis menjadi instance Carbon
    ];

    /**
     * Relasi Many-to-Many: Portofolio mencakup banyak Produk/Layanan
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
