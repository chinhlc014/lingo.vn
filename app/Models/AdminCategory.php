<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\SoftDeletes;

/**
 * Class CrawlCategory
 *
 * @property int enable_crawl
 * @property string url
 * @property string name
 * @package Modules\Crawl\Entities\Models
 */
class AdminCategory extends BaseModel
{

    use SoftDeletes;

    protected $fillable = [
        'name'
    ];

    protected $table = 'admin_categories';

    protected $dates = ['last_crawl_at'];

    /**
     * function description
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany|\Jenssegers\Mongodb\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(AdminCategory::class, 'parent_id', 'id');
    }
}
