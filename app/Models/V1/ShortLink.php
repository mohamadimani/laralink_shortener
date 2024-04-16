<?php

namespace App\Models\V1;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShortLink extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'link', 'short_link', 'click_count'];

    protected static function booted()
    {
        static::creating(function ($shortLink) {
            $shortLink->short_link = makeShortLink(config('settings.global.short_link_length'));
        });
    }

    public function getRouteKeyName(): string
    {
        return 'short_link';
    }

    public function user() :BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


}
