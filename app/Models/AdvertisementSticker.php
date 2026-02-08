<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Enums\StickerAreaType;

class AdvertisementSticker extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'advertisement_id',
        'sticker_area_type',
        'sticker_file',
    ];

    protected $casts = [
        'sticker_area_type' => StickerAreaType::class,
    ];


    public function advertisement()
    {
        return $this->belongsTo(Advertisement::class);
    }
}
