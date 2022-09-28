<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use Laracodes\Presenter\Traits\Presentable;

/**
 * Class CrawlPost
 *
 * @package Models
 */
class AdminPost extends BaseModel
{
    use SoftDeletes, Presentable;

    protected $table = 'admin_posts';

    protected $fillable = [
        'title',
        'url',
        'status',
        'thumb',
        'type',
        'description',
        'author',
        'body',
        'published_at',
        'is_home',
        'meta_description',
        'meta_keywords',
        'meta_og_image',
        'admin_category_id',
    ];

    protected $dates = ['published_at'];

    /**
     * @var string
     */
    const UPLOAD_DISK = 'public';

    /**
     * @var string
     */
    const IMAGE_DIR = 'upload/admin-posts/thumb';

    /**
     * function description
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|\Jenssegers\Mongodb\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(AdminCategory::class, 'admin_category_id', 'id');
    }
}
