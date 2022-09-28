<?php

namespace App\Models\Local;

use App\Models\Reviewer;
use Jenssegers\Mongodb\Relations\BelongsTo;

/**
 * Class CrawlPost
 *
 * @package App\Models
 */
class CrawlPost extends BaseModel
{

    protected $fillable = [
        'title',
        'status',
        'crawl_keyword_id',
    ];

    protected $table = 'crawl_posts';

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

    /**
     * function description
     *
     * @param $query
     */
    public function scopeProduction($query)
    {
        $status = config('constant.crawl_post.status.production');

        $query->where('status', $status);
    }

    /**
     * function description
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|\Jenssegers\Mongodb\Relations\BelongsTo
     */
    public function crawlKeyword()
    {
        return $this->belongsTo(CrawlKeyword::class, 'crawl_keyword_id');
    }

    /**
     * function description
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany|\Jenssegers\Mongodb\Relations\HasMany
     */
    public function crawlPostDetails()
    {
        return $this->hasMany(CrawlPostDetail::class);
    }

    /**
     * function description
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|BelongsTo
     */
    public function reviewer()
    {
        return $this->belongsTo(Reviewer::class, 'reviewer_id');
    }
}