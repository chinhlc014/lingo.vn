<?php

namespace App\Models;

/**
 * Class ShopeeItemPriceHistory
 *
 * @property mixed shopee_item_id
 * @package App\Models
 */
class ShopeeItemPriceHistory extends BaseModel
{
    protected $table = 'shopee_item_price_histories';

    protected $fillable = [
        'shopee_item_id',
        'price',
        'date',
    ];

    protected $casts = [
        'date' => 'date',
    ];
}
