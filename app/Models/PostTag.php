<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

/**
 * Class PostTag
 *
 * @property int enable_crawl
 * @property string url
 * @property string name
 * @package Modules\Crawl\Entities\Models
 */
class PostTag extends BaseModel
{

    protected $fillable = [];

    protected $table = 'post_tag';

    public $timestamps = false;
}
