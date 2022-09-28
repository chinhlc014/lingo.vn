<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Str;

/**
 * Class BaseModel
 *
 * @property int enable_crawl
 * @property string url
 * @property string name
 * @package Modules\Crawl\Entities\Models
 * @method static whereHas(string $string, \Closure $param)
 * @method static where(string $string, string $string, string $string)
 * @method static whereNull(string $string)
 * @method static paginate(int $int)
 * @method static find(int $id)
 * @method static whereIn(string $string, $ids)
 * @method static findOrFail(int $id)
 */
class BaseModel extends Model
{
    protected $primaryKey = 'id';

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (!$model->{$model->getKeyName()}) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    /**
     * function description
     *
     * @return string
     */
    public function getPrimaryKey(): string
    {
        return $this->primaryKey;
    }
}
