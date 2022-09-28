<?php

namespace App\Models;

/**
 * Class SitemapFile
 *
 * @package App\Models
 */
class SitemapCloneFile extends BaseModel
{
    protected $table = 'sitemap_clone_files';

    protected $fillable = [
        'type',
    ];
}
