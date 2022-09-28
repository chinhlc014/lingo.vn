<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\SoftDeletes;

/**
 * Class Tag
 *
 * @property int enable_crawl
 * @property string url
 * @property string name
 * @package Modules\Crawl\Entities\Models
 */
class Tag extends BaseModel
{

    use SoftDeletes;

    protected $fillable = [];

    protected $collection = 'tags';

}
