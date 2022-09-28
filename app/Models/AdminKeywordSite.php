<?php

namespace App\Models;

use Jenssegers\Mongodb\Relations\BelongsTo;

/**
 * Class AdminKeywordReviewer
 *
 * @package App\Models
 */
class AdminKeywordSite extends BaseModel
{
    protected $fillable = [
        'admin_keyword_id',
        'site_identifier',
        'name',
        'top_description',
        'bottom_description',
        'crawl_description',
    ];

    protected $table = 'admin_keyword_site';

}