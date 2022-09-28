<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use Laracodes\Presenter\Traits\Presentable;

/**
 * Class ShopeeItem
 *
 * @property int enable_crawl
 * @property string url
 * @property string name
 * @property mixed display_name
 * @property mixed slug
 * @package Modules\Crawl\Entities\Models
 */
class ShopeeCategory extends BaseModel
{
    use SoftDeletes, Presentable;

    protected $fillable = [
        'display_name',
        'name',
        'catid',
        'image',
        'sort_weight',
        'parent_category',
    ];

    protected $table = 'shopee_categories';

    /**
     * The presenter class.
     *
     * @var string
     */
    protected $presenter = Presenters\ShopeeCategoryPresenter::class;

    /**
     * function description
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany|\Jenssegers\Mongodb\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(ShopeeCategory::class, 'shopee_category_id', 'id');
    }

    /**
     * function description
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|\Jenssegers\Mongodb\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(ShopeeCategory::class, 'shopee_category_id', 'id');
    }
}
