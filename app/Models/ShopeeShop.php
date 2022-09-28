<?php

namespace App\Models;

use Laracodes\Presenter\Traits\Presentable;

/**
 * Class ShopeeShop
 *
 * @property mixed shopid
 * @package App\Models
 */
class ShopeeShop extends BaseModel
{
    use Presentable;

    protected $table = 'shopee_shops';

    protected $fillable = [
        'name',
        'item_count',
        'cover',
        'follower_count',
        'rating_bad',
        'rating_good',
        'rating_normal',
        'rating_star',
        'response_rate',
        'response_time',
        'description',
        'shop_location',

        'status',
        'username',
        'shopid',
        'portrait',
        'slug',
    ];

    /**
     * The presenter class.
     *
     * @var string
     */
    protected $presenter = Presenters\ShopeeShopPresenter::class;
}
