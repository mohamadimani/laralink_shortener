<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortLink extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'link', 'short_link', 'click_count'];

    protected static function booted()
    {
        static::creating(function ($shortLink) {
            $shortLink->short_link = makeShortLink();
        });
    }

    public function getRouteKeyName(): string
    {
        return 'short_link';
    }
}
