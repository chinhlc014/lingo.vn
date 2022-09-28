<?php

namespace App\Models\Local;

/**
 * Class KeywordPost
 *
 * @package App\Models
 */
class CrawlKeyword extends BaseModel
{

    protected $fillable = [
        'name',
        'status',
    ];

    protected $table = 'crawl_keywords';
}