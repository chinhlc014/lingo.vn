<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use Laracodes\Presenter\Traits\Presentable;

/**
 * Class ShopeeItem
 *
 * @property string name
 * @property mixed itemid
 * @property mixed description
 * @property mixed brand
 * @property mixed shop
 * @property mixed shopid
 * @property mixed directCate
 * @package Models
 */
class ShopeeItem extends BaseModel
{
    use Presentable;

    protected $fillable = [
        'price_max_before_discount',
        'categories',
        'name',
        'historical_sold',
        'price_max',
        'images',
        'price_before_discount',
        'catid',
        'sold',
        'item_rating',
        'discount',
        'other_stock',
        'cmt_count',
        'image',
        'normal_stock',
        'view_count',
        'liked_count',
        'price_min_before_discount',
        'show_discount',
        'currency',
        'raw_discount',
        'price_min',
        'stock',
        'description',
        'price',
    ];

    protected $table = 'shopee_items';

    /**
     * The presenter class.
     *
     * @var string
     */
    protected $presenter = Presenters\ShopeeItemPresenter::class;

    /**
     * function description
     *
     * @return BelongsTo|\Jenssegers\Mongodb\Relations\BelongsTo
     */
    public function directCate()
    {
        return $this->belongsTo(ShopeeCategory::class, 'direct_cate_id', 'catid');
    }

    /**
     * function description
     *
     * @return BelongsTo|\Jenssegers\Mongodb\Relations\BelongsTo
     */
    public function shop()
    {
        return $this->belongsTo(ShopeeShop::class, 'shopid', 'shopid');
    }

    /**
     * function description
     *
     * @return BelongsTo|\Jenssegers\Mongodb\Relations\BelongsTo
     */
    public function brand()
    {
        return $this->belongsTo(ShopeeBrand::class, 'shopee_brand_id', 'id');
    }
}
