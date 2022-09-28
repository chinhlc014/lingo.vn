<?php

namespace App\Models;

/**
 * Class ShopeeItemKeyword
 *
 * @package App\Models
 */
class ShopeeItemKeyword extends BaseModel
{
    protected $table = 'shopee_item_keywords';

    protected $fillable = [
        'itemid',
        'keyword_id',
    ];
}