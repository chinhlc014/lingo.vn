<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\SoftDeletes;

/**
 * Class ShopeeShop
 *
 * @package App\Models
 */
class ShopeeBrand extends BaseModel
{
    use SoftDeletes;

    protected $table = 'shopee_brands';

    protected $fillable = [
        'name',

        'status',

    ];
}
