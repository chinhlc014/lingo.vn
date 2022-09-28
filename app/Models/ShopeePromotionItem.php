<?php

namespace App\Models;

/**
 * Class ShopeePromotion
 *
 * @package App\Models
 */
class ShopeePromotionItem extends BaseModel
{
    protected $table = 'shopee_promotion_items';

    protected $fillable = [
        'itemid',
    ];

    /**
     * function description
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|\Jenssegers\Mongodb\Relations\BelongsTo
     */
    public function shopeeItem()
    {
        return $this->belongsTo(ShopeeItem::class, 'itemid', 'itemid');
    }
}
