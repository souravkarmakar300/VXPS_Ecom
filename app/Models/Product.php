<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'features',
        'specification',
        'whats_include',
        'compatibility',
        'faq',
        'price',
        'special_offer_price',
        'image',
        'images',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'special_offer_price' => 'decimal:2',
            'images' => 'array',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Primary image path (first gallery image or legacy single image).
     */
    public function getPrimaryImageAttribute(): ?string
    {
        if (! empty($this->images) && is_array($this->images)) {
            return $this->images[0] ?? $this->image;
        }

        return $this->image;
    }

    /**
     * Full URL for primary product display image.
     */
    public function getDisplayImageAttribute(): string
    {
        if ($this->primary_image) {
            return asset('storage/' . $this->primary_image);
        }

        $slug = strtolower($this->slug ?? '');
        $catSlug = strtolower($this->category->slug ?? '');

        if (str_contains($slug, 'headphone') || str_contains($catSlug, 'audio')) {
            return asset('images/categories/audio-sound.png');
        } elseif (str_contains($slug, 'keyboard') || str_contains($catSlug, 'gaming')) {
            return asset('images/categories/gaming-gear.png');
        } elseif (str_contains($slug, 'watch') || str_contains($catSlug, 'wearable')) {
            return asset('images/categories/infinity-luxe.png');
        } elseif (str_contains($slug, 'monitor') || str_contains($slug, 'stand') || str_contains($catSlug, 'display')) {
            return asset('images/categories/discovery.png');
        } elseif (str_contains($slug, 'power') || str_contains($slug, 'hub') || str_contains($catSlug, 'charging')) {
            return asset('images/categories/jump.png');
        }

        return asset('images/categories/jump.png');
    }

    /**
     * Array of full image URLs for the product gallery.
     */
    public function getAllImagesAttribute(): array
    {
        $list = [];
        if (! empty($this->images) && is_array($this->images)) {
            foreach ($this->images as $img) {
                if ($img) {
                    $list[] = asset('storage/' . $img);
                }
            }
        } elseif ($this->image) {
            $list[] = asset('storage/' . $this->image);
        }

        if (empty($list)) {
            $list[] = $this->display_image;
        }

        return array_values(array_unique($list));
    }
}
