<?php

namespace App\Models\Local;

use App\Support\WebHelpers;
use Jenssegers\Mongodb\Eloquent\Model;

/**
 * Class BaseModel
 *
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

    protected $connection = 'mongodb_local';

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (!$model->{$model->getKeyName()}) {
                $model->{$model->getKeyName()} = WebHelpers::uniqueNumberByTime();
                ;
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
