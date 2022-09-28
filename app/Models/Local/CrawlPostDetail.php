<?php

namespace App\Models\Local;

/**
 * Class CrawlPostDetail
 *
 * @package App\Models
 */
class CrawlPostDetail extends BaseModel
{

    protected $fillable = [
        'title',
        'status',
        'crawl_post_id',
        'origin_url',
    ];

    protected $table = 'crawl_post_details';

    /**
     * function description
     *
     * @param $query
     */
    public function scopeCrawlDone($query)
    {
        $status = [
            config('constant.crawl_post.status.info'),
            config('constant.crawl_post.status.done'),
        ];
        $query->whereIn('status', $status);
    }
}