<?php

namespace App\Models;

/**
 * Class ShopeePromotion
 *
 * @package App\Models
 */
class ShopeePromotion extends BaseModel
{
    protected $table = 'shopee_promotions';

    protected $fillable = [
        'start_time',
        'end_time',
        'banner',
        'promotionid',
    ];
}
